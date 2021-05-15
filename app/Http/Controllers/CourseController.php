<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CourseController extends Controller
{
    public function index()
    {
        return view('course.index');
    }



    public function show(Course $course)
    {
        $this->Authorize('published',$course);

        $similares = Course::where('category_id', $course->category_id)
        ->where('id','!=',$course->id)
        ->where('status',3)
        ->latest('id')
        ->take(5)
        ->get();

        return view('course.show',compact('course','similares'));
    }

    public function enrolled(Course $course){
        $course->students()->attach(auth()->user()->id);

        return redirect()->route('courses.status',$course);
    }

}
