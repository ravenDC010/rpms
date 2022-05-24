<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Level;


class LevelController extends Controller
{
    function add($id){
        $course= Course::find($id);

        // dd($course);
        return view('levels.add_level',['course' => $course]);
    }

    public function store(Request $request, $id)
    {

        $validatedData = $request->validate([
            'level_name' => ['required', 'string', 'max:255'],
            'number' => ['required', 'integer'],
        ]);

        Level::create([
            'course_id' => $id,
            'level_name' => request('level_name'),
            'number' => request('number'),
        ]);
        return back()->with('success', 'Successfully added a new level!');

    }

}
