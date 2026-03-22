<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AreaConocimiento extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'id';
    protected $table = 'area_conocimiento';

    protected $fillable = ['nombre'];

    // Relación: un área tiene muchos libros
    public function libros()
    {
        return $this->hasMany(Libro::class, 'area_id');
    }

    //Un area tiene muchas carreras
    public function carreras(){
        return $this->hasMany(Carrera::class, 'area_conocimiento_id');

    }
}




