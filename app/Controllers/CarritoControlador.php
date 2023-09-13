<?php

namespace App\Controllers;

use App\Models\CarritoModelo;
use CodeIgniter\Controller;

class CarritoControlador extends Controller
{
    public function agregarProducto($productoId, $cantidad = 1)
    {
        // Verificar si el usuario está autenticado
        if (!$this->isLoggedIn()) {
            return redirect()->to(base_url('login'))->with('error', 'Debes iniciar sesión para agregar productos al carrito');
        }

        $carritoModelo = new CarritoModelo();
        $usuarioId = $this->session->get('user')['id'];

        if ($carritoModelo->agregarProductoAlCarrito($usuarioId, $productoId, $cantidad)) {
            return redirect()->to(base_url('carrito'))->with('success', 'Producto agregado al carrito exitosamente');
        } else {
            return redirect()->to(base_url('carrito'))->with('error', 'Ocurrió un error al agregar el producto al carrito');
        }
    }

    public function eliminarProducto($productoId)
    {
        // Verificar si el usuario está autenticado
        if (!$this->isLoggedIn()) {
            return redirect()->to(base_url('login'))->with('error', 'Debes iniciar sesión para eliminar productos del carrito');
        }

        $carritoModelo = new CarritoModelo();
        $usuarioId = $this->session->get('user')['id'];
        $carrito = $carritoModelo->obtenerCarritoPorUsuario($usuarioId);

        if (!$carrito) {
            return redirect()->to(base_url('carrito'))->with('error', 'El carrito está vacío');
        }

        if ($carritoModelo->eliminarProductoDelCarrito($carrito['id'], $productoId)) {
            return redirect()->to(base_url('carrito'))->with('success', 'Producto eliminado del carrito exitosamente');
        } else {
            return redirect()->to(base_url('carrito'))->with('error', 'Ocurrió un error al eliminar el producto del carrito');
        }
    }

    public function verCarrito()
    {
        // Verificar si el usuario está autenticado
        if (!$this->isLoggedIn()) {
            return redirect()->to(base_url('login'))->with('error', 'Debes iniciar sesión para ver el carrito');
        }

        $carritoModelo = new CarritoModelo();
        $usuarioId = $this->session->get('user')['id'];
        $carrito = $carritoModelo->obtenerCarritoPorUsuario($usuarioId);

        if (!$carrito) {
            return redirect()->to(base_url('carrito'))->with('info', 'El carrito está vacío');
        }

        $productosEnCarrito = $carritoModelo->obtenerProductosEnCarrito($carrito['id']);

        $total = $carritoModelo->calcularTotalCarrito($carrito['id']);

        $data = [
            'productosEnCarrito' => $productosEnCarrito,
            'total' => $total,
        ];

        return view('carritoVista', $data);
    }

    private function isLoggedIn()
    {
        return $this->session->has('user');
    }
}