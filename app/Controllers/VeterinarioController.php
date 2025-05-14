<?php

namespace App\Controllers;

use App\Models\VeterinarioModel;

class VeterinarioController extends BaseController {
    public function getAll()
    {
        $veterinarioModel = new VeterinarioModel();
        $data['veterinarios'] = $veterinarioModel->findAll();

        return view('veterinarios/index', $data);
    }

}
