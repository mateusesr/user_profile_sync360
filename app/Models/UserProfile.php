<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'idade',
        'rua',
        'bairro',
        'cidade',
        'estado',
        'biografia',
        'imagem_perfil',
    ];
}
