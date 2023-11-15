<?php

namespace App\Controllers;

use App\Models\BebidaModelo;
use CodeIgniter\Controller;

class BarController extends Controller
{
    public function index()
    {
        $bebidaModelo = new BebidaModelo();
        $data['bebidas'] = $bebidaModelo->findAll();

        echo view('barVista', $data);
    }

    public function verDetalleOrden($id_bebida)
    {
        $bebidaModelo = new BebidaModelo();
        $data['bebida'] = $bebidaModelo->find($id_bebida);

        echo view('detalleBebida', $data);
    }
}