<?php

namespace App\Http\Middleware;

use App\Models\Student;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class StudentsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $studentId = $request->route('id');
        $userId = Auth::user()->id;


        $student = Student::findOrFail($studentId);
        $studentUserID = $student->user_id;

        if ($userId != $studentUserID) {
            return back();
        }

        return $next($request);
    }
}
