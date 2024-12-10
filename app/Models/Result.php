<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = [
        'Name',
        'roll_no',
        'grade',
        'result',
        'GPA',
        'exam_id',
        'total'
       
    ];
}
