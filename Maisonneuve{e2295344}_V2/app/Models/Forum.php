<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'user_id'
    ];


/**
 * 
 *  Définit une relation belongTo entre le modèle actuel et le modèle "User".
 * La fonction permet de récupérer l'utilisateur auquel appartient l'objet en question
 * https://laravel.com/docs/10.x/eloquent-relationships#one-to-many-inverse
 */

}