<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notas extends Model
{
    use HasFactory;

     protected $table = 'notas';
     protected $primaryKey = 'id';
     public $timestamps = true;

    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha',
        'user_id',
        'estatus'
    ];

}
