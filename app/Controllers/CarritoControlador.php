<?php

namespace App\Controllers;

use App\Models\CarritoModelo;
use App\Models\BebidaModelo;
class CarritoControlador extends BaseController
{
   public function verCarrito()
   {
      $bebidaModelo = new BebidaModelo();
       $user = session('user');
       if (!$user || $user['id_usuario'] < 1) {
           return redirect()->to('/login');
       } else {
           $session = session();
   
           $user = $session->get('user');
           
           $id_bebida = $this->request->getPost('id_bebida');
           $productos = $bebidaModelo->obtenerPrecioUnitario($id_bebida);
   
           // Pasar los datos a la vista
           $data['user'] = $user;
           $data['productos'] = $productos;
   
           echo view('comunes/header');
           return view('comprarVista', $data);
       }
   }
}
