<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faculties = Faculty::all();
       return view('admin.faculty.index',compact('faculties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"=>"required|max:255|unique:faculties,name"
        ]);

        $faculty = new Faculty();
        $faculty->name = $request->name;
        $faculty->save();
        toast('New Faculty Added!','success');

        return redirect()->route('faculties.index');
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
        $faculty = Faculty::find($id);
        return view('admin.faculty.edit',compact('faculty'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name"=>"required|max:255|unique:faculties,name, $id"
        ]);

        $faculty = Faculty::find($id);
        $faculty->name = $request->name;
        $faculty->update();
        toast('Faculty updated!','success');

        return redirect()->route('faculties.index');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       
        $faculty = Faculty::find($id);
        
        $faculty->delete();
        toast('Faculty deleted !','warning');
        return redirect()->route('faculties.index');
    }
}
