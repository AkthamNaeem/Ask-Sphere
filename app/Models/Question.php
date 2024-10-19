<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Question extends Model
{
    use HasFactory;
    protected $table = "questions";
    protected $fillable = [
        'user_id',
        'category_id',
        'content',
        'photo',
        'is_answered',
    ];

    public function user(): HasMany {
        return $this->hasMany('users');
    }

    public function category(): HasMany {
        return $this->hasMany('categories');
    }

    public function answer(): BelongsTo {
        return $this->belongsTo('answers');
    }

    public function likes(): MorphMany
    {
        return $this->morphMany(Like::class, 'likeable');
    }
}
