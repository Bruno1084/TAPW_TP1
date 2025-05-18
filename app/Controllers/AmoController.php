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
        $amoModel = new AmoModel();
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
        $mascotas = $amoModel->getMascotasFromAmo($idAmo);

        if (!$mascotas) {
            return $this->response->setStatusCode(404)->setJSON([
                'error' => "Mascotas no encontradas para el usuario " . $idAmo
            ]);
        }

        return $this->response->setJSON($mascotas);
    }

    public function getMascotasFromAmoView($idAmo){
        $amoModel = new AmoModel();
        $data['mascotas'] = $amoModel->getMascotasFromAmo($idAmo);


        return view('/amos/ver_amo', $data);
    }
}
