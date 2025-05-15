<?php

namespace App\Controllers;

use App\Models\VeterinarioModel;
use App\Types\Veterinario;

class VeterinarioController extends BaseController {
    public function getAll()
    {
        $veterinarioModel = new VeterinarioModel();
        $data['veterinarios'] = $veterinarioModel->findAll();

        return view('veterinarios/index', $data);
    }

        public function getOne($id)
    {
        $veterinarioModel = new VeterinarioModel();
        $veterinario = $veterinarioModel->find($id);

        if (!$veterinario) {
            return $this->response->setStatusCode(404)->setJSON([
                'error' => "Veterinario con ID $id no encontrado."
            ]);
        }

        return $this->response->setJSON($veterinario);
    }

    public function getMascotasFromVeterinario($idVeterinario)
    {
        $veterinarioModel = new VeterinarioModel();

        $data['mascotas'] = $veterinarioModel->getMascotasFromVeterinario($idVeterinario);

        return view('veterinarios/ver_veterinario', $data);
    }
}
