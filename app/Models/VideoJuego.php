<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoJuego extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'descripcion', 'genero'];

    public function personajes()
    {
        return $this->belongsToMany(Personaje::class, 'video_juego_personaje');
    }
}
