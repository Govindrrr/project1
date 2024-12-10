<?php

namespace App\Imports;

use App\Models\Result;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        return new Result([
            'Name'=>$row['name'],
            'roll_no'=>$row['roll_no'],
            'grade'=>$row['grade'],
            'result'=>$row['result'],
            'GPA'=>$row['gpa'],
            'exam_id'=>$row['exam_id'],
            'total'=>$row['total'],
        ]);
    }
}
