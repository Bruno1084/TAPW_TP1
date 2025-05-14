<?php

namespace App\Controllers;

use App\Models\AmoModel;
use App\Models\MascotaModel;

class MascotaController extends BaseController
{
    public function getAll()
    {
        $mascotaModel = new MascotaModel();

        $data['mascotas'] = $mascotaModel->findAll();

        return view('mascotas/index', $data);
    }

    public function getOne($nroRegistro)
    {
        $mascotaModel = new MascotaModel();
        $data['mascota'] = $mascotaModel->find($nroRegistro);

        if (!$data['mascota']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Mascota con ID $nroRegistro no encontrado.");
        }

        return view('mascotas/ver_mascota', $data);
    }
    
}
