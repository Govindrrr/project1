<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::all();
        $faculties = Faculty::all();
        

        return view('admin.subjects.index',compact('subjects','faculties'));
    }

    /**
     * Show the form focreating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"=>"required|max:255|unique:subjects,name",
            "faculty"=>"required|max:255"
        ]);

        $subject = new Subject();
        $subject->name = $request->name;
        $subject->save();

        $subject->faculties()->attach($request->faculty);
        toast('New Subject Added!','success');

        return redirect()->back();

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
        $subject = Subject::find($id);
        $subject->delete();
        return redirect()->route('subjects.index');

        
    }
}
