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

  
    $productos = $session->get('carrito') ?? [];

  
    $totalCarrito = array_sum(array_column($productos, 'total'));

   
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
    
    $productos = session()->get('carrito') ?? [];

   
    if (isset($productos[$indice])) {
       
        unset($productos[$indice]);

        
        session()->set('carrito', $productos);
    }

   
    return redirect()->to('ver-carrito');
}
}
