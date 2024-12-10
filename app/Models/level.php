<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class level extends Model
{
    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class,'level_subject', 'level_id', 'subject_id');
    }
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
