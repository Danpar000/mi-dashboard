<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personaje extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'edad', 'genero', 'historia'];

    public function videoJuegos()
    {
        return $this->belongsToMany(VideoJuego::class, 'video_juego_personaje');
    }
}
