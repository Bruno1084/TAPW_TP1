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
        $data['amo'] = $amoModel->find($id);

        if (!$data['amo']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Amo con ID $id no encontrado.");
        }

        return view('amos/ver_amo', $data);
    }

    public function getMascotasFromAmo($idAmo)
    {
        $amoModel = new AmoModel();

        $data['mascotas'] = $amoModel->getMascotasFromAmo($idAmo);

        return view('amos/ver_amo', $data);
    }
}
