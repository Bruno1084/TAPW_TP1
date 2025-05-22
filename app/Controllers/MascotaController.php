<?php

namespace App\Controllers;

use App\Models\Amo_MascotaModel;
use App\Models\MascotaModel;
use App\Models\Veterinario_MascotaModel;
use App\Types\Mascota;
use InvalidArgumentException;

class MascotaController extends BaseController
{
    // Get Routes
    public function getAll()
    {
        $mascotaModel = new MascotaModel();
        $builder = $mascotaModel;

        $nombre = $this->request->getGet('nombre');
        $especie = $this->request->getGet('especie');
        $raza = $this->request->getGet('raza');
        $edad = $this->request->getGet('edad');
        $estado = $this->request->getGet('estado');

        if ($nombre) {
            $builder->like('nombre', $nombre);
        }

        if ($especie) {
            $builder->like('especie', $especie);
        }

        if ($raza) {
            $builder->like('raza', $raza);
        }

        if ($edad !== null && $edad !== '') {
            $builder->where('edad', $edad);
        }

        $data['mascotas'] = $builder->findAll();

        return view('mascotas/index', $data);
    }

    public function getOne($id)
    {
        $mascotaModel = new MascotaModel();

        $data['mascota'] = $mascotaModel->find($id);
        $data['amos'] = $mascotaModel->getAmosFromMascota($id);

        return view('mascotas/ver_mascota', $data);
    }


    // Create Routes
    public function getCreate()
    {
        return view('mascotas/crear_mascota');
    }

    public function postCreate()
    {
        $mascotaModel = new MascotaModel();

        try {
            $mascota = new Mascota(
                0,
                $this->request->getPost('nombre'),
                $this->request->getPost('especie'),
                $this->request->getPost('raza'),
                $this->request->getPost('edad'),
                $this->request->getPost('fechaAlta'),
            );
        } catch (InvalidArgumentException $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }

        $data = [
            'nroRegistro' => $mascota->getNroRegistro(),
            'nombre' => $mascota->getNombre('nombre'),
            'especie' => $mascota->getEspecie('especie'),
            'raza' => $mascota->getRaza('raza'),
            'edad' => $mascota->getEdad('edad'),
            'fechaAlta' => $mascota->getFechaAlta('fechaAlta'),
            'fechaDefuncion' => $mascota->getFechaDefuncion('fechaDefuncion'),
        ];

        if (!$mascotaModel->insert($data)) {
            return redirect()->back()->withInput()->with('errors', $mascotaModel->errors());
        }

        return redirect()->to('/mascotas')->with('message', 'Mascota creada con éxito');
    }


    // Edit Routes
    public function getEdit($id)
    {
        $mascotaModel = new MascotaModel();
        $data['mascota'] = $mascotaModel->find($id);

        return view('mascotas/editar_mascota', $data);
    }

    public function postEdit($id)
    {
        $mascotaModel = new MascotaModel();

        try {
            $newMascota = new Mascota(
                $id,
                $this->request->getPost('nombre'),
                $this->request->getPost('especie'),
                $this->request->getPost('raza'),
                $this->request->getPost('edad'),
                null,
                $this->request->getPost('fechaDefuncion'),
            );

            $mascota = $mascotaModel->find($id);
        } catch (InvalidArgumentException $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }

        $data = [
            'nroRegistro' => $newMascota->getNroRegistro(),
            'nombre' => $newMascota->getNombre('nombre'),
            'especie' => $newMascota->getEspecie('especie'),
            'raza' => $newMascota->getRaza('raza'),
            'edad' => $newMascota->getEdad('edad'),
            'fechaAlta' => $mascota['fechaAlta'],
            'fechaDefuncion' => $newMascota->getFechaDefuncion('fechaDefuncion'),
        ];

        if (!$mascotaModel->update($newMascota->getNroRegistro(), $data)) {
            return redirect()->back()->withInput()->with('errors', $mascotaModel->errors());
        }

        return redirect()->to('/mascotas')->with('message', 'Mascota creada con éxito');
    }

    // Delete Routes
    public function getDelete($id)
    {
        $mascotaModel = new MascotaModel();
        $mascotaModel->deleteMascota($id);

        return redirect()->to('/mascotas');
    }
}
