<?php

namespace App\Http\Controllers;
use App\Models\Exception;
use App\Models\Teacher;
use App\Models\Country;
use App\Models\CourseTeacher;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class TeacherController extends Controller
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
         return redirect('/techer');
      }
   }
   public function index()
   {
      try{
      return view('teachers.login');
      }
      catch(\Exception $ex)
      {
      $e = $ex->getMessage();
      $url = '/techer';
      TeacherController::save_err($e,  $url);
      }
      
   }
   // function for teacher login
   public function teacter_login(Request $req)
   {
      $validate= $req-> validate([
         'email'=> 'required |email',
         'password'=> 'required | min:6'
      ]);
      $email=$req->get('email');
      $password=md5($req->get('password'));
      //$res=Teacher::where(['email'=>$email, 'password'=>$password])->get();
      //return $res;
      $TeacherArr = array(
         'emailx'=>$email,
         'passx'=>$password
      );
      //return $TeacherArr;
      $result = DB::select('CALL teacher_login(:emailx,:passx)', $TeacherArr);
      $result;
      if(count($result)>0){
         $teachertid= $result[0]->teach_id;
         Session::put(['teach_id'=>$teachertid]);
         return redirect('/teacher/dashboard');
      }else{
         Session::flash('error', 'Invalid Login details');
         return redirect('/teacher');
      }
   }
   // teacher can change password 
   public function teacher_change_password(Request $Req_pass)
   {
      $Req_pass->validate([
            'old_password'=>'required|min:6|max:14',
            'new_password'=>'required|min:6|max:50',
            'Confirm_New_Password'=>'required|same:new_password'
      ]);
      $teacherID = Session::get('teach_id');
      //return $teacherID;
      $teacher_password = Teacher::where('teach_id',$teacherID)->get();
      //return $teacher_password;
      $current_password = md5($Req_pass->old_password);
      //return $current_password;
      $new_password = md5($Req_pass->newpassword);
      $confirm_pass= md5($Req_pass->Confirm_New_Password);
      //return $new_password."-".$confirm_pass."-current pass===".$current_password."//".$teacher_password;
      if($current_password == $teacher_password[0]['password'])
      {
            $teacher_password_update= Teacher::where('teach_id',$teacherID)->update(['password'=>$confirm_pass]);
            if($teacher_password_update){
               return redirect('/teacher/logout')->with('success', 'Password Successfully Changed.');
            }
      }
      else{
            return redirect('/teacher/dashboard')->with('errors', 'Old Password does not matched.');
      }
   }

   public function dashboard()
   {
      try{
         $teacherId = Session::get('teach_id');
         $assign_course = DB::table('course_teachers')
         ->join('courses','courses.cour_id','=','course_teachers.course_id')
         ->where('course_teachers.teacher_id',$teacherId)
         ->where('course_teachers.is_del',false)
         ->where('course_teachers.status',true)
         ->get();
         //dd($assign_course);
         return view('teachers.dashboard',['assign_course'=>$assign_course]);
      }
      catch(\Exception $ex)
      {
         $e = $ex->getMessage();
         $url = '/techer/dashboard';
         TeacherController::save_err($e,  $url);
      }
   }
   // for course overview
   public function CourseOverview($course_id)
   {
      try
      {
         $course_overview = Course::where(['cour_id'=>$course_id])->get();
         //return $course_overview;
         return view('teachers.course_overview',['course_overview'=>$course_overview]);
      }
      catch(\Exception $ex)
      {
         $e = $ex->getMessage();
         $url = "/techer/course_overview/$course_id";
         TeacherController::save_err($e,  $url);
      }
      
   }
   // for teacher profile
   public function profile()
   {
      try
      {
         $teachId = Session::get('teach_id');
         $teacher =  DB::table('teachers')
         ->join('countries','countries.id','=','teachers.country')
         ->join('states','states.id','=','teachers.state')
         ->join('cities','cities.id','=','teachers.city')
         ->where('teachers.teach_id',$teachId)
         ->where('teachers.is_del',false)
         ->where('teachers.status',true)
         ->get();
         return view('teachers.teacher_profile',['teacher'=>$teacher]);
      }
       catch(\Exception $ex)
      {
         $e = $ex->getMessage();
         $url = "/techer/profile";
         TeacherController::save_err($e,  $url);
      }
      
   }
   // for edit techer own profile
   public function EditProfile()
   {
      try
      {
         $teachId = Session::get('teach_id');
         $teacher =  DB::table('teachers')
         ->join('countries','countries.id','=','teachers.country')
         ->join('states','states.id','=','teachers.state')
         ->join('cities','cities.id','=','teachers.city')
         ->where('teachers.teach_id',$teachId)
         ->where('teachers.is_del',false)
         ->where('teachers.status',true)
         ->get();
         return view('teachers.edit_profile',['teacher'=>$teacher]);
      }
      catch(\Exception $ex)
      {
         $e = $ex->getMessage();
         $url = "/techer/profile";
         TeacherController::save_err($e,  $url);
      }
   }
   //Update Profile 
   public function updateTeachpic(Request $teachpro)
   {
      $teachpro->validate([
         'image'=>'required|mimes:jpeg,png,jpg,gif',
         
      ]);
      $teachId = Session::get('teach_id');
      $teacher = Teacher::where('teach_id',$teachId)->get();
      // return $student;
      if($teachpro->hasFile('image'))
      {
         $destination=public_path().'/assets/images/teacher/';
         if($teacher[0]['image']  != '' && $teacher[0]['image'] != null)
         {
            $oldpic = $destination.$teacher[0]['pic'];
            unlink($oldpic);
         }
         $teachimg = $teachpro->file('image');
         $teachimg_ext=$teachimg->extension();
         $teachimg_name="teach_pro".time()."_".rand().".".$teachimg_ext;
         //return $Stuimg_name;
         $dest=public_path('assets/images/teacher');
         if($teachimg->move($dest,$teachimg_name))
         {
            $uptteach_img= Teacher::where('teach_id',$teachId)->update(['pic'=>$teachimg_name]);
            if($uptteach_img)
            {
               Session::flash('status','alert-success');
               Session::flash('flash_message','Profile Pic Updated!');
               return redirect('/teacher/edit_profile');
            }
            else
            {
               Session::flash('status','alert-danger');
               Session::flash('flash_message','Profile Pic Not Updated!');
               return redirect('/teacher/edit_profile');
            }
         }
         else
         {
            Session::flash('status','alert-danger');
            Session::flash('flash_message','Image Not Saved!');
            return redirect('/teacher/edit_profile');
         }
      }
      else
      {
         Session::flash('status','alert-danger');
         Session::flash('flash_message','Image Not Found!');
         return redirect('/teacher/edit_profile');
      }
   }
   //update Teacher Details
   public function UptPersonalInfo(Request $PerInfo)
   {
      $PerInfo->validate([
         'name'=>'required|min:3',
         'email'=>'required|email',
         'mobile'=>'required|min:10',
         'address'=>'required'
         
      ]);
      $teachId = Session::get('teach_id');
      $teacher = Teacher::where('teach_id',$teachId)->get();
      //return $student;
      $teach_name=$PerInfo->name;
      $teach_email=$PerInfo->email;
      $teach_mobile=$PerInfo->mobile;
      $teach_address=$PerInfo->address;
      $uptstu_det= Teacher::where('teach_id',$teachId)->update(['teacher_name'=>$teach_name,'email'=>$teach_email,'mobile'=>$teach_mobile,'address'=>$teach_address]);
      if($uptstu_det)
      {
         Session::flash('status','alert-success');
         Session::flash('flash_message','Details Successfully Updated!');
         return redirect('/teacher/edit_profile');
      }
      else
      {
         Session::flash('status','alert-danger');
         Session::flash('flash_message','Details Not Updated!');
         return redirect('/teacher/edit_profile');
      }

   }
}
