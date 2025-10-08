<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = 'Materi';
        $description = 'Daftar Materi yang tersedia';
        $materi = Material::with('course')->get();
        // dd($materi);
        return view('material.index', compact('title', 'description', 'materi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = 'Materi';
        $description = 'Daftar Materi yang tersedia';
        // dd($materi);

        $courses = Course::all();

        return view('material.forms.create-material', compact('title', 'description', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,doc,docx,ppt,pptx,txt|max:2048',
        ]);
        // dd($request->all());

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time().'_'.$file->getClientOriginalName();
            $filePath = $file->storeAs('materials', $fileName, 'public');

            $material = new Material();
            $material->course_id = $request->input('course_id');
            $material->title = $request->input('title');
            $material->file_path = $filePath;
            $material->save();

            return redirect()->route('materials.index')->with('success', 'Materi berhasil diunggah.');
        }

        return back()->withErrors(['file' => 'File upload failed'])->withInput();
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
