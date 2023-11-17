<?php

namespace App\Controllers;

use App\Models\TipoBebidaModelo;
use App\Models\BarModelo;
use App\Models\BebidaModelo;
use App\Models\CarritoModelo;
use CodeIgniter\Controller;

class BarControlador extends Controller {

    private $barModelo;
    private $CarritoModelo;

    public function __construct()
    {
        $this->barModelo = new BebidaModelo();
        $this->CarritoModelo = new CarritoModelo();
        if (!session()->has('carrito')) {
            session()->set('carrito', []);
        }
    }

    public function index()
    {
        $bebidaModelo = new BebidaModelo();
        $data['bebidas'] = $bebidaModelo->findAll();

        // Obtener los tipos de bebida disponibles
        $tipoBebidaModelo = new TipoBebidaModelo();
        $data['tiposBebida'] = $tipoBebidaModelo->findAll();
        $user = session('user'); 

        echo view('comunes/header');
        echo view('barVista', $data);
        echo view('comunes/footer');
    }

    public function verDetalleOrden($tipo_id)
    {
        // Lógica para ver detalles de una bebida específica
        $bebidaModelo = new BarModelo();  // Cambiado a BarModelo
        $data['bebidaEncontrada'] = $bebidaModelo->where('tipo_id', $tipo_id)->findAll();

        echo view('barVista', $data);
    }

    public function buscarBebida()
    {
        $busqueda = $this->request->getPost('busqueda');

        if ($busqueda !== "") {
            $data['bebidaEncontrada'] = $this->barModelo->buscarBebidaPorNombre($busqueda);
        } else {
            $data['bebidaEncontrada'] = null;
        }

        // Obtener todas las bebidas (puedes ajustar esto según tus necesidades)
        $bebidaModelo = new BebidaModelo();
        $data['bebidas'] = $bebidaModelo->findAll();

        echo view('barVista', $data);
    }

    // ... Otros métodos ...

    public function Ingresar()
    {
        return view('crud');
    }

    // ... Otros métodos ...





    private function guardarEnCarrito($id_bebida, $cantidad)
{
    $carrito = session()->get('carrito') ?? [];

    // Si el producto ya está en el carrito, actualiza la cantidad
    if (array_key_exists($id_bebida, $carrito)) {
        $carrito[$id_bebida]['cantidad'] += $cantidad;
    } else {
        // Si no, agrega un nuevo elemento al carrito
        $carrito[$id_bebida] = [
            'id_bebida' => $id_bebida,
            'cantidad' => $cantidad,
        ];
    }

    // Guarda el carrito en la sesión
    session()->set('carrito', $carrito);
}
public function comprar()

{
    $carrito = session()->get('carrito') ?? [];
    $CarritoModelo = new CarritoModelo();

    $bebidaModelo = new BebidaModelo();
    $productos = [];
    $total = 0;

    foreach ($carrito as $id_bebida => $cantidad) {
        $producto = $bebidaModelo->find($id_bebida);

        if ($producto) {
            $productos[$id_bebida] = [
                'id_bebida' => $id_bebida,
                'nombre' => $producto['nombre'],
                'tipo_id' => $producto['tipo_id'],
                'precio' => $producto['precio'],
                'descripcion' => $producto['descripcion'],
                'imagen_ruta' => $producto['imagen_ruta'],
                'cantidad' => $cantidad,
            ];

            $total += $producto['precio'] * $cantidad;
        }
    }

    session()->set('productos_carrito', $productos);
    session()->set('total_carrito', $total);

    $data = [
        'productos' => $productos,
        'total' => $total,
        // Otros datos que necesitas pasar a la vista
    ];

    return view('ComprarVista', $data);
}
public function procesarCompra()
{
    // Obtener el carrito de la sesión
    $carrito = session()->get('carrito') ?? [];

    // Verificar si el carrito está vacío
    if (empty($carrito)) {
        // Puedes redirigir o mostrar un mensaje de error
        return redirect()->to(base_url(''));
    }

    // Obtener detalles de productos desde la base de datos
    $bebidaModelo = new BebidaModelo();
    $CarritoModelo = new CarritoModelo();

    // Limpiar carrito después de procesar la compra
    session()->remove('carrito');

    $total = 0;

    foreach ($carrito as $id_bebida => $cantidad) {
        $producto = $bebidaModelo->find($id_bebida);

        if ($producto) {
            // Calcular el total
            $total += $producto['precio'] * $cantidad;

            // Insertar en la tabla carrito_compras
            $CarritoModelo->insert([
                'id_bebida' => $id_bebida,
                'cantidad' => $cantidad,
            ]);
        }
    }

    // Datos para pasar a la vista
    $data = [
        'total' => $total,
        // Otros datos que puedas necesitar
    ];

    // Cargar la vista de procesar compra
    return view('procesarCompra', $data);
}

}