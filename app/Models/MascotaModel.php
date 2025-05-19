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
        'especie',
        'raza',
        'edad',
        'fechaAlta',
        'fechaDefuncion',
    ];

    /* Retorna todos los amos de una mascota. */
    public function getAmosFromMascota(int $idMascota)
    {
        return $this->db->table('amo_mascota am')
            ->select('a.*, am.fechaInicio, am.fechaFinal, am.motivoFin')
            ->join('amos a', 'am.idAmo = a.id')
            ->where('am.idMascota', $idMascota)
            ->orderBy('am.fechaInicio', 'ASC')
            ->get()
            ->getResultArray();
    }

    /* Retorna solo mas mascotas no adoptadas y que no hayan fallecido. */
    public function getDisponibles()
    {
        return $this->select('mascotas.*')
            ->where('mascotas.fechaDefuncion', null)
            ->whereNotIn('mascotas.nroRegistro', function ($builder) {
                $builder->select('idMascota')
                    ->from('amo_mascota')
                    ->where('fechaFinal IS NULL');
            })
            ->findAll();
    }
}
