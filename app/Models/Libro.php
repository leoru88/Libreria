<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $guarded = ['_token'];
    protected $fillable = ['titulo', 'autor', 'fecha_publicacion', 'genero'];

    public function autor()
    {
        return $this->belongsTo(Autor::class, 'autor', 'nombre_completo');
    }
}