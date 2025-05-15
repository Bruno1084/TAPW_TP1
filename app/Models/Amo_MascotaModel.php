<?php

namespace App\Models;

use CodeIgniter\Model;

class Amo_MascotaModel extends Model
{
    protected $table = 'amo_mascota';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'idAmo',
        'idMascota',
        'fechaInicio',
        'fechaFinal',
        'motivoFin'
    ];
}
