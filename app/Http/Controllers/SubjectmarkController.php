<?php

namespace App\Http\Controllers;

use App\Models\level;
use App\Models\Mark;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectmarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $levels = level::all();
        $subjects = Subject::all();
        return view('admin.user.index',compact('levels','subjects','user'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create( Request $req)
    {

        $req->validate([
            "subject"=>"required",
        ]);
        $marks = Mark::where('grade',$req->grade)
        ->where('subject',$req->subject)
        ->where('section',$req->section)
        ->orderBy('roll_no', 'asc')->get();

        //changing the string to int to get grade and subjec inorder to store in session.
        session([
            "sub"=>$req->subject,
            "level"=>$req->grade,
            "section"=>$req->section,
        ]);
        $grade1 = session('level');
        $subject1 = session('sub');

        $grade = level::find($grade1)->level;
        $subject = Subject::find($subject1)->name;

        //session for the view and other uses.
        session([
           
            "grade"=>$grade,
            "subject"=>$subject,
            "marks"=>$marks 
        ]);

        
        
        $roll = Mark::where('grade',$grade1)->where('subject',$subject1)->max('roll_no');
        session()->put('previous_url', url()->current());
        return view('admin.user.create',compact('roll')); 

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        if($req->save == 'save'){
            $req->validate([
                "roll_no"=>"required|max:50|unique:marks,roll_no,NULL,id,grade,". session('level') . ',subject,' . session('sub'),
                "marks"=>"required|numeric|max:100"
            ]);
            $marks = new Mark();
            $marks->roll_no = $req->roll_no;
            $marks->marks = $req->marks;
            $marks->section = session('section');
            $marks->grade = session('level');
            $marks->subject = session('sub');
    
            $marks->save();
            toast('New marks Added!','success');

            return redirect()->back()->with('success', 'Item added successfully.');
        }
    
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
        $mark = Mark::find($id);
        return view('admin.user.edit',compact('mark'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        //
        $req->validate([
            "roll_no"=>"required|max:50|unique:marks,roll_no,$id,id,grade,". session('level') . ',subject,' . session('sub'),
            "marks"=>"required|numeric|max:100"
        ]);
        $marks = Mark::find($id);
         $marks->roll_no = $req->roll_no;
         $marks->marks = $req->marks;
   

           $marks->update();
           toast('Marks updated Added!','success');

         return redirect()->route('submarks.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mark = Mark::find($id);
        $marks = session('marks');
        

        if($mark){
            $mark->delete();
            toast('Marks Deleted !','warning');

            return redirect()->back();

        }
        else{

        }
    }
}
