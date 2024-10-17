<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tag extends Model
{
    use HasFactory;
    protected $table = "tags";
    protected $fillable = [
        'name'
    ];

    public function question_tag(): BelongsTo {
        return $this->belongsTo('question_tags');
    }
}
