<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Contact;
use App\Models\Career;
use App\Models\CourseTeacher;
use App\Models\Exception;
use Illuminate\Http\Request;
use App\Http\Requests\AddCourseReq;
use App\Http\Requests\TeacherRequest;
use Illuminate\Support\Facades\DB;
use Session;
use Mail;
class AdminController extends Controller
{
    // exepton function 
    public function save_err($err_msg, $err_url)
    {
        $Exception = new Exception;
        $Exception->err_message = $err_msg;
        $Exception->url = $err_url;
        $Exception->status = "found";
        if($Exception->save()){
            return redirect('/admin');
        }
    }
    // admin login page
    public function index()
    {
        return view('admin.login');
    }
    public function admin_login(Request $req)
    {
        $validate= $req-> validate([
            'Username'=> 'required |email',
            'Password'=> 'required | min:6'
        ]);

        $email=$req->get('Username');
        $password=md5($req->get('Password'));
        $adminArr = array(
          'emailx'=>$email,
          'passx'=>$password
        );
        $result = DB::select('CALL admin_login(:emailx,:passx)', $adminArr);
        if(count($result)>0){
            $admin_id= $result[0]->admin_id;
           Session::put(['admin'=>$admin_id]);
           return redirect('/admin/dashboard');
        }else{
            Session::flash('error', 'Invalid Login details');
            return redirect('/admin');
        }
    }
    // admin can change password 
    public function change_password()
    {
        return view('admin.change_password');
    }
    public function admin_change_password(Request $Req_pass)
    {
        $Req_pass->validate([
            'old_password'=>'required|min:6|max:14',
            'new_password'=>'required|min:6|max:50',
            'Confirm_New_Password'=>'required|same:new_password'
        ]);
        $adminId = Session::get('admin');
        //return $adminId;
        $admin_password = Admin::where('admin_id',$adminId)->first();
        //return $admin_password;
        $current_password = md5($Req_pass->old_password);
        //return $current_password;
        $new_password = md5($Req_pass->newpassword);
        $confirm_pass= md5($Req_pass->Confirm_New_Password);
        //return $new_password."-".$confirm_pass."-current pass===".$current_password."//".$admin_password;
        if($current_password == $admin_password['password'])
        {
            $admin_password_update= Admin::where('admin_id',$adminId)->update(['password'=>$confirm_pass]);
            if($admin_password_update){
                return redirect('/admin/logout')->with('success', 'Password Successfully Changed.');
            }
        }
        else{
            return redirect('/admin/dashboard')->with('errors', 'Old Password does not matched.');
        }
    }
    //admin view dashboard
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    // function for get state with country id
    public function get_state($id)
    {
        $resq="<option disabled selected>--Select State---</option>";
        $state = State::where(['country_id'=>$id])->get();
        foreach($state as $st){
            $resq=$resq."<option value='".$st['id']."'>".$st['state_name']."</option>";
        }
        return $resq;
    }
    // function for get city with country Id and  state id
    public function get_city($stid)
    {
        $resq="<option disabled selected>--Select City---</option>";
        $city = City::where(['state_id'=>$stid, 'is_del'=>false])->get();
        //return $city;
        foreach($city as $c){
            $resq=$resq."<option value='".$c['id']."'>".$c['city_name']."</option>";
        }
        return $resq;
    }


    /*courses functions statrt here
    admin course listing*/
    public function courses()
    {
        try{
            $course = Course::where('is_del', false)->orderBy('cour_id', 'DESC')->get();
            return view('admin.courses',['course'=>$course]);
        }
        catch(\Exception $ex)
        {
            $e = $ex->getMessage();
            $url = '/admin/list/courses';
            AdminController::save_err($e,  $url);
        }
        
    }
    //course form view
    public function add_course()
    {
        try{
            return view('admin.add_course');
        }
        catch(\Exception $ex)
        {
            $e = $ex->getMessage();
            $url = '/admin/list/courses';
            AdminController::save_err($e,  $url);
        }
        
    }
    // course saved
    public function add_course_save(AddCourseReq $CourseReq)
    {
        if($CourseReq->hasFile('pic') && $CourseReq->hasFile('pic_2')){
            $course_img=$CourseReq->file('pic');
            $pic1_ext=$CourseReq->pic->extension();
            $pic_name="COURSE_IMG".time().".".$pic1_ext;
            $pic1_dest=public_path('assets/images/course');
            //pic 2
            $course_img2=$CourseReq->file('pic_2');
            $pic2_ext=$CourseReq->pic_2->extension();
            $pic2_name="COURSE_IMG2".time().".".$pic2_ext;
            $pic2_dest=public_path('assets/images/course');
            
            if($course_img->move($pic1_dest, $pic_name) && $course_img2->move($pic2_dest,$pic2_name))
            {
                $course = new Course;
                $course_name = $CourseReq->course;
                $alias = str_replace(" ","-",$course_name);
                $course->course_name = $course_name;
                $course->alias = $alias;
                $course->price = $CourseReq->course_price;
                $course->offer_pice = $CourseReq->offer_pice;
                $course->referal_pice = $CourseReq->referal_pice;
                $course->duration = $CourseReq->duration;
                $course->pic = $pic_name;
                $course->pic_2 = $pic2_name;
                $course->video_link = $CourseReq->video_link;
                $course->short_desc = $CourseReq->short_desc;
                $course->long_desc = $CourseReq->long_desc;
                if($course->save())
                {
                    Session::flash('status','alert-success');
                    Session::flash('flash_message','Course saved successfully!');
                    return redirect('/admin/list/courses');
                }
                else
                {
                    Session::flash('status','alert-danger');
                    Session::flash('flash_message','Course not saved!');
                    return redirect('/admin/course');
                }
            }
            else
            {
                Session::flash('status','alert-danger');
                Session::flash('flash_message','image not uploaded!');
                return redirect('/admin/course');
            }
        }
        
    }
    //course update form view
    public function course_update_view($id)
    {
        try{
            $upt_course = Course::where('cour_id',$id)->get();
            return view('admin.update_course',['update'=>$upt_course]);
        }
        catch(\Exception $ex)
        {
            $e = $ex->getMessage();
            $url = "/admin/course/update/$id";
            AdminController::save_err($e,  $url);
        }
        
    }
    //course update
    public function course_update(AddCourseReq $CourseReq, $id)
    {
        $update_course=Course::where('cour_id',$id)->get();
        //return $update_course;
        if($CourseReq->hasFile('pic') && $CourseReq->hasFile('pic_2')){
            $destination=public_path().'/assets/images/course/';
            if($update_course[0]['pic']  != '' && $update_course[0]['pic'] != null && $update_course[0]['pic_2']  != '' && $update_course[0]['pic_2'] != null)
            {
                $oldpic_1= $destination.$update_course[0]['pic'];
                $oldpic_2= $destination.$update_course[0]['pic_2'];
                unlink($oldpic_1);
                unlink($oldpic_2);
            }
            $course_img=$CourseReq->file('pic');
            $pic1_ext=$CourseReq->pic->extension();
            $pic_name="COURSE_IMG".time().".".$pic1_ext;
            $pic1_dest=public_path('assets/images/course');
            //pic 2
            $course_img2=$CourseReq->file('pic_2');
            $pic2_ext=$CourseReq->pic_2->extension();
            $pic2_name="COURSE_IMG2".time().".".$pic2_ext;
            $pic2_dest=public_path('assets/images/course');
            if($course_img->move($pic1_dest, $pic_name) && $course_img2->move($pic2_dest,$pic2_name))
            {
                $course_name = $CourseReq->course;
                $alias = str_replace(" ","-",$course_name);
                $price = $CourseReq->course_price;
                $offer_pice = $CourseReq->offer_pice;
                $referal_pice = $CourseReq->referal_pice;
                $duration = $CourseReq->duration;
                $pic = $pic_name;
                $pic_2 = $pic2_name;
                $video_link = $CourseReq->video_link;
                $short_desc = $CourseReq->short_desc;
                $long_desc = $CourseReq->long_desc;
                $up_course=Course::where('cour_id',$id)->update(['course_name'=>$course_name, 'alias'=>$alias, 'price'=>$price, 'offer_pice'=>$offer_pice, 'referal_pice'=>$referal_pice, 'duration'=>$duration, 'pic'=>$pic, 'pic_2'=>$pic_2, 'video_link'=>$video_link, 'short_desc'=>$short_desc, 'long_desc'=>$long_desc]);
                if($up_course)
                {
                    Session::flash('status','alert-success');
                    Session::flash('flash_message','Course updated successfully!');
                    return redirect('/admin/list/courses');
                }
                else
                {
                    Session::flash('status','alert-danger');
                    Session::flash('flash_message','Course not updated!');
                    return redirect('/admin/list/courses');
                }
            }
            else
            {
                Session::flash('status','alert-danger');
                Session::flash('flash_message','image not uploaded!');
                return redirect('/admin/list/courses');
            }
            

        }
    }
    public function course_view($id)
    {
        try{
            $course = Course::where('cour_id', $id)->where('is_del',false)->get();
            //dd($course);
            return view('admin.view_course',['course'=>$course]);
        }
        catch(\Exception $ex)
        {
            $e = $ex->getMessage();
            $url = "/admin/course/view/$id";
            AdminController::save_err($e,  $url);
        }
        
    }
    // course status enable/disable
    public function course_status(Request $req,$id,$status)
    {
        $status_c = Course::where('cour_id',$id)->update(['status'=>filter_var($status, FILTER_VALIDATE_BOOLEAN)]);
        $status = Course::where('cour_id',$id)->get('status');
        if($status_c)
        {
            if($status[0]['status'] == true){
                Session::flash('status','alert-success');
                Session::flash('flash_message','Course enabled!');
                return redirect('/admin/list/courses');
            }
            else
            {
                Session::flash('status','alert-danger');
                Session::flash('flash_message','Course disabled!');
                return redirect('/admin/list/courses');
            }
        }
        else{
            Session::flash('status','alert-danger');
            Session::flash('flash_message','Not worked!');
            return redirect('/admin/list/courses');
        }
    }
    //course deleted
    public function course_delete($id)
    {
        $delete_c = Course::where('cour_id',$id)->update(['is_del'=>1]);
        if($delete_c)
        {
            Session::flash('status','alert-danger');
            Session::flash('flash_message','Course deleted!');
            return redirect('/admin/list/courses');
        }
        else
        {
            Session::flash('status','alert-danger');
            Session::flash('flash_message','Not worked!');
            return redirect('/admin/list/courses');
        }
    }
    /*courses functions list end here  */

    /*teachers functions list start here  */
    public function list_teachers()
    {
        try{
            $teacher = Teacher::where(['is_del'=>false, 'status'=>true])->get();
        //dd($teacher);
        $blocked_teacher = Teacher::where(['is_del'=>false, 'status'=>false])->get();
        return view('admin.list_teachers',['teacher'=>$teacher, 'block_teacher'=>$blocked_teacher]);
        }
        catch(\Exception $ex)
        {
            $e = $ex->getMessage();
            $url = '/admin/teachers/list';
            AdminController::save_err($e,  $url);
            
        }
    }
    
    public function add_teacher()
    {
        try{
            $Country = Country::where('is_del',false)->get();
            //dd($Country);
            return view('admin.add_teacher',['country'=>$Country]);
        }
        catch(\Exception $ex)
        {
            $e = $ex->getMessage();
            $url = '/admin/teachers/add';
            AdminController::save_err($e,  $url);
        }
        
    }
    public function save_teacher(TeacherRequest $TeacherReq)
    {
        if($TeacherReq->hasFile('pic') && $TeacherReq->hasFile('cv'))
        {
            //profile pic
            $profile_img=$TeacherReq->file('pic');
            $profile_ext=$TeacherReq->pic->extension();
            $profile_pic_name="IMAGE".time().".".$profile_ext;
            $image_dest=public_path('assets/images/teacher');
            //CV
            $cv=$TeacherReq->file('cv');
            $cv_ext=$TeacherReq->cv->extension();
            $cv_name="CV".time().".".$cv_ext;
            $cv_dest=public_path('assets/cv/teacher');
            if($profile_img->move($image_dest, $profile_pic_name) && $cv->move($cv_dest,$cv_name))
            {
                $Teacher = new Teacher;
                $teacherName = $TeacherReq->teacher;
                $Teacher_pass = $TeacherReq->password;
                $teacher_email = $TeacherReq->email;
                $Teacher->teacher_name = $teacherName;
                $Teacher->email = $teacher_email;
                $Teacher->mobile = $TeacherReq->contact;
                $Teacher->pic = $profile_pic_name;
                $Teacher->highest_quali = $TeacherReq->highest_qualification;
                $Teacher->country = $TeacherReq->country;
                $Teacher->state = $TeacherReq->state;
                $Teacher->city = $TeacherReq->city;
                $Teacher->pin_code = $TeacherReq->pin_code;
                $Teacher->address = $TeacherReq->address;
                $Teacher->cv = $cv_name;
                $pass = md5($Teacher_pass);
                $Teacher->password = $pass;
                if($Teacher->save())
                {
                    Session::flash('status','alert-success');
                    Session::flash('flash_message','Teacher added successfully!');
                    $data = ['name'=>$teacherName, 'email'=>$teacher_email, 'password'=>$Teacher_pass];
                    $user['to']=$teacher_email;
                    Mail::send('admin.mail_teacher', $data, function($message) use ($user){
                    $message->to($user['to']);
                    $message->subject('Welcome to the Kaksha Education');
                    });
                    return redirect('/admin/teachers/list');
                }
            }else{
                Session::flash('status','alert-danger');
                Session::flash('flash_message','image not uploaded!');
                return redirect('/admin/teachers/add');
            }
        }
        else{
            Session::flash('status','alert-danger');
            Session::flash('flash_message','Something went wrong!');
            return redirect('/admin/teachers/add');
        }
    }
    // techer blocked/unblocked
    public function teacher_block(Request $req,$id,$status)
    {
        $status_t = Teacher::where('teach_id',$id)->update(['status'=>filter_var($status, FILTER_VALIDATE_BOOLEAN)]);
        $status = Teacher::where('teach_id',$id)->get('status');
        //return $status;
        if($status_t)
        {
            if($status[0]['status'] == true){
                Session::flash('status','alert-success');
                Session::flash('flash_message','Teacher Unblocked!');
                return redirect('/admin/teachers/list');
            }
            else
            {
                Session::flash('status','alert-danger');
                Session::flash('flash_message','Teacher Blocked!');
                return redirect('/admin/teachers/list');
            }
        }
        else{
            Session::flash('status','alert-danger');
            Session::flash('flash_message','Not worked!');
            return redirect('/admin/teachers/list');
        }
    }
    public function view_teacher($id)
    {
        try{
            $teacher =  DB::table('teachers')
            ->join('countries','countries.id','=','teachers.country')
            ->join('states','states.id','=','teachers.state')
            ->join('cities','cities.id','=','teachers.city')
            ->where('teachers.teach_id',$id)
            ->where('teachers.is_del',false)
            ->where('teachers.status',true)
            ->get();
            $course_teacher =  DB::table('course_teachers')
            ->join('courses','courses.cour_id','=','course_teachers.course_id')
            ->where('course_teachers.teacher_id',$id)
            ->where('course_teachers.is_del',false)
            ->where('course_teachers.status',true)
            ->get();
            $course = Course::where(['is_del'=>false, 'status'=>true])->get();
            return view('admin.view_teacher')->with(['teacher'=>$teacher, 'course'=>$course, 'course_teacher'=>$course_teacher]);
        }catch(\Exception $ex)
        {
            $e = $ex->getMessage();
            $url = '/admin/teacher/view/'.$id;
            AdminController::save_err($e,  $url);
        }
    }
    public function edit_teacher($id)
    {
        try{
            $Country = Country::where('is_del',false)->get();
            $teacher = Teacher::where(['teach_id'=>$id,'is_del'=>false, 'status'=>true])->get();
            return view('admin.edit_teacher',['country'=>$Country, 'teacher'=>$teacher]);
        }
        catch(\Exception $ex)
        {
            $e = $ex->getMessage();
            $url = '/admin/teacher/update/'.$id;
            AdminController::save_err($e,  $url);
        }
        
    }
    public function teacher_update(Request $TeacherReq, $id)
    {
        $update_teacher = Teacher::where('teach_id',$id)->get();
        //return $update_teacher;
        if($TeacherReq->hasFile('pic')){
            $destination=public_path().'/assets/images/teacher/';
            if($update_teacher[0]['pic']  != '' && $update_teacher[0]['pic'] != null)
            {
                $oldpic = $destination.$update_teacher[0]['pic'];
                unlink($oldpic);
            }
            //profile pic
            $profile_img=$TeacherReq->file('pic');
            $profile_ext=$TeacherReq->pic->extension();
            $profile_pic_name="IMAGE".time().".".$profile_ext;
            $image_dest=public_path('assets/images/teacher');
            //CV
            $cv=$TeacherReq->file('cv');
            $cv_ext=$TeacherReq->cv->extension();
            $cv_name="CV".time().".".$cv_ext;
            $cv_dest=public_path('assets/cv/teacher');
            if($profile_img->move($image_dest, $profile_pic_name) && $cv->move($cv_dest,$cv_name))
            {
                $teacher_name = $TeacherReq->teacher;
                $email = $TeacherReq->email;
                $contact = $TeacherReq->contact;
                $pic = $profile_pic_name;
                $country = $TeacherReq->country;
                $state = $TeacherReq->state;
                $city = $TeacherReq->city;
                $pin_code = $TeacherReq->pin_code;
                $address = $TeacherReq->address;
                $highest_qualification = $TeacherReq->highest_qualification;
                $cv = $cv_name;
                $up_teacher=Teacher::where('teach_id',$id)->update(['teacher_name'=>$teacher_name, 'email'=>$email, 'mobile'=>$contact, 'pic'=>$pic, 'highest_quali'=>$highest_qualification, 'country'=>$country, 'state'=>$state, 'city'=>$city, 'pin_code'=>$pin_code, 'address'=>$address, 'cv'=>$cv]);
                if($up_teacher)
                {
                    Session::flash('status','alert-success');
                    Session::flash('flash_message','Teacher profile updated successfully!');
                    return redirect('/admin/teachers/list');
                }
                else
                {
                    Session::flash('status','alert-danger');
                    Session::flash('flash_message','Teacher profile not updated!');
                    return redirect('/admin/teachers/list');
                }
            }
            else
            {
                Session::flash('status','alert-danger');
                Session::flash('flash_message','image not uploaded!');
                return redirect('/admin/teachers/list');
            }
            

        }
    }


    public function teacher_delete($id)
    {
        $delete_t = Teacher::where('teach_id',$id)->update(['is_del'=>1]);
        if($delete_t)
        {
            Session::flash('status','alert-danger');
            Session::flash('flash_message','Teacher deleted!');
            return redirect('/admin/teachers/list');
        }
        else
        {
            Session::flash('status','alert-danger');
            Session::flash('flash_message','Not Deleted!');
            return redirect('/admin/teachers/list');
        }
    }
    public function assign_techer_course(Request $ReqAssignCourse)
    {
        $validate= $ReqAssignCourse-> validate([
            'course'=> 'required',
        ]);
        $assign_course = new CourseTeacher;
        $teacher =  $ReqAssignCourse->teacher_id;
        $assign_course->course_id = $ReqAssignCourse->course;
        $assign_course->teacher_id = $teacher;
        
        $teacher_profile = "/admin/teacher/view/".$teacher;
        if($assign_course->save())
        {
            Session::flash('status','alert-success');
            Session::flash('flash_message','Course Assigned!');
            return redirect($teacher_profile);
        }else{
            Session::flash('status','alert-danger');
            Session::flash('flash_message','Course not Assigned!');
            return redirect($teacher_profile);
        }
    }
    public function assign_techer_course_delete($id, $teach_id)
    {
        $teacher_profile = "/admin/teacher/view/".$teach_id;
        $delete_teacher_course = CourseTeacher::find($id);
        if($delete_teacher_course->delete())
        {
            Session::flash('status','alert-danger');
            Session::flash('flash_message','Course Deleted!');
            return redirect($teacher_profile);
        }else{
            Session::flash('status','alert-danger');
            Session::flash('flash_message','Course not Deleted!');
            return redirect($teacher_profile);
        }

    }

    /*teachers functions list end here  */
    /**
     * list of student function started here
     */
    public function list_student()
    {
        try{
            $student = Student::where(['is_del'=>false, 'status'=>true])->get();
        $blocked_student = Student::where(['is_del'=>false, 'status'=>false])->get();
        return view('admin.list_student',['student'=>$student, 'block_student'=>$blocked_student]);
        }
        catch(\Exception $ex)
        {
            $e = $ex->getMessage();
            $url = '/admin/student/list';
            AdminController::save_err($e,  $url);
        }
        
    }
    // student blocked/unblocked
    public function student_block(Request $req,$id,$status)
    {
        $status_s = Student::where('stu_id',$id)->update(['status'=>filter_var($status, FILTER_VALIDATE_BOOLEAN)]);
        $status = Student::where('stu_id',$id)->get('status');
        //return $status;
        if($status_s)
        {
            if($status[0]['status'] == true){
                Session::flash('status','alert-success');
                Session::flash('flash_message','Student Unblocked!');
                return redirect('/admin/student/list');
            }
            else
            {
                Session::flash('status','alert-danger');
                Session::flash('flash_message','Teacher Blocked!');
                return redirect('/admin/student/list');
            }
        }
        else{
            Session::flash('status','alert-danger');
            Session::flash('flash_message','Not worked!');
            return redirect('/admin/student/list');
        }
    }
    public function student_delete($id)
    {
        $delete_s = Student::where('stu_id',$id)->update(['is_del'=>1]);
        if($delete_s)
        {
            Session::flash('status','alert-danger');
            Session::flash('flash_message','Student deleted!');
            return redirect('/admin/student/list');
        }
        else
        {
            Session::flash('status','alert-danger');
            Session::flash('flash_message','Not Deleted!');
            return redirect('/admin/student/list');
        }
    }
    public function view_student($id)
    {
        try{
            $student = Student::where(['is_del'=>false, 'status'=>true])->get();
        //dd($student);
        return view('admin.view_student')->with(['student'=>$student]);
        }
        catch(\Exception $ex)
        {
            $e = $ex->getMessage();
            $url = '/admin/student/view/'.$id;
            AdminController::save_err($e,  $url);
        }
        
    }
    /**
     * student functions lists end here
     */
    /**
     * enquiries and careers listing functions start here
     */
    public function list_contacts()
    {
        try{
            $contact = Contact::where(['is_del'=>false, 'status'=>false])->get();
        $completed_enq = Contact::where(['is_del'=>false, 'status'=>true])->get();
        return view('admin.list_contact',['contact'=>$contact, 'cpmed_enq'=>$completed_enq]);
        }
        catch(\Exception $ex)
        {
            $e = $ex->getMessage();
            $url = '/admin/enquires/list';
            AdminController::save_err($e,  $url);
        }
    }
    public function enq_delete($id)
    {
        $delete_con = Contact::where('id',$id)->update(['is_del'=>1]);
        if($delete_con)
        {
            Session::flash('status','alert-danger');
            Session::flash('flash_message','Enquiry deleted!');
            return redirect('/admin/enquires/list');
        }
        else
        {
            Session::flash('status','alert-danger');
            Session::flash('flash_message','Not Deleted!');
            return redirect('/admin/enquires/list');
        }
    }
    public function enq_complete(Request $req,$id,$status)
    {
        $status_com = Contact::where('id',$id)->update(['status'=>filter_var($status, FILTER_VALIDATE_BOOLEAN)]);
        $status = Contact::where('id',$id)->get('status');
        //return $status;
        if($status_com)
        {
            if($status[0]['status'] == true){
                Session::flash('status','alert-success');
                Session::flash('flash_message','Enquiry completed!');
                return redirect('/admin/enquires/list');
            }
            else
            {
                Session::flash('status','alert-danger');
                Session::flash('flash_message','Enquiry not completed!');
                return redirect('/admin/enquires/list');
            }
        }
        else{
            Session::flash('status','alert-danger');
            Session::flash('flash_message','Not worked!');
            return redirect('/admin/enquires/list');
        }
    }
    public function list_careers()
    {
        try{
            $Career = Career::where(['is_del'=>false, 'status'=>false])->get();
            $completed_Career = Career::where(['is_del'=>false, 'status'=>true])->get();
            return view('admin.list_careers',['career'=>$Career, 'cpmed_career'=>$completed_Career]);
        }
        catch(\Exception $ex)
        {
            $e = $ex->getMessage();
            $url = '/admin/careers/list';
            AdminController::save_err($e,  $url);
        }
       
    }
    public function careers_delete($id)
    {
        $delete_career = Career::where('id',$id)->update(['is_del'=>1]);
        if($delete_career)
        {
            Session::flash('status','alert-danger');
            Session::flash('flash_message','Career deleted!');
            return redirect('/admin/careers/list');
        }
        else
        {
            Session::flash('status','alert-danger');
            Session::flash('flash_message','Not Deleted!');
            return redirect('/admin/careers/list');
        }
    }
    public function career_complete(Request $req,$id,$status)
    {
        $status_career = Career::where('id',$id)->update(['status'=>filter_var($status, FILTER_VALIDATE_BOOLEAN)]);
        $status = Career::where('id',$id)->get('status');
        //return $status;
        if($status_career)
        {
            if($status[0]['status'] == true){
                Session::flash('status','alert-success');
                Session::flash('flash_message','Enquiry completed!');
                return redirect('/admin/careers/list');
            }
            else
            {
                Session::flash('status','alert-danger');
                Session::flash('flash_message','Enquiry not completed!');
                return redirect('/admin/careers/list');
            }
        }
        else{
            Session::flash('status','alert-danger');
            Session::flash('flash_message','Not worked!');
            return redirect('/admin/careers/list');
        }
    }
    /**
     * enquiries and careers listing functions end here
     */
}
