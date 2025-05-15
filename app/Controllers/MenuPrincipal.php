<?php

namespace App\Controllers;

use App\Models\Amo_MascotaModel;
use App\Models\AmoModel;
use App\Models\MascotaModel;
use App\Models\VeterinarioModel;
use App\Types\Amo;
use App\Types\Mascota;
use App\Types\Veterinario;

class MenuPrincipal extends BaseController
{
    // Funciones Get View
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
        return view('/alta/index');
    }

    public function getBaja()
    {
        return view('/baja/index');
    }

    public function getModificacion()
    {
        return view('/modificacion');
    }


    // Funciones Get Alta
    public function getAmoAlta()
    {
        return view('/alta/amo');
    }

    public function getMascotaAlta()
    {
        return view('/alta/mascota');
    }

    public function getVeterinarioAlta()
    {
        return view('/alta/veterinario');
    }


    // Funciones Get Baja
    public function getAmoBaja()
    {
        return view('/baja/amo');
    }

    public function getMascotaBaja()
    {
        return view('/baja/mascota');
    }

    public function getVeterinarioBaja()
    {
        return view('/baja/veterinario');
    }



    // Funciones Post Alta
    public function postAmoMascotaAlta()
    {
        $amoModel = new AmoModel();
        $mascotaModel = new MascotaModel();
        $amo_mascotaModel = new Amo_MascotaModel();

        // Crear objetos
        $amo = new Amo(
            0,
            $this->request->getPost('nombreAmo'),
            $this->request->getPost('apellidoAmo'),
            $this->request->getPost('direccion'),
            $this->request->getPost('telefono'),
            $this->request->getPost('fechaAltaAmo')
        );

        $mascota = new Mascota(
            0,
            $this->request->getPost('nombreMascota'),
            $this->request->getPost('especie'),
            $this->request->getPost('raza'),
            (int)$this->request->getPost('edad'),
            $this->request->getPost('fechaAltaMascota'),
            null // Fecha de defunción opcional
        );

        // Buscar o insertar Amo
        $amoExistente = $amoModel->where([
            'nombre' => $amo->getNombre(),
            'apellido' => $amo->getApellido(),
            'telefono' => $amo->getTelefono()
        ])->first();

        $amoId = $amoExistente['id'] ?? $amoModel->insert([
            'nombre' => $amo->getNombre(),
            'apellido' => $amo->getApellido(),
            'direccion' => $amo->getDireccion(),
            'telefono' => $amo->getTelefono(),
            'fechaAlta' => $amo->getFechaAlta()
        ]);

        // Buscar o insertar Mascota
        $mascotaExistente = $mascotaModel->where([
            'nombre' => $mascota->getNombre(),
            'especie' => $mascota->getEspecie(),
            'raza' => $mascota->getRaza()
        ])->first();

        $mascotaId = $mascotaExistente['nroRegistro'] ?? $mascotaModel->insert([
            'nombre' => $mascota->getNombre(),
            'especie' => $mascota->getEspecie(),
            'raza' => $mascota->getRaza(),
            'edad' => $mascota->getEdad(),
            'fechaAlta' => $mascota->getFechaAlta(),
            'fechaDefuncion' => $mascota->getFechaDefuncion()
        ]);

        // Relacionar Amo y Mascota si no existe
        $relacionExistente = $amo_mascotaModel->where([
            'idAmo' => $amoId,
            'idMascota' => $mascotaId
        ])->first();

        if (!$relacionExistente) {
            $amo_mascotaModel->insert([
                'idAmo' => $amoId,
                'idMascota' => $mascotaId,
                'fechaInicio' => date('Y-m-d'),
            ]);
        }
        return view('/alta');
    }

    public function postAmo()
    {
        $amoModel = new AmoModel();
        $amo = new Amo(
            0,
            $this->request->getPost('nombre'),
            $this->request->getPost('apellido'),
            $this->request->getPost('direccion'),
            $this->request->getPost('telefono'),
            $this->request->getPost('fechaAlta')
        );

        $amoModel->insert([
            'nombre' => $amo->getNombre(),
            'apellido' => $amo->getApellido(),
            'direccion' => $amo->getDireccion(),
            'telefono' => $amo->getTelefono(),
            'fechaAlta' => $amo->getFechaAlta()
        ]);

        return view('/alta/amo');
    }

    public function postMascota()
    {
        $mascotaModel = new MascotaModel();
        $mascota = new Mascota(
            0,
            $this->request->getPost('nombre'),
            $this->request->getPost('especie'),
            $this->request->getPost('raza'),
            $this->request->getPost('edad'),
            $this->request->getPost('fechaAlta'),
            null
        );

        $mascotaModel->insert([
            'nombre' => $mascota->getNombre(),
            'especie' => $mascota->getEspecie(),
            'raza' => $mascota->getRaza(),
            'edad' => $mascota->getEdad(),
            'fechaAlta' => $mascota->getFechaAlta(),
            'fechaDefuncion' => $mascota->getFechaDefuncion()
        ]);

        return view('/alta/mascota');
    }

    public function postVeterinario()
    {
        $veterinarioModel = new VeterinarioModel();
        $veterinario = new Veterinario(
            0,
            $this->request->getPost('nombre'),
            $this->request->getPost('apellido'),
            $this->request->getPost('especialidad'),
            $this->request->getPost('telefono'),
            $this->request->getPost('fechaIngreso'),
            null
        );

        $veterinarioModel->insert([
            'nombre' => $veterinario->getNombre(),
            'apellido' => $veterinario->getApellido(),
            'especialidad' => $veterinario->getEspecialidad(),
            'telefono' => $veterinario->getTelefono(),
            'fechaIngreso' => $veterinario->getFechaIngreso(),
            'fechaEgreso' => $veterinario->getFechaEgreso()
        ]);

        return view('/alta/mascota');
    }


    // Funciones Post Baja
    public function postAmoBaja($idAmo)
    {

    }

    public function postMascotaBaja($idMascota)
    {

    }

    public function postVeterinarioBaja($idVeterinario)
    {

    }
}
