<?php
namespace App\Controllers;

use App\Models\BarModelo;
use CodeIgniter\Controller;

class BebidasControlador extends Controller
{
    public function index()
    {
        $barModelo = new BarModelo();
        $bebidas = $barModelo->obtenerTodasLasBebidas();

        $data['bebidas'] = $bebidas;

        return view('bebidasVista', $data);
    }
}