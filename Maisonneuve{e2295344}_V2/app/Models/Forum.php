<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;
    protected $fillable = [
        'fr_title',
        'fr_content',
        'en_title',
        'en_content',
        'user_id',

    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


}