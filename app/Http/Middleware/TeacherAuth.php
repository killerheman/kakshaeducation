<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

class TeacherAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $teacher = Session::get('teach_id');
        if($teacher == '' || $teacher == null)
        {
            return redirect('/');
        }
        return $next($request);
    }
}
