<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maestro extends Model
{
    use HasFactory;
    protected $table = 'maestros';
    protected $fillable = [
        'id_delegacion',
        'id_users',
        'titulo',
        'nombre',
        'apaterno',
        'amaterno',
        'id_genero',
        'email',
        'telefono',
    ];


    /**
     * Get the delegacion that owns the Maestro
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function delegacion()
    {
        return $this->belongsTo(Delegacion::class, 'id_delegacion', 'id');
    }

    public function genero()
    {
        return $this->belongsTo(Genero::class, 'id_genero', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'id_user','id');
    }

    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'curso_usuarios', 'id_usuario', 'id_curso')
            ->withPivot('fecha', 'estado_curso')
            ->withTimestamps();
    }
}
