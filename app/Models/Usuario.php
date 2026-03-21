<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'id';

    protected $fillable = [
        'nombres',
        'apellidos',
        'correo',
        'tipo_usuario',
        'carrera_id',
        'especialidad_id',
        'documento_id',
        'numero_documento',
        'rol_id',
    ];

    // Relación: un usuario pertenece a un rol
    public function rol()
    {
        return $this->belongsTo(Rol::class);
    }

    // Relación: un usuario tiene muchas atenciones
    public function atenciones()
    {
        return $this->hasMany(Atencion::class);
    }

    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }

    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class);
    }

    public function documento()
    {
        return $this->belongsTo(Documento::class);
    }
}
