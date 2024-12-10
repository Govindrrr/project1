<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Faculty extends Model
{
    /**
     * The subjects that belong to the Faculty
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class,'faculty_subject', 'faculites_id', 'subjects_id');
    }
    
}
