<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Course;
use App\Models\Contact;
use App\Models\Refferal;
use App\Models\StudentCourse;
use App\Models\Exception;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log as FacadesLog;
use Session;
use Mail;
use Log;
class StudentController extends Controller
{
    //
    // exepton function
    public function save_err($err_msg, $err_url)
    {
        $Exception = new Exception;
        $Exception->err_message = $err_msg;
        $Exception->url = $err_url;
        $Exception->status = "found";
        if($Exception->save()){
            return redirect('/student');
        }
    }
    public function Student_Login()
    {
         try
         {
         return view('students.login');
         }
         catch(\Exception $ex)
         {
         $e = $ex->getMessage();
         $url = '/student';
         StudentController::save_err($e,  $url);
         }
    }
    // student login requiest
    public function stulogin(Request $req)
    {
         $validate= $req-> validate([
            'email'=> 'required |email',
            'password'=> 'required | min:8'
         ]);
         $email=$req->get('email');
         $password=md5($req->get('password'));
         $studentArr = array(
            'emailx'=>$email,
            'passx'=>$password
         );
         $result = DB::select('CALL student_login(:emailx,:passx)', $studentArr);
         if(count($result)>0){
            $email= $result[0]->email;
            $studentid= $result[0]->stu_id;
            Session::put(['stu_id'=>$studentid]);
            return redirect('/student/dashboard');
         }else{
            Session::flash('error', 'Invalid Login details');
            return redirect('/login');
         }
      }
      // student can change password
      public function student_change_password(Request $Req_pass)
      {
         $Req_pass->validate([
               'old_password'=>'required|min:6|max:14',
               'new_password'=>'required|min:6|max:50',
               'Confirm_New_Password'=>'required|same:new_password'
         ]);
         $studentID = Session::get('stu_id');
         //return $studentID;
         $student_password = Student::where('stu_id',$studentID)->first();
         //return $student_password;
         $current_password = md5($Req_pass->old_password);
         //return $current_password;
         $new_password = md5($Req_pass->newpassword);
         $confirm_pass= md5($Req_pass->Confirm_New_Password);
         //return $new_password."-".$confirm_pass."-current pass===".$current_password."//".$student_password;
         if($current_password == $student_password['password'])
         {
               $student_password_update= Student::where('stu_id',$studentID)->update(['password'=>$confirm_pass]);
               if($student_password_update){
                  return redirect('/student/logout')->with('success', 'Password Successfully Changed.');
               }
         }
         else{
               return redirect('/student/dashboard')->with('errors', 'Old Password does not matched.');
         }
      }
    public function index()
    {
       try
      {
         $stuId = Session::get('stu_id');
         $mycourse = DB::table('student_courses')
         ->join('courses','courses.cour_id','=','student_courses.course_id')
         ->where('student_courses.student_id',$stuId)
         ->where('student_courses.is_del',false)
         ->where('student_courses.status',true)
         ->whereRaw("student_courses.payment_status IS NULL or student_courses.payment_status!='Completed'")
         ->get();
        //  $refferal = Refferal::join('students','students.stu_id','refferals.student_id')
        //  ->join('courses','courses.cour_id','refferals.course_id')
        //     ->get();

            $refid=Student::where('stu_id',$stuId)->pluck('referal_id')[0];

            $refamt=StudentCourse::join('courses','courses.cour_id','student_courses.course_id')
            ->where('student_courses.refered_by',$refid)
           ->where('student_courses.payment_status','Completed')->get();
            $totalrefamt=0;
        foreach($refamt as $ref)
        {
            $totalrefamt=$totalrefamt+$ref->referal_pice;
        }
        //return $totalrefamt;
         //Log::info("data".json_decode($refferal));
         //die();
        
         $Course = Course::where(['is_del'=>false, 'status'=>true])->get();
         return view('students.dashboard',['mycourse'=>$mycourse, 'allcourse'=>$Course,'refferal'=>$refamt,'totalrefamt'=>$totalrefamt]);
      }
      catch(\Exception $ex)
      {
      $e = $ex->getMessage();
      $url = '/student/dashboard';
      StudentController::save_err($e,  $url);
      }
    }
    public function courses()
    {
       try{
         $stuId = Session::get('stu_id');
         $stcourse=studentcourse::where('student_id','=',$stuId)->where('payment_status','=','Completed')->pluck('course_id')->toArray();
      
         $course = Course::with('studentscourse')->where(['is_del'=>false, 'status'=>true])->get();
         //dd(session::get());
         //Session::get('stu_id');
         return view('students.courses',['course'=>$course,'stcourse'=>$stcourse]);
      }
      catch(\Exception $ex)
      {
         $e = $ex->getMessage();
         $url = '/student/courses';
         StudentController::save_err($e,  $url);
      }

    }
    public function CourseOverview($id, $alias)
    {
      $course = Course::where(['is_del'=>false, 'status'=>true, 'cour_id'=>$id])->get();
      return view('students.course_overview',['course'=>$course]);
    }
    public function profile()
    {
       try{
         $stuId = Session::get('stu_id');
         $student=Student::where(['stu_id'=>$stuId,'is_del'=>false,'status'=>true])->get();
         //dd($student);
         return view('students.student_profile')->with('student',$student);
       }
       catch(\Exception $ex)
      {
         $e = $ex->getMessage();
         $url = '/student/profile';
         StudentController::save_err($e,  $url);
      }

    }
    public function EditProfile()
    {

       try
       {
         $stuId = Session::get('stu_id');
         $student=Student::where(['stu_id'=>$stuId,'is_del'=>false,'status'=>true])->get();
         return view('students.edit_profile')->with('student',$student);
       }
       catch(\Exception $ex)
       {
          $e = $ex->getMessage();
          $url = '/student/edit_profile';
          StudentController::save_err($e,  $url);
       }

    }
    // update students profile pic
    public function updateStupic(Request $stupro)
    {
        $stupro->validate([
            'image'=>'required|mimes:jpeg,png,jpg,gif',

        ]);
        $stuId = Session::get('stu_id');
        $student = Student::where('stu_id',$stuId)->get();
       // return $student;
        if($stupro->hasFile('image'))
        {
            $Stuimg = $stupro->file('image');
            $Stuimg_ext=$Stuimg->extension();
            $Stuimg_name="stu_pro".time()."_".rand().".".$Stuimg_ext;
            //return $Stuimg_name;
            $dest=public_path('assets/images/student');
            if($Stuimg->move($dest,$Stuimg_name))
            {
               $uptstu_img= Student::where('stu_id',$stuId)->update(['pic'=>$Stuimg_name]);
               if($uptstu_img)
               {
                  Session::flash('status','alert-success');
                  Session::flash('flash_message','Profile Pic Updated!');
                  return redirect('/student/edit_profile');
               }
               else
               {
                  Session::flash('status','alert-danger');
                  Session::flash('flash_message','Profile Pic Not Updated!');
                  return redirect('/student/edit_profile');
               }
            }
            else
            {
               Session::flash('status','alert-danger');
               Session::flash('flash_message','Image Not Saved!');
               return redirect('/student/edit_profile');
            }
         }
         else
         {
            Session::flash('status','alert-danger');
            Session::flash('flash_message','Image Not Found!');
            return redirect('/student/edit_profile');
         }

    }
    //update student Details
    public function UptPersonalInfo(Request $PerInfo)
    {
        $PerInfo->validate([
            'name'=>'required|min:3',
            'email'=>'required|email',
            'mobile'=>'required|min:10',
            'qualification'=>'required'

        ]);
        $stuId = Session::get('stu_id');
        $student = Student::where('stu_id',$stuId)->get();
        //return $student;
        $stu_name=$PerInfo->name;
        $stu_email=$PerInfo->email;
        $stu_mobile=$PerInfo->mobile;
        $stu_qualification=$PerInfo->qualification;
         $uptstu_det= Student::where('stu_id',$stuId)->update(['student_name'=>$stu_name,'email'=>$stu_email,'mobile'=>$stu_mobile,'education'=>$stu_qualification]);
         if($uptstu_det)
         {
            Session::flash('status','alert-success');
            Session::flash('flash_message','Details Successfully Updated!');
            return redirect('/student/edit_profile');
         }
         else
         {
            Session::flash('status','alert-danger');
            Session::flash('flash_message','Details Not Updated!');
            return redirect('/student/edit_profile');
         }

    }
    public function Stu_Enquiry()
    {
       try
       {
         $stu_id = Session::get('stu_id');
         $stu_name = Student::where(['stu_id'=>$stu_id])->get();
         return view('students.student_enquiry',['stu_name'=>$stu_name]);
       }
       catch(\Exception $ex)
       {
          $e = $ex->getMessage();
          $url = '/student/enquiry';
          StudentController::save_err($e,  $url);
       }

    }
    public function send_enquiry(Request $Req)
    {
      $Req->validate([
         'sname'=>'required',
         'mail'=>'required |email',
         'mobile'=>'required | numeric | min:4',
         'message'=>'required | min:10',
      ],
     [
         'sname.required'=>'Please enter number your name.',
         'mail.required'=>'Please enter your email.',
         'mobile.required'=>'Please enter mobile number.',
         'message.required'=>'Please write message',
         'message.min'=>'Please write country message min. 10 character',
     ]);
     $studentENQ = new Contact;
     $name = $Req->sname;
     $email = $Req->mail;
     $contact = $Req->mobile;
     $msg = $Req->message;
     $studentENQ->student_name=$name;
     $studentENQ->email=$email;
     $studentENQ->mobile= $contact;
     $studentENQ->message= $msg;
     if($studentENQ->save())
     {
         Session::flash('status','alert-success');
         Session::flash('flash_message','Thank you for contact we will response soon!');
         $data = ['name'=>$name, 'email'=>$email, 'contact'=>$contact, 'msg'=>$msg, 'sub'=>"sutudent Subjects"];
            $user['to']="divanshusahu7054166363@gmail.com";
            Mail::send('mail_contact', $data, function($message) use ($user){
            $message->to($user['to']);
            $message->subject('New enquiry from contact kakshaeducatio.com');
            });
         return redirect('/student/enquiry');
      }
      else
      {
         Session::flash('status','alert-danger');
         Session::flash('flash_message','Ohh something went wrong!');
         return redirect('/student/enquiry');
      }

    }
    public function buy_course(Request $req)
    {

      $ref_code = $req->reffer_by;
      if($ref_code==null || $ref_code=='')
      {
        return $this->buyCourseCode($req);
      }
      else
      {
      $stid= Student::where(['referal_id'=>$ref_code])->get('stu_id');
      $refferal_found=StudentCourse::where('student_id',$stid)
      ->where('course_id',$req->course_id)
      ->where('payment_status','Completed')->get();

      if($refferal_found->count()>0)
      {
       return  $this->buyCourseCode($req);
      }
      else
         {
            Session::flash('status','alert-danger');
            Session::flash('flash_message','Invalid Refferal code for this course please try again!');
            return redirect('/student/courses');
         }
        }
    }

    // Function for buy new course

    public function buyCourseCode($req)
    {
        $ref_code = $req->reffer_by;
        $StudentCourse = new StudentCourse;
        $StudentCourse->student_id = $req->student_id;
        $StudentCourse->course_id = $req->course_id;
        $StudentCourse->course_amt = $req->course_amt;
        $StudentCourse->refered_by = $ref_code;
        if($StudentCourse->save())
        {
           Session::flash('status','alert-success');
           Session::flash('flash_message','Course registred sucessfully make payment!');
           return redirect('/student/dashboard');
        }
        else
        {
           Session::flash('status','alert-danger');
           Session::flash('flash_message','Ohh something went wrong!');
           return redirect('/student/courses');
        }
    }

    public function UptBankInfo(Request $BankInfo)
    {
        $BankInfo->validate([
            'acname'=>'required|min:3',
            'acnumber'=>'required',
            'branch'=>'required',
            'ifsc'=>'required'

        ]);
        $stuId = Session::get('stu_id');
        $student = Student::where('stu_id',$stuId)->get();
        $ac_name=$BankInfo->acname;
        $ac_number=$BankInfo->acnumber;
        $branch=$BankInfo->branch;
        $ifsc=$BankInfo->ifsc;
         $uptbank_det= Student::where('stu_id',$stuId)->update(['acname'=>$ac_name,'acnumber'=>$ac_number,'branch'=>$branch,'ifsc'=>$ifsc]);
         if($uptbank_det)
         {
            Session::flash('status','alert-success');
            Session::flash('flash_message','Details Successfully Updated!');
            return redirect('/student/edit_profile');
         }
         else
         {
            Session::flash('status','alert-danger');
            Session::flash('flash_message','Details Not Updated!');
            return redirect('/student/edit_profile');
         }

    }
    public function checkout($cid)
    {
        $stuId = Session::get('stu_id');
       $stcourse=StudentCourse::join('courses','student_courses.course_id','courses.cour_id')
                                ->join('students','student_courses.student_id','students.stu_id')
                                ->where('student_id',$stuId)
                                ->where('course_id',$cid)
                                ->get();

        return view('students.checkout',['mycourse'=>$stcourse]);
    }
}
