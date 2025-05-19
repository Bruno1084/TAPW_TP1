<?php

namespace App\Controllers;

use App\Models\VeterinarioModel;
use App\Types\Veterinario;
use InvalidArgumentException;

class VeterinarioController extends BaseController
{
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
}
