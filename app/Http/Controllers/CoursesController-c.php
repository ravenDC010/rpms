<?php

namespace App\Http\Controllers;
use App\Course;

use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function view()
    {
        
        $data['allData']= Course::all();
        return view('courses.view_courses',$data);
    }
    public function add()
    {
        return view('courses.add_courses');
        dd('ok');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'course_id' => ['required', 'string', 'max:255'],
            'course_name' => ['required', 'string'],
            'p_name' => ['required', 'string'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
            'feature' => ['required', 'boolean'],
            'public' => ['required', 'boolean'],
            'thumbnail' => ['nullable', 'string'],
            'cover' => ['nullable', 'string'],
            'description' => ['required', 'string'],
        ]);

 
        Course::create([
            'course_id' => request('course_id'),
            'course_name' => request('course_name'),
            'p_name' => request('p_name'),
            'start_date' => request('sd'),
            'end_date' => request('ed'),
            'feature' => request('optradio1'),
            'public' => request('optradio2'),
            'thumbnail' => request('exampleInputFile1'),
            'cover' => request('exampleInputFile2'),
            'description' => request('exampleFormControlTextarea'),


        ]);
        return redirect()->route('course.view');
        //return back()->with('success', 'Successfully inserted a new car!');

    //     dd($request);
    //     $data=new Course();
    //     $data->course_id=$request->course_id;
    //     $data->course_name=$request->course_name;
    //     $data->p_name=$request->p_name;
    //     $data->start_date=$request->start_date;
    //     $data->end_date=$request->end_date;
    //     $data->feature=$request->feature;
    //     $data->public=$request->public;
    //     $data->thumbnail=$request->thumbnail;
    //     $data->cover=$request->cover;
    //     $data->description=$request->description;
    //     $data->save();
    //     return redirect()->route('users.view');
    }

    
}
