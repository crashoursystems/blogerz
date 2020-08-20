<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('admin.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) 
    {
        $path = $request->file('path')->store('uploads', 'public');
        course::create([
            'name' => $request->name,
            'description' => $request->content,
            'photo_avatar' => $path
        ]);
        session()->flash('success','Курс успешно создан');
        return redirect()->route('course.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = course::find($id);
        return view('admin.course.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $course = course::find($id);
        if(isset($request->path)){
            $path = $request->file('path')->store('uploads', 'public');
        } else {
            $path = $course->path;
        }

        $course->update([
            'name' => $request->name,
            'description' => $request->content,
            'photo_avatar' => $path
        ]);
        session()->flash('success','Курс успешно обновлен');
        return redirect()->route('course.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        course::where('id', $id)->delete();
        session()->flash('success','Курс успешно удален');
        return redirect()->route('course.index');
    }
}
