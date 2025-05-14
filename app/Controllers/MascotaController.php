<?php

namespace App\Controllers;

use App\Models\MascotaModel;

class MascotaController extends BaseController
{
    public function getAll()
    {
        $mascotaModel = new MascotaModel();

        $data['mascotas'] = $mascotaModel->findAll();

        return view('mascotas/index', $data);
    }

    public function getAmosfromMascota($idMascota)
    {
        $mascotaModel = new MascotaModel();
        $data['amos'] = $mascotaModel->getAmosfromMascota($idMascota);

        return view('mascotas/ver_mascota', $data);
    }
}
