<?php

namespace App\Controllers;

use App\Models\TipoBebidaModelo;
use App\Models\BarModelo;
use App\Models\BebidaModelo;
use CodeIgniter\Controller;

class BarControlador extends Controller
{
    private $barModelo;

    public function __construct()
    {
        $this->barModelo = new BebidaModelo();
    }
    public function index()
    {
        $user = session('user'); 
        if (!$user || $user ['id'] < 1) {
            return redirect()->to('login');
        }
        else {
            
        }

        $bebidaModelo = new BebidaModelo();
        $data['bebidas'] = $bebidaModelo->findAll();

        // Obtener los tipos de bebida disponibles

        //$tiposBebida = $bebidaModelo->distinct('tipo_id')->findColumn('tipo_id');
        $tipoBebidaModelo = new TipoBebidaModelo();
        $data['tiposBebida'] = $tipoBebidaModelo->findAll();
        echo view('comunes/header');
        return view('barVista', $data);
        echo view('comunes/footer');
    }
    //public function isAdmin() {
    // $user = session('usuario');
    // if (!$user || $user['rol'] != 1) {
    //     return redirect()->to('login'); // Redirige al inicio de sesión si no es un administrador
    // }


    public function bebidasPorTipo($tipoId)
    {
        $tipoBebidaModelo = new TipoBebidaModelo();
        $bebidasPorTipo = $tipoBebidaModelo->getBebidasPorTipo($tipoId);
    }

    public function buscarBebida()
    {
        $busqueda = $this->request->getPost('busqueda');

        if ($busqueda !== null) {
            $data['bebidaEncontrada'] = $this->barModelo->buscarBebidaPorNombre($busqueda);
        } else {
            $data['bebidaEncontrada'] = null;
        }

        return view('barVista', $data);
    }
    public function verDetalleOrden($tipo_id)
    {
        // Lógica para ver detalles de una bebida específica
        $bebidaModelo = new barModelo();  // Cambiado a BarModelo
        $data['bebidaEncontrada'] = $bebidaModelo->where('tipo_id', $tipo_id)->findAll();

        return view('barVista', $data);
    }
    public function filtrarPorTipo($tipo)
    {
        // Obtener las bebidas filtradas por tipo
        $bebidaModelo = new BebidaModelo();
        $data['bebidas'] = $bebidaModelo->where('tipo_id', $tipo)->findAll();

        // Obtener los tipos de bebida disponibles
        $tipoBebidaModelo = new TipoBebidaModelo();
        $data['tiposBebida'] = $tipoBebidaModelo->findAll();

        return view('barVista', $data);
    }
    public function login()
    {
        return view('loginVista');
    }
    public function informacion()
    {
        $info = $this->request->getPost('bebidas');

        if (!empty($info)) {
            // Lógica para buscar bebida por nombre
            $bebidaModelo = new BebidaModelo();
            $bebidaEncontrada = $bebidaModelo->find('id_bebida', $info);

            $data['informacionBebida'] = $bebidaEncontrada;
        } else {
            // Si no se ingresa una búsqueda, redirigir a la página principal
            return redirect()->to(base_url('barControlador'));
        }

        return view('barVista', $data);
    }
    public function Ingresar()
    {
        return view('crud');
    }
}
