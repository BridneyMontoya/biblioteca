<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'titulo',
        'autor',
        'editorial',
        'anio',
        'ISBN',
        'id_area',
        'stock_total',
        'stock_disp',
    ];

    // Relación: un libro pertenece a un área de conocimiento
    public function areaConocimiento()
    {
        return $this->belongsTo(AreaConocimiento::class, 'id_area');
    }

    // Relación: un libro tiene muchas atenciones
    public function atenciones()
    {
        return $this->hasMany(Atencion::class, 'libro_id');
    }
}




