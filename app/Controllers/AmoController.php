<?php

namespace App\Controllers;

use App\Models\Amo_MascotaModel;
use App\Models\AmoModel;
use App\Models\MascotaModel;
use App\Types\Amo;
use InvalidArgumentException;

class AmoController extends BaseController
{
    // Get Routes
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

    // Create Routes
    public function getCreate()
    {
        return view('amos/crear_amo');
    }

    public function postCreate()
    {
        $amoModel = new AmoModel();

        try {
            $mascota = new Amo(
                0,
                $this->request->getPost('nombre'),
                $this->request->getPost('apellido'),
                $this->request->getPost('direccion'),
                $this->request->getPost('telefono'),
                $this->request->getPost('fechaAlta'),
            );
        } catch (InvalidArgumentException $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }

        $data = [
            'id' => $mascota->getId(),
            'nombre' => $mascota->getNombre('nombre'),
            'apellido' => $mascota->getApellido('apellido'),
            'direccion' => $mascota->getDireccion('direccion'),
            'telefono' => $mascota->getTelefono('telefono'),
            'fechaAlta' => $mascota->getFechaAlta('fechaAlta'),
        ];

        if (!$amoModel->insert($data)) {
            return redirect()->back()->withInput()->with('errors', $amoModel->errors());
        }

        return redirect()->to('/amos')->with('message', 'Amo creado con éxito');
    }

    // Edit Routes
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

    // Delete Routes
    public function getDelete($id)
    {
        $amoModel = new AmoModel();
        $amoModel->delete($id);

        return view('amos/index');
    }

    // Amo Adoptar
    public function getAdoptar()
    {
        $amoModel = new AmoModel();
        $mascotaModel = new MascotaModel();

        $data['amos'] = $amoModel->findAll();
        $data['mascotas'] = $mascotaModel->getDisponibles();

        return view('amos/adoptar_mascota', $data);
    }



    public function postAdoptar()
    {
        $idAmo = $this->request->getPost('idAmo');
        $idMascota = $this->request->getPost('nroRegistro');
        $fechaInicio = $this->request->getPost('fechaInicio');

        if (!$idAmo || !$idMascota || !$fechaInicio) {
            return redirect()->back()->with('error', 'Todos los campos son obligatorios');
        }

        $amo_mascotaModel = new Amo_MascotaModel();

        $data = [
            'idAmo' => $idAmo,
            'idMascota' => $idMascota,
            'fechaInicio' => $fechaInicio,
            'fechaFinal' => null,
            'motivoFin' => null
        ];

        if (!$amo_mascotaModel->insert($data)) {
            return redirect()->back()->withInput()->with('errors', $amo_mascotaModel->errors());
        }

        return redirect()->to('/amos')->with('message', 'Adopción registrada con éxito');
    }
}
