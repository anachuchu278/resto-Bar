<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CarritoModelo;
use App\Models\MetodoPagoModelo;

class MetodoPagoControlador extends Controller {
    public function registrarPago($nombre)
{
    $data = [
        'nombre' => $nombre,
    ];

    $this->db->insert('metodo_de_pago', $data);
}
private function obtenerContenidoCarrito()
{

    return session('carrito') ?? [];
}
private function calcularTotalCompra($carrito)
{
    // Verificar si $carrito es un array
    if (!is_array($carrito)) {
        return 0; // O manejar el caso de error según tus necesidades
    }

    // Lógica para calcular el total basándose en el contenido del carrito
    $total = 0;

    foreach ($carrito as $producto) {
        // Verificar si $producto es un array antes de acceder a sus elementos
        if (is_array($producto) && isset($producto['precio'], $producto['cantidad'])) {
            $total += $producto['precio'] * $producto['cantidad'];
        } else {
            // Manejar el caso de error según tus necesidades
            // Puedes ignorar el producto, mostrar un mensaje de error, etc.
        }
    }

    return $total;
}
public function procesarCompra()
{
    // Verificar si el usuario está autenticado
    $user = session('user');
    if (!$user) {
        // Redirigir a la página de inicio de sesión si el usuario no está autenticado
        return redirect()->to('login');
    }

    // Lógica para obtener el contenido del carrito (puedes ajustar esto según tu implementación)
    $carrito = $this->obtenerContenidoCarrito(); // Esta función debe recuperar el contenido del carrito

    // Calcular el total de la compra
    $total = $this->calcularTotalCompra($carrito); // Esta función debe calcular el total basándose en el contenido del carrito

    // Lógica para registrar el método de pago en la base de datos
    $metodoPagoModelo = new MetodoPagoModelo();
    $metodoPagoModelo->registrarPago([
        'nombre' => 'PayPal',
        // Agrega otros campos necesarios en tu tabla
    ]);

    
   
    foreach ($carrito as $producto) {
        $carritoModelo = new CarritoModelo();
        $carritoModelo->insert([
            'id_bebida' => $producto['id_bebida'],
            'cantidad' => $producto['cantidad'],
            'id_usuario' => $user['id_usuario'],
           
        ]);
    }
    // Cargar la vista de confirmación o la que corresponda
    return view('procesarCompra', [
        'nombre' => 'PayPal',
    ]);
}
}