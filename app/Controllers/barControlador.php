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

        return view('barVista', $data);
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
    public function login(){
        return view('loginVista');
    }
    public function paginaRegistroExitoso()
{
    return view('registro_exitoso');
}

public function agregarAlCarrito()
{
    // Obtener el ID de la bebida y la cantidad desde el formulario
    $bebida_id = $this->request->getPost('bebida_id');
    $cantidad = $this->request->getPost('cantidad'); // Asegúrate de tener un campo 'cantidad' en tu formulario

    // Obtener el carrito actual del usuario (esto puede variar dependiendo de cómo manejes los carritos por usuario)
    $carrito_id = $this->obtenerCarritoId(); // Debes tener una función para obtener el ID del carrito del usuario actual

    // Llamar a la función del modelo para agregar la bebida al carrito
    $this->carrito_model->agregarAlCarrito($carrito_id, $bebida_id, $cantidad);

    // Redirigir a la página del carrito o a donde sea apropiado
    return redirect()->to(base_url('carrito'));
}
}