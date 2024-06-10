<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $table = 'cursos';
    protected $fillable = [
        'nombre',
        'fecha_creacion',
        'descripcion',
    ];

    public function maestros()
    {
        return $this->belongsToMany(Maestro::class, 'curso_usuario', 'id_curso', 'id_maestro')
            ->withPivot('fecha', 'estado_curso')
            ->withTimestamps();
    }
}