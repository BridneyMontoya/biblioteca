<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carrera extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'id';
    protected $table = 'carreras';

    protected $fillable = [
        'nombre',
        'area_conocimiento_id',


    ];

    //Relacion: una carrera pertenece a un area

    public function area(){
            return $this->belongsTo(AreaConocimiento::class, 'area_conocimiento_id');
        }
}
