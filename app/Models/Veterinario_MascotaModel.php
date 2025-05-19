<?php

namespace App\Models;

use CodeIgniter\Model;

class Veterinario_MascotaModel extends Model
{
    protected $table = 'veterinario_mascota';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'idVeterinario',
        'idMascota',
        'fechaAtencion',
        'motivoAtencion',
    ];
}
