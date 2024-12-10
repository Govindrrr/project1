<?php

namespace App\Http\Controllers;

use App\Models\level;
use App\Models\Mark;
use App\Models\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $levels = level::all();
        return view('admin.results.index',compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $req)
    {
        $req->validate([
            "grade"=>"required",
        ]);
        $grade = level::find($req->grade)->level;
        $grade_id = $req->grade;

        session([
            "grade"=>$grade,
            "grade_id"=>$grade_id
        ]);
        $results = Result::where('grade',$req->grade)->get();
        return view('admin.results.view',compact('results'));




    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $req->validate([
            "name"=>"required|max:255",
            "roll"=>"required|max:255",
            "grade"=>"required|max:50",
        ]);
        $marks = Mark::where('grade',$req->grade)
                    ->where('roll_no',$req->roll)
                    ->get();

                    
        $totalMarks = $marks->sum('marks');
        $minMarks = $marks->min('marks');
        $gpa = ($totalMarks/300*100)/25;
        if($minMarks < 20){
            $status = "fail";
        }
        else{
            $status = "pass";
        }

        $result = new Result();
        $result->grade = $req->grade;
        $result->roll_no = $req->roll;
        $result->Name = $req->name;
        $result->result = $status;
        $result->total = 300;
        $result->GPA = $gpa;
        $result->save();
        return redirect()->back();
        
        


       
        

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
