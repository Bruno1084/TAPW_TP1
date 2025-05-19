<?php

namespace App\Controllers;

use App\Models\MascotaModel;
use App\Models\Veterinario_MascotaModel;
use App\Models\VeterinarioModel;
use App\Types\Veterinario;
use InvalidArgumentException;

class VeterinarioController extends BaseController
{
    // Get Routes
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

    // Create Routes
    public function getCreate()
    {
        return view('veterinarios/crear_veterinario');
    }

    public function postCreate()
    {
        $veterinarioModel = new VeterinarioModel();

        try {
            $veterinario = new Veterinario(
                0,
                $this->request->getPost('nombre'),
                $this->request->getPost('apellido'),
                $this->request->getPost('especialidad'),
                $this->request->getPost('telefono'),
                $this->request->getPost('fechaAlta'),
            );
        } catch (InvalidArgumentException $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }

        $data = [
            'id' => $veterinario->getId(),
            'nombre' => $veterinario->getNombre('nombre'),
            'apellido' => $veterinario->getApellido('apellido'),
            'especialidad' => $veterinario->getEspecialidad('especialidad'),
            'telefono' => $veterinario->getTelefono('telefono'),
            'fechaIngreso' => $veterinario->getFechaIngreso('fechaIngreso'),
            'fechaEgreso' => $veterinario->getFechaEgreso('fechaEgreso'),
        ];

        if (!$veterinarioModel->insert($data)) {
            return redirect()->back()->withInput()->with('errors', $veterinarioModel->errors());
        }

        return redirect()->to('/veterinarios')->with('message', 'Veterinario creado con éxito');
    }

    // Edit Routes
    public function getEdit($id)
    {
        $veterinarioModel = new VeterinarioModel();
        $data['veterinario'] = $veterinarioModel->find($id);

        return view('veterinarios/editar_veterinario', $data);
    }

    public function postEdit($id)
    {
        $veterinarioModel = new VeterinarioModel();

        try {
            $newVeterinario = new Veterinario(
                $id,
                $this->request->getPost('nombre'),
                $this->request->getPost('apellido'),
                $this->request->getPost('especialidad'),
                $this->request->getPost('telefono'),
            );

            $veterinario = $veterinarioModel->find($id);
        } catch (InvalidArgumentException $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }

        $data = [
            'nroRegistro' => $newVeterinario->getId(),
            'nombre' => $newVeterinario->getNombre('nombre'),
            'apellido' => $newVeterinario->getApellido('apellido'),
            'especialidad' => $newVeterinario->getEspecialidad('especialidad'),
            'telefono' => $newVeterinario->getTelefono('telefono'),
            'fechaIngreso' => $veterinario['fechaIngreso'],
            'fechaEgreso' => $veterinario['fechaEgreso'],
        ];

        if (!$veterinarioModel->update($newVeterinario->getId(), $data)) {
            return redirect()->back()->withInput()->with('errors', $veterinarioModel->errors());
        }

        return redirect()->to('/veterinarios')->with('message', 'Veterinario creada con éxito');
    }

    // Delete Routes
    public function getDelete($id)
    {
        $veterinarioModel = new VeterinarioModel();
        $veterinarioModel->delete($id);

        return view('veterinarios/index');
    }

    // Atender - Routes
    public function getAtender()
    {
        $veterinarioModel = new VeterinarioModel();
        $mascotaModel = new MascotaModel();

        $data['veterinarios'] = $veterinarioModel
            ->where('fechaEgreso', null)
            ->findAll();

        $data['mascotas'] = $mascotaModel
            ->where('fechaDefuncion', null)
            ->findAll();

        return view('veterinarios/atender_mascota', $data);
    }

    public function postAtender()
    {
        $idVeterinario = $this->request->getPost('idVeterinario');
        $idMascota = $this->request->getPost('nroRegistro');
        $fechaAtencion = $this->request->getPost('fechaAtencion');
        $motivoAtencion = $this->request->getPost('motivoAtencion');

        if (!$idVeterinario || !$idMascota || !$fechaAtencion || !$motivoAtencion) {
            return redirect()->back()->with('error', 'Todos los campos son obligatorios');
        }

        $veterinario_mascotaModel = new Veterinario_MascotaModel();

        $data = [
            'idVeterinario' => $idVeterinario,
            'idMascota' => $idMascota,
            'fechaAtencion' => $fechaAtencion,
            'motivoAtencion' => $motivoAtencion,
        ];

        if (!$veterinario_mascotaModel->insert($data)) {
            return redirect()->back()->withInput()->with('errors', $veterinario_mascotaModel->errors());
        }

        return redirect()->to('/veterinarios')->with('message', 'Atención registrada con éxito');
    }
}
