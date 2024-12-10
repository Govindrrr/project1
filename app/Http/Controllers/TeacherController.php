<?php

namespace App\Http\Controllers;

use App\Models\level;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.teachers.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

       $subjects = Subject::all();
       $levels = level::all();
       return view('admin.teachers.create',compact('subjects','levels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $req->validate([
            "name"=>"required|max:255",
            "phone"=>"required|numeric|max_digits:10",
            "address"=>"required|max:255|",
            "email"=>"required|max:255|email|unique:users",
            "subject"=>"required|max:255",
            "levels"=>"required|max:255",
            "password"=>"required|min:8",
        ]);
        
        $user = new User();
        $user->name = $req->name;
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        
        $user->save();
        $user->subjects()->attach($req->subject);
        $user->levels()->attach($req->levels);
        return "sucessfull person";
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $user = User::find($id);
        $subjects = Subject::all();
        $levels = level::all();

        // return $user->levels;
        return view('admin.teachers.edit',compact('user','subjects','levels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        
        $req->validate([
            "name"=>"required|max:255",
            "phone"=>"required|numeric|max_digits:10",
            "address"=>"required|max:255|",
            "email"=>"required|max:255|email|unique:users,email,$id",
            "subject"=>"required|max:255",
            "levels"=>"required|max:255",
        ]);
        
        $user = User::find($id);
        $user->name = $req->name;
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        
        $user->update();
        $user->subjects()->sync($req->subject);
        $user->levels()->sync($req->levels);
        return redirect()->route('users.index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }

    
}
