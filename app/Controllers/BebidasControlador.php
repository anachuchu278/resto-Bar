<?php

namespace App\Controllers;

use App\Models\BebidaModelo;
use CodeIgniter\Controller;

class BebidasControlador extends Controller
{
    public function mostrarBebida()
    {

        return view('bebidasVista');
    }
}
