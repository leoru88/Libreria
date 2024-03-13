<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $table = 'autores';
    protected $fillable = ['nombre_completo', 'fecha_nacimiento', 'lugar_nacimiento', 'resumen_personal', 'bibliografia', 'email'];

    public static function boot()
    {
        parent::boot();

        static::created(function ($autor) {
            $titulos = $autor->libros->pluck('titulo')->implode(', ');
            $autor->update(['bibliografia' => $titulos]);
        });
    }

    public function libros()
    {
        return $this->hasMany(Libro::class, 'autor', 'nombre_completo');
    }
}
