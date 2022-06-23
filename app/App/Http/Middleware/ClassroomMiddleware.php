<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Domains\Course\Models\UserCourse;

class ClassroomMiddleware
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
        if ($request->has('matriculation_number')) {
            $userCourse = UserCourse::query()
                ->where('matriculation_number', $request->matriculation_number)
                ->where('user_id', auth()->user()->id)
                ->first();

            if ($userCourse) {
                session(['userCourse' => $userCourse]);
            } else {
                alert()->error('Incorrect matriculation number');
            }
        }

        if (session()->has('userCourse')) {
            $userCourse = UserCourse::query()
                ->where('matriculation_number', session('userCourse')->matriculation_number)
                ->where('user_id', auth()->user()->id)
                ->first();
            if ($userCourse) {
                session(['userCourse' => $userCourse]);
            }
        }

        return $next($request);
    }
}
