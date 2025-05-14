<?php

namespace App\Controllers;

use App\Models\AmoModel;
use App\Models\MascotaModel;

class MenuPrincipal extends BaseController
{
    public function index(): string
    {
        return view('/MenuPrincipal');
    }

    public function getMostrar()
    {
        return view('/mostrar');
    }

    public function getAlta()
    {
        return view('/alta');
    }

    public function postAmoMascota()
    {
        $amoModel = new AmoModel();
        $mascotaModel = new MascotaModel();

        $amo = $this->request->getPost('');

    }

    public function getBaja()
    {
        return view('/baja');
    }

    public function getModificacion()
    {
        return view('/modificacion');
    }
}
