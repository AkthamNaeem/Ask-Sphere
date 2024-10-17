<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Like extends Model
{
    use HasFactory;
    protected $table = "likes";
    protected $fillable = [
        'user_id',
        'likeable_id',
        'likeable_type',
    ];

    public function user(): HasMany {
        return $this->hasMany('users');
    }

    public function likeable(): MorphTo
    {
        return $this->morphTo();
    }
}
