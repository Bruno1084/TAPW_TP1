<?php

namespace App\Models;

use CodeIgniter\Model;

class VeterinarioModel extends Model
{
    protected $table = 'veterinarios';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'nombre',
        'apellido',
        'especialidad',
        'telefono',
        'fechaIngreso',
        'fechaEgreso',
    ];
}
