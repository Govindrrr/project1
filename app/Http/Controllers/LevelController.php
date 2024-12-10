<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\level;
use Illuminate\Http\Request;


class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::all();
        $levels = level::all();
        return view('admin.levels.index',compact('subjects','levels'));
    }

    /**
     * Show the form for creating a new resource.
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
            "level"=>"required|max:255|unique:subjects,name",
            "subject"=>"required"
        ]);

        $level = new level();
        $level->level = $request->level;
        $level->save();

        $level->subjects()->attach($request->subject);
        toast('New Class Added!','success');

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
        $subjects = Subject::all();
        $level = level::find($id);
        $level->subjects()->detach();

        return view('admin.levels.edit',compact('level','subjects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "level"=>"required|max:255|unique:subjects,name, $id",
            "subject"=>"required"
        ]);

        $level = level::find($id);
        $level->level = $request->level;
        $level->update();

        $level->subjects()->sync($request->subject);
        toast('Class updated','success');

        return redirect()->route('levels.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
