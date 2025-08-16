<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'apellido',
        'correo',
        'tipo_usuario',
        'carrera',
        'especialidad',
        'documento_id',
        'contraseña',
        'rol_id',
    ];

    // Relación: un usuario pertenece a un rol
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id');
    }

    // Relación: un usuario tiene muchas atenciones
    public function atenciones()
    {
        return $this->hasMany(Atencion::class, 'usuario_id');
    }
}
