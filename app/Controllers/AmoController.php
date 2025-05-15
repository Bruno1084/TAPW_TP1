<?php

namespace App\Controllers;

use App\Models\AmoModel;

class AmoController extends BaseController
{
    public function getAll()
    {
        $amoModel = new AmoModel();
        $data['amos'] = $amoModel->findAll();

        return view('amos/index', $data);
    }

    public function getOne($id)
    {
        $amoModel = new \App\Models\AmoModel();
        $amo = $amoModel->find($id);

        if (!$amo) {
            return $this->response->setStatusCode(404)->setJSON([
                'error' => "Amo con ID $id no encontrado."
            ]);
        }

        return $this->response->setJSON($amo);
    }

    public function getMascotasFromAmo($idAmo)
    {
        $amoModel = new AmoModel();

        $data['mascotas'] = $amoModel->getMascotasFromAmo($idAmo);

        return view('amos/ver_amo', $data);
    }
}
