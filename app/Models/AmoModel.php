<?php

namespace App\Models;

use CodeIgniter\Model;
use PHPUnit\Event\TestSuite\Filtered;

class AmoModel extends Model
{
    protected $table = 'amos';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'nombre',
        'apellido',
        'direccion',
        'telefono',
        'fechaAlta',
    ];

    /*
    Retorna todas las mascotas de un amo.
    Si fechaFinal = null es una mascota actual,
    caso contrario la mascota le pertenece al dueño.
    */
    public function getMascotasFromAmo($idAmo, $actuales = false)
    {
        $builder = $this->db->table('mascotas m')
            ->select('m.*, am.fechaInicio, am.fechaFinal, am.motivoFin, am.id')
            ->join('amo_mascota am', 'm.nroRegistro = am.idMascota')
            ->where('am.idAmo', $idAmo);

        // Si actuales = true, filtrar por fechaFinal NULL (mascotas actuales)
        if ($actuales) {
            $builder->where('am.fechaFinal IS NULL', null, false);
        }

        return $builder->get()->getResultArray();
    }

    public function deleteAmo_Mascota()
    {
        
    }
}
