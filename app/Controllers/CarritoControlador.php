<?php

namespace App\Controllers;
use App\Models\CarritoModelo;
use App\Models\BebidaModelo;



class CarritoControlador extends BaseController
{
    public function verCarrito()
{
    $CarritoModelo = new CarritoModelo;
    $session = session();
    $user = $session->get('user');

    if (!$user || $user['id_usuario'] < 1) {
        return redirect()->to('/login');
    }

    // Obtener productos del carrito
    $productos = $session->get('carrito') ?? [];

    // Calcular el total del carrito
    $totalCarrito = array_sum(array_column($productos, 'total'));

    // Pasar los datos a la vista
    $data = [
        'user' => $user,
        'productos' => $productos,
        'total' => $totalCarrito,
    ];

    echo view('comunes/header');
    return view('CarritoVista', $data);
}

public function eliminarDelCarrito($indice)
{
    // Obtener productos del carrito actual
    $productos = session()->get('carrito') ?? [];

    // Verificar si el índice existe en el carrito
    if (isset($productos[$indice])) {
        // Eliminar el producto del carrito
        unset($productos[$indice]);

        // Guardar los productos actualizados en la sesión
        session()->set('carrito', $productos);
    }

    // Redirigir de nuevo a la vista del carrito
    return redirect()->to('ver-carrito');
}
}
