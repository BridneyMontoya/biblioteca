<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atencion extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'usuario_id',
        'libro_id',
        'tipo_atencion',
        'fecha_atencion',
        'fecha_devol',
        'estado',
    ];

    // Relación: una atención pertenece a un usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    // Relación: una atención pertenece a un libro
    public function libro()
    {
        return $this->belongsTo(Libro::class, 'libro_id');
    }
}


