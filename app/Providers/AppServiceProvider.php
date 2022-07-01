<?php

namespace App\Providers;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\ServiceProvider;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['students.includes.navbar'],function($view){

            $studentId = Session::get('stu_id');
            $student = Student::where('stu_id',$studentId)->get();
            $view->with(['student'=>$student]);
      });
      view()->composer(['students.dashboard'],function($view){

        $studentId = Session::get('stu_id');
        $student = Student::where('stu_id',$studentId)->get();
        $view->with(['student'=>$student]);
        });
        view()->composer(['teachers.includes.navbar'],function($view){

            $teacherId = Session::get('teach_id');
            $teacher = Teacher::where('teach_id',$teacherId)->get();
            $view->with(['teacher'=>$teacher]);
            });
    }
}
