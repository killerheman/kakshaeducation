<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\RazorpayPaymentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/course/test',[HomeController::class,'test']);
//test url end
Route::get('/',[HomeController::class,'index']);
Route::post('/enquiry',[HomeController::class,'saveenquiry']);
Route::get('/about',[HomeController::class,'about']);
Route::get('/contact',[HomeController::class,'contact']);
Route::post('/savecontact',[HomeController::class,'savecontact']);
Route::get('/registration',[HomeController::class,'register']);
Route::post('/sturegistration',[HomeController::class,'registerstu']);
Route::get('/courses',[HomeController::class,'course']);
Route::get('/career',[HomeController::class,'career']);
Route::post('/career/save',[HomeController::class,'career_submit']);
Route::get('/privacy_policy',[HomeController::class,'privacy']);
Route::get('/refund_policy',[HomeController::class,'refund']);
Route::get('terms_conditions',[HomeController::class,'terms']);
Route::get('/disclaimer',[HomeController::class,'disclaimer']);
Route::get('/login',[HomeController::class,'login']);
Route::get('/course/{id}/{alias}',[HomeController::class,'course_overview']);

//admin urls
Route::get('admin',[AdminController::class,'index']);
Route::post('admin',[AdminController::class,'admin_login']);
//admin route started here with middlware
Route::group(['prefix'=>'admin','middleware'=>['Admin']],function() {
    Route::get('/dashboard',[AdminController::class,'dashboard']);
    Route::get('/changepassword',[AdminController::class,'change_password']);
    Route::post('/changepassword',[AdminController::class,'admin_change_password']);
    Route::get('/state/{country}',[AdminController::class,'get_state']);
    Route::get('/city/{state}',[AdminController::class,'get_city']);
    //course urls start here
    Route::get('/list/courses',[AdminController::class,'courses']);
    Route::get('/course',[AdminController::class,'add_course']);
    Route::post('/course',[AdminController::class,'add_course_save']);
    Route::get('/course/update/{id}',[AdminController::class,'course_update_view']);
    Route::post('/course/update/{id}',[AdminController::class,'course_update']);
    Route::get('/course/view/{id}',[AdminController::class,'course_view']);
    Route::get('/course/status/{id}/{status}',[AdminController::class,'course_status']);
    Route::get('/course/delete/{id}',[AdminController::class,'course_delete']);
    //course url end here
    //teachers link start here
    Route::get('/teachers/list',[AdminController::class,'list_teachers']);
    Route::get('/teachers/add',[AdminController::class,'add_teacher']);
    Route::post('/teachers/add',[AdminController::class,'save_teacher']);
    Route::get('/teacher/block/{id}/{status}',[AdminController::class,'teacher_block']);
    Route::get('/teacher/view/{id}',[AdminController::class,'view_teacher']);
    Route::get('/teacher/update/{id}',[AdminController::class,'edit_teacher']);
    Route::post('/teacher/update/{id}',[AdminController::class,'teacher_update']);
    Route::get('/teacher/delete/{id}',[AdminController::class,'teacher_delete']);
    Route::post('/teachers/assign/course',[AdminController::class,'assign_techer_course']);
    Route::get('/teacher/course/assigned/delete/{id}/{tid}',[AdminController::class,'assign_techer_course_delete']);
    //teachers link end here
    //student link start here
    Route::get('/student/list',[AdminController::class,'list_student']);
    Route::get('/student/block/{id}/{status}',[AdminController::class,'student_block']);
    Route::get('/student/delete/{id}',[AdminController::class,'student_delete']);
    Route::get('/student/view/{id}',[AdminController::class,'view_student']);
    //student link end here
    //enq links start here
    Route::get('/enquires/list',[AdminController::class,'list_contacts']);
    Route::get('/enquiry/delete/{id}',[AdminController::class,'enq_delete']);
    Route::get('/enquiry/complete/{id}/{status}',[AdminController::class,'enq_complete']);
    Route::get('/careers/list',[AdminController::class,'list_careers']);
    Route::get('/career/delete/{id}',[AdminController::class,'careers_delete']);
    Route::get('/career/complete/{id}/{status}',[AdminController::class,'career_complete']);
    //enq links start here
});
//admin route end here with middlware
//admin logout
Route::get('/admin/logout',function(){
    Session::forget('admin');
    return redirect('/');
});
//admin logout

// teacher route stated here
// route for teachers
Route::get('/teacher',[TeacherController::class,'index']);
Route::post('/teacher/login',[TeacherController::class,'teacter_login']);
Route::group(['prefix'=>'teacher','middleware'=>['Teacher']],function() {
    Route::get('/dashboard',[TeacherController::class,'dashboard']);
    Route::get('/profile',[TeacherController::class,'profile']);
    Route::post('/profile/img',[TeacherController::class,'updateTeachpic']);
    Route::post('/profile/details',[TeacherController::class,'UptPersonalInfo']);
    Route::get('/course_overview/{cours_id}',[TeacherController::class,'CourseOverview']);
    Route::get('/edit_profile',[TeacherController::class,'EditProfile']);
    Route::post('/changepassword',[TeacherController::class,'teacher_change_password']);
});
//teacher logout
Route::get('/teacher/logout',function(){
    Session::forget('teach_id');
    return redirect('/');
});
//teacher logout

// studet route stated here
Route::get('/student',[StudentController::class,'Student_Login']);
Route::post('/stulogin',[StudentController::class,'stulogin']);
Route::group(['prefix'=>'student','middleware'=>['Student']],function() {
    Route::get('/dashboard',[StudentController::class,'index']);
    Route::get('/profile',[StudentController::class,'profile']);
    Route::post('/profile/img',[StudentController::class,'updateStupic']);
    Route::post('/profile/details',[StudentController::class,'UptPersonalInfo']);
    Route::get('/course/{id}/{alias}',[StudentController::class,'CourseOverview']);
    Route::get('/edit_profile',[StudentController::class,'EditProfile']);
    Route::post('/bank/details',[StudentController::class,'UptBankInfo']);
    Route::get('/enquiry',[StudentController::class,'Stu_Enquiry']);
    Route::post('/enquiry',[StudentController::class,'send_enquiry']);
    Route::get('/courses',[StudentController::class,'courses']);
    Route::post('/course/buy',[StudentController::class,'buy_course']);
    Route::post('/changepassword',[StudentController::class,'student_change_password']);
    Route::get('/check/{cour_id}',[StudentController::class,'checkout']);
});
//student logout
Route::get('/student/logout',function(){
    Session::forget('stu_id');
    return redirect('/student');
});
//student logout



Route::get('razorpay-payment', [RazorpayPaymentController::class, 'index']);
Route::post('razorpay-payment', [RazorpayPaymentController::class, 'store'])->name('razorpay.payment.store');
