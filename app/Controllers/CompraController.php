<?php

namespace App\Controllers;

use App\Models\CompraModelo;
use App\Models\CalleModelo;
use App\Models\MetodoPagoModelo;
use App\Models\CiudadModelo;

class CompraController extends BaseController
{
    public function __construct()
    {
        // Cargar la librería de formularios
        helper('form');
    }
    public function mostrarFormulario()
    {
        $calleModelo = new CalleModelo();
        $metodoPagoModelo = new MetodoPagoModelo();
        $ciudadModelo = new CiudadModelo();

        $data = [
            'calles' => $calleModelo->findAll(),
            'metodosPago' => $metodoPagoModelo->findAll(),
            'ciudades' => $ciudadModelo->findAll(),
        ];

        return view('formularioCompra', $data);
    }

    public function procesarFormulario()
    {
        $compraModelo = new CompraModelo();

        $data = [
            'ciudad_id' => $this->request->getPost('ciudad'),
            'calle_id' => $this->request->getPost('calle'),
            'metodo_pago_id' => $this->request->getPost('metodo_pago'),
            'provincia' => $this->request->getPost('provincia'),
        ];

        $compraModelo->insert($data);

        // Puedes redirigir a la página de comprar después de procesar el formulario
        return redirect()->to(base_url('barControlador/comprarVista'));
    }
}