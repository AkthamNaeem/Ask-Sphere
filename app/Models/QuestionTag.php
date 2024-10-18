<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class QuestionTag extends Model
{
    use HasFactory;
    protected $table = "question_tags";
    protected $fillable = [
        'question_id',
        'tag_id',
    ];

    public function question(): HasMany {
        return $this->hasMany('questions');
    }

    public function tag(): HasMany {
        return $this->hasMany('tags');
    }
}
