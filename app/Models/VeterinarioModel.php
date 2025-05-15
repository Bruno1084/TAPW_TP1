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

    /*
    Retorna todos las mascotas de un veterinario.
    */
    public function getMascotasFromVeterinario(int $idVeterinario)
    {
        return $this->db->table('veterinario_mascota vm')
            ->select('m.*, vm.fechaAtencion, vm.motivoAtencion')
            ->join('mascotas m', 'vm.idMascota = m.nroRegistro')
            ->where('vm.idVeterinario', $idVeterinario)
            ->orderBy('vm.fechaAtencion', 'ASC')
            ->get()
            ->getResultArray();
    }
}
