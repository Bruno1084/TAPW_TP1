<?php

namespace App\Controllers;

class MenuPrincipal extends BaseController
{
    // Funciones Get View
    public function index(): string
    {
        return view('/MenuPrincipal');
    }
}
