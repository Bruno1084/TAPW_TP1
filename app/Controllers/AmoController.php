<?php

namespace App\Controllers;

use App\Models\AmoModel;
use App\Types\Amo;
use InvalidArgumentException;

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
        $data['mascotas'] = $amoModel->getMascotasFromAmo($id);

        return view('amos/ver_amo', $data);
    }

    public function getEdit($id)
    {
        $amoModel = new AmoModel();
        $data['amo'] = $amoModel->find($id);

        return view('amos/editar_amo', $data);
    }

    public function postEdit($id)
    {
        $amoModel = new AmoModel();

        try {
            $newAmo = new Amo(
                $id,
                $this->request->getPost('nombre'),
                $this->request->getPost('apellido'),
                $this->request->getPost('direccion'),
                $this->request->getPost('telefono'),
            );

            $amo = $amoModel->find($id);
        } catch (InvalidArgumentException $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }

        $data = [
            'nombre' => $newAmo->getNombre('nombre'),
            'apellido' => $newAmo->getApellido('apellido'),
            'direccion' => $newAmo->getDireccion('direccion'),
            'telefono' => $newAmo->getTelefono('telefono'),
            'fechaAlta' => $amo['fechaAlta'],
        ];

        if (!$amoModel->update($newAmo->getId(), $data)) {
            return redirect()->back()->withInput()->with('errors', $amoModel->errors());
        }

        return redirect()->to('/amos')->with('message', 'Tarea creada con éxito');
    }
}
