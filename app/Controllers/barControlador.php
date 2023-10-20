<?php

namespace App\Controllers;
use App\Models\TipoBebidaModelo;
use App\Models\BebidaModelo;
use App\Models\CarritoModelo;
use CodeIgniter\Controller;


class barControlador extends Controller
{
    public function __construct()
{
    $this->session = \Config\Services::session();
}

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
    public function agregarAlCarrito()
{
    // Cargar el modelo CarritoModelo directamente
    $carritoModelo = new CarritoModelo();

    $bebida_id = $this->request->getPost('bebida_id');
    $cantidad = $this->request->getPost('cantidad');

    // Reemplaza esta línea con tu lógica para obtener el ID del comprador
    $comprador_id = 1; // Por ejemplo, si es un ID fijo

    $carrito_id = $this->obtenerCarritoId();

    $carritoModelo->agregarAlCarrito($carrito_id, $bebida_id, $cantidad, $comprador_id);

    return redirect()->to(base_url('carritos'));
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
private function obtenerCarritoId()
{
    // Por ejemplo, puedes usar el ID del usuario como ID del carrito
    if ($this->isLoggedIn()) {
        return $this->session->get('user')['id'];
    } else {
        // Si el usuario no está autenticado, puedes generar un ID único
        return uniqid('carrito_');
    }
}
private function isLoggedIn()
{
    return $this->session->has('user');
}
}