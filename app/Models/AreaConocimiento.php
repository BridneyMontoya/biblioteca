<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaConocimiento extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'area_conocimiento';

    protected $fillable = ['nombre'];

    // Relación: un área tiene muchos libros
    public function libros()
    {
        return $this->hasMany(Libro::class, 'area_id');
    }
}




