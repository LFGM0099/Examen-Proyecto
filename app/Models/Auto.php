<?php

// app/Models/Auto.php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    use HasFactory;

    // Indicamos que la clave primaria es 'id_auto'
    protected $primaryKey = 'id_auto'; 
    protected $table = 'autos';

    public $timestamps = false;

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'marca',
        'modelo',
        'anio',
        'motor',
    ];

}