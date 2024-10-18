<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Answer extends Model
{
    use HasFactory;
    protected $table = "answers";
    protected $fillable = [
        'user_id',
        'question_id',
        'content',
    ];

    public function user(): HasMany {
        return $this->hasMany('users');
    }

    public function question(): HasMany {
        return $this->hasMany('questions');
    }

    public function likes(): MorphMany
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function reports(): MorphMany
    {
        return $this->morphMany(Like::class, 'reportable');
    }
}
