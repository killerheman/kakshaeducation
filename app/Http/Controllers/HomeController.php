<?php

namespace App\Http\Controllers;
use App\Models\Exception;
use App\Models\Contact;
use App\Models\Student;
use App\Models\Career;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Requests\EnquiryReq;
use App\Http\Requests\ContactReq;
use App\Http\Requests\RegistrStuReq;
use App\Http\Requests\CareerReq;
use Illuminate\Support\Facades\DB;
use Session;
use Mail;
class HomeController extends Controller
{
    // exepton function 
   public function save_err($err_msg, $err_url)
    {
      $Exception = new Exception;
      $Exception->err_message = $err_msg;
      $Exception->url = $err_url;
      $Exception->status = "found";
      if($Exception->save())
      {
         return redirect('/student');
      }
    }
    //test function
    public function test()
    {
        return view('test');
    }
    //test function end
    // welcome page
    public function index()
    {
        try
        {
            $course_top = Course::where(['is_del'=>false, 'status'=>true])->inRandomOrder()->limit(6)->get();
            $course = Course::where(['is_del'=>false, 'status'=>true])->get();
            return view('welcome',['course'=>$course, 'course_top'=>$course_top]);
        }
        catch(\Exception $ex)
        {
            $e = $ex->getMessage();
            $url = '/';
            HomeController::save_err($e,  $url);
        }
        
    }
    
    public function saveenquiry(EnquiryReq $req)
    {
        $enquiry= new Contact;
        $name = $req->name;
        $email = $req->email;
        $contact = $req->mobile;
        $msg = $req->message;
        $enquiry->student_name=$name;
        $enquiry->email=$email;
        $enquiry->mobile=$contact;
        $enquiry->message=$msg;
        $enquiry->save();
        
        
    }

    //about page
    public function about()
    {
        try
        {
            return view('about');
        }
        catch(\Exception $ex)
        {
            $e = $ex->getMessage();
            $url = '/about';
            HomeController::save_err($e,  $url);
        }
        
    }
    //contact page
    public function contact()
    {
        try
        {
            return view('contact');
        }
        catch(\Exception $ex)
        {
            $e = $ex->getMessage();
            $url = '/contact';
            HomeController::save_err($e,  $url);
        }
        
    }
    public function savecontact(ContactReq $req)
    {
        $enquiry= new Contact;
        $name = $req->name;
        $email = $req->email;
        $contact = $req->contact;
        $msg = $req->message;
        $sub = $req->subject;
        $enquiry->student_name= $name;
        $enquiry->email= $email;
        $enquiry->mobile= $contact;
        $enquiry->message=$msg;
        $enquiry->subject=$sub;
        if($enquiry->save())
        {
            Session::flash('status', 'alert-success');
            Session::flash('flash_message', 'Your quiry send successfully we contact soon.....!');
            $data = ['name'=>$name, 'email'=>$email, 'contact'=>$contact, 'msg'=>$msg, 'sub'=>$sub];
            $user['to']="divanshusahu7054166363@gmail.com";
            Mail::send('mail_contact', $data, function($message) use ($user){
            $message->to($user['to']);
            $message->subject('New enquiry from contact kakshaeducatio.com');
            });
            return redirect('/contact'); 
        }else{
            Session::flash('status', 'alert-danger');
            Session::flash('flash_message', 'your quiry not send Try again!');
            return redirect('/contact');
        }
        
    }
    //registration page
    public function register()
    {
        try
        {
            return view('register');
        }
        catch(\Exception $ex)
        {
            $e = $ex->getMessage();
            $url = '/registration';
            HomeController::save_err($e,  $url);
        }
        
    }
    public function registerstu(RegistrStuReq $req)
    {
        $email = $req->email;
        $mobile = $req->mobile;
        $student = Student::where('email',$email)->orWhere('mobile',$mobile)->get()->count();
        if($student > 0){
            Session::flash('status', 'alert-danger');
            Session::flash('flash_message', 'Email or Mobile Number already exist!');
            return redirect('/registration');
        }
        else{
            $Student= new Student;
            $name = $req->name;
            $f_latter = substr($name, 0);
            $lname = strstr($name,' ');
            $s_latter = substr($lname, 0);
            if($s_latter == null || $s_latter == '')
            {
                $s_latter =['E','K'];
            }
            $ref_code = $f_latter[0].$s_latter[1].date('my').rand(10,99).rand(10,99);
            $Student->student_name=$name;
            $Student->email=$email;
            $Student->mobile=$mobile;
            $Student->referal_id=$ref_code;
            $Student->pic="avatar.png";
            $Student->password=md5($req->password);
            if ($Student->save())
            {
                $data = ['name'=>$name, 'code'=>$ref_code];
                $user['to']=$email;
                Mail::send('send_mail', $data, function($message) use ($user){
                    $message->to($user['to']);
                    $message->subject('Welcome to the Kaksha Education');
                });
                Session::flash('status', 'alert-success');
                Session::flash('flash_message', 'Registration completed please login!');
                return redirect('/login');
            }
            else{
                Session::flash('status', 'alert-danger');
                Session::flash('flash_message', 'Somthing went wrong please check and Try again!');
                return redirect('/registration');
            }
        }
        
        
    }
    //privacy policy page
    public function privacy()
    {
        try
        {
            return view('privacypolicy');
        }
        catch(\Exception $ex)
        {
            $e = $ex->getMessage();
            $url = '/privacy_policy';
            HomeController::save_err($e,  $url);
        }
        
    }
    public function course()
    {
        try
        {
            $course = Course::where(['is_del'=>false, 'status'=>true])->paginate(9);
            return view('course',['course'=>$course]);
        }
        catch(\Exception $ex)
        {
            $e = $ex->getMessage();
            $url = '/courses';
            HomeController::save_err($e,  $url);
        }
    }
    public function disclaimer()
    {
        try
        {
            return view('disclaimer');
        }
        catch(\Exception $ex)
        {
            $e = $ex->getMessage();
            $url = '/disclaimer';
            HomeController::save_err($e,  $url);
        }
        
    }
    public function refund()
    {
        try
        {
            return view('refund_policy');
        }
        catch(\Exception $ex)
        {
            $e = $ex->getMessage();
            $url = '/refund_policy';
            HomeController::save_err($e,  $url);
        }
       
    }
    public function terms()
    {
        try
        {
            return view('terms_condition');
        }
        catch(\Exception $ex)
        {
            $e = $ex->getMessage();
            $url = '/terms_conditions';
            HomeController::save_err($e,  $url);
        }
        
    }
    public function career()
    {
        try
        {
            return view('/career');
        }
        catch(\Exception $ex)
        {
            $e = $ex->getMessage();
            $url = '/career';
            HomeController::save_err($e,  $url);
        }
        
    }
    public function career_submit(CareerReq $req)
    {
        if($req->hasFile('cv'))
        {
            $cv=$req->file('cv');
            $cv_ext=$req->cv->extension();
            $cv_name="Resume".time()."_".rand(10,99). $cv_ext;
            $destination=public_path('assets/cv/career');
            if($cv->move($destination,$cv_name))
            {
                $career= new Career;
                $name = $req->name;
                $email = $req->email;
                $contact = $req->mobile;
                $quali = $req->qualification;
                $expe = $req->experience;
                $career->name=$name;
                $career->email=$email;
                $career->mobile=$contact;
                $career->highest_quali=$quali;
                $career->experience=$expe;
                $career->cv=$cv_name;
                if($career->save())
                {
                    Session::flash('status', 'alert-success');
                    Session::flash('flash_message', 'Your form submitted successfully we contact soon.....!');
                    $data = ['name'=>$name, 'email'=>$email, 'contact'=>$contact, 'quali'=>$quali, 'expe'=>$expe];
                    $user['to']="divanshusahu7054166363@gmail.com";
                    Mail::send('mail_career', $data, function($message) use ($user){
                    $message->to($user['to']);
                    $message->subject('New career enquiry on kakshaeducatio.com');
                    });
                    return redirect('/career'); 
                }else{
                    Session::flash('status', 'alert-danger');
                    Session::flash('flash_message', 'your form not submitted Try again!');
                    return redirect('/career');
                }
            }
            else{
                Session::flash('status', 'alert-danger');
                Session::flash('flash_message', 'Resume not saved!');
                return redirect('/career');
            }
        }
        else{
            Session::flash('status', 'alert-danger');
            Session::flash('flash_message', 'No such file found please check and Try again!');
            return redirect('/career');
        }

    }
    public function login()
    {
        try
        {
            return view('/login');
        }
        catch(\Exception $ex)
        {
            $e = $ex->getMessage();
            $url = '/login';
            HomeController::save_err($e,  $url);
        }
        
    }
    public function course_overview($id, $alias)
    {
        try
        {
            $course = Course::where(['cour_id'=>$id,'alias'=>$alias])->get();
            return view('course_overview',['course'=>$course]);
        }
        catch(\Exception $ex)
        {
            $e = $ex->getMessage();
            $url = "course/$id/$alias";
            HomeController::save_err($e,  $url);
        }
        
    }
    
}
