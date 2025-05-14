<?php

namespace App\Models;

use CodeIgniter\Model;

class MascotaModel extends Model
{
    protected $table = 'mascotas';
    protected $primaryKey = 'nroRegistro';
    protected $returnType = 'array';
    protected $allowedFields = [
        'nombre',
        'expecie',
        'raza',
        'edad',
        'fechaAlta',
        'fechaDefuncion',
    ];
}
