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
        'isbn',
        'area_id',
        'stock_total',
        'stock_disponible',
    ];

    // Relación: un libro pertenece a un área de conocimiento
    public function areaConocimiento()
    {
        return $this->belongsTo(AreaConocimiento::class, 'area_id');
    }

    // Relación: un libro tiene muchas atenciones
    public function atenciones()
    {
        return $this->hasMany(Atencion::class, 'libro_id');
    }
}




