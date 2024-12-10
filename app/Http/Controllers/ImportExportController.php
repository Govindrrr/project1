<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportExportController extends Controller
{
    public function store(Request $req){
    
        $req->validate([
            'image'=>'required|max:2048'
        ]);
        Excel::import(new UsersImport,$req->file('image'));
        return redirect()->back();
    }
    public function export(){
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
