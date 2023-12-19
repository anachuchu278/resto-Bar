<?php

namespace App\Controllers;
use App\Models\CarritoModelo;



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
        $total = $CarritoModelo->calcularTotalCarrito($productos);
    
        echo view('comunes/header');
        return view('comprarVista', [
           'productos' => $productos,
           'total' => $total,
        ]);
     }
}
