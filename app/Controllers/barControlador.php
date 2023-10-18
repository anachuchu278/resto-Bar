<?php

namespace App\Controllers;

use App\Models\TipoBebidaModelo;
use App\Models\BebidaModelo;
use CodeIgniter\Controller;

class BarControlador extends Controller
{
    public function index()
    {


        $bebidaModelo = new BebidaModelo();
        $data['bebidas'] = $bebidaModelo->findAll();

        // Obtener los tipos de bebida disponibles

        //$tiposBebida = $bebidaModelo->distinct('tipo_id')->findColumn('tipo_id');
        $tipoBebidaModelo = new TipoBebidaModelo();
        $data['tiposBebida'] = $tipoBebidaModelo->findAll();
        echo view('comunes/header');
        echo view('barVista', $data);
        echo view('comunes/footer');
    }

    public function bebidasPorTipo($tipoId)
    {
        $tipoBebidaModelo = new TipoBebidaModelo();
        $bebidasPorTipo = $tipoBebidaModelo->getBebidasPorTipo($tipoId);
    }

    public function buscarBebida()
    {
        $busqueda = $this->request->getPost('busqueda'); // Obtener el valor del campo de búsqueda del formulario

        if (!empty($busqueda)) {
            // Lógica para buscar bebida por nombre
            $bebidaModelo = new BebidaModelo();
            $bebidaEncontrada = $bebidaModelo->like('nombre', $busqueda)->findAll();

            $data['bebidaEncontrada'] = $bebidaEncontrada;
        } else {
            // Si no se ingresa una búsqueda, redirigir a la página principal
            return redirect()->to(base_url('barControlador'));
        }

        return view('barVista', $data);
    }

    public function verDetalleOrden($id)
    {
        // Lógica para ver detalles de una bebida específica
        $bebidaModelo = new BebidaModelo();
        $data['bebidaEncontrada'] = $bebidaModelo->find($id);

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
    public function Ingresar(){
        return view('crud');
    }
}
