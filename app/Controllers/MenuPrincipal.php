<?php

namespace App\Controllers;

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

    public function getBaja()
    {
        return view('/baja');
    }

    public function getModificacion()
    {
        return view('/modificacion');
    }
}
