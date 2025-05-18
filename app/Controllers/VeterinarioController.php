<?php

namespace App\Controllers;

use App\Models\VeterinarioModel;

class VeterinarioController extends BaseController
{
    public function getAll()
    {
        $veterinarioModel = new VeterinarioModel();
        $data['veterinarios'] = $veterinarioModel->findAll();

        return view('veterinarios/index', $data);
    }

    public function getOne($id)
    {
        $veterinarioModel = new VeterinarioModel();

        $data['veterinario'] = $veterinarioModel->find($id);
        $data['mascotas'] = $veterinarioModel->getMascotasFromVeterinario($id);

        return view('veterinarios/ver_veterinario', $data);
    }

    public function getMascotasFromVeterinario($idVeterinario)
    {
        $veterinarioModel = new VeterinarioModel();

        $data['mascotas'] = $veterinarioModel->getMascotasFromVeterinario($idVeterinario);

        return view('veterinarios/ver_veterinario', $data);
    }
}
