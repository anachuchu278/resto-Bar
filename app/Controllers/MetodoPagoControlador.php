<?php

namespace App\Controllers;

use CodeIgniter\Controller;


class MetodoPagoControlador extends Controller {
    public function registrarPago($nombre)
{
    $data = [
        'nombre' => $nombre,
    ];

    $this->db->insert('metodo_de_pago', $data);
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
    $carrito = obtenerContenidoCarrito(); // Esta función debe recuperar el contenido del carrito

    // Calcular el total de la compra
    $total = calcularTotalCompra($carrito); // Esta función debe calcular el total basándose en el contenido del carrito

    // Lógica para registrar el pago en la base de datos
    $metodoPagoModelo = new MetodoPagoModelo();
    $metodoPagoModelo->registrarPago([
        'nombre' => $nombre['nombre'],
  
        // Agrega otros campos necesarios en tu tabla
    ]);

    // Lógica para vaciar el carrito o marcar los productos como comprados
    vaciarCarrito(); // Esta función debe vaciar el carrito después de procesar la compra

    // Cargar la vista de confirmación o la que corresponda
    return view('procesarCompra', [
        'nombre' => $nombre,
        
    ]);
}
}