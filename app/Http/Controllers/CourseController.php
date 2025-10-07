<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = 'Mata Kuliah';
        $description = 'Daftar Mata Kuliah yang Anda ampu';

        $courses = Course::all();
        // dd($courses);

        return view('courses.index', compact('title', 'description', 'courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = 'Mata Kuliah';
        $description = 'Tambah Daftar Mata Kuliah yang Anda ampu';

        $course = Course::where('lecturer_id', auth()->id())->first();
        // dd($course);

        return view('courses.forms.create-course', compact('title', 'description', 'course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd(auth()->id());

        // $request->validate([
        //     'title' => 'required|string|max:255',
        //     'description' => 'nullable|string',
        // ]);

        // $course = new Course();
        // $course->name = $request->input('title');
        // $course->description = $request->input('description');
        // $course->lecturer_id = auth()->id();
        // $course->save();

        // return redirect()->route('courses.index')->with('success', 'Course created successfully.');
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $course = Course::create([
            'name' => $request->title,
            'description' => $request->description,
            'lecturer_id' => $request->user()->id
        ]);

        return response()->json([
            'message' => 'Course created successfully',
            'course' => $course
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $title = 'Mata Kuliah';
        $description = 'Tambah Daftar Mata Kuliah yang Anda ampu';

        $course = Course::where('id', $id)->first();
        // dd($course);

        return view('courses.forms.edit-course', compact('title', 'description', 'course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // $course = Course::findOrFail($id);
        // $request->validate([
        //     'title' => 'required|string|max:255',
        //     'description' => 'nullable|string',
        // ]);
        // $course->name = $request->input('title');
        // $course->description = $request->input('description');
        // $course->lecturer_id = auth()->id();
        // $course->save();

        // return redirect()->route('courses.index')->with('success', 'Course created successfully.');
        $course = Course::findOrFail($id);
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $course->name = $request->input('title');
        $course->description = $request->input('description');
        $course->lecturer_id = auth()->id();
        $course->save();

        // Return JSON jika diakses lewat API
        return response()->json([
            'message' => 'Course updated successfully',
            'course' => $course
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}
