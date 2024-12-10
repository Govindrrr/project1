<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Subject extends Model
{
    /**
     * The Faculties that belong to the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function faculties(): BelongsToMany
{
    return $this->belongsToMany(Faculty::class, 'faculty_subject','subjects_id','faculties_id');
}

    public function levels(): BelongsToMany
{
    return $this->belongsToMany(level::class,'level_subject', 'subject_id', 'level_id');
}
    public function users(): BelongsToMany
{
    return $this->belongsToMany(User::class,'subject_user', 'subject_id', 'user_id');
}

}