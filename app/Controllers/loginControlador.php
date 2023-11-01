<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LoginModelo;

class loginControlador extends BaseController
{
    public function Index()
    {
        

        echo view('comunes/header');
        return view('loginVista');
    }
    public function loguearse()
{
    $LoginModelo = new LoginModelo();

    $email = $this->request->getPost('email');
    $password = $this->request->getPost('contrasena');
    
    $result = $LoginModelo->where('email', $email)->first();

    
        if ($result  ['id'] > 0 && password_verify($password, $result ['contrasena'])) {
            $data = [
                "id" => $result['id'],
                "nombre" => $result['nombre'],
                "rol" => $result ['rol'],
            ];
            $session = session();
            $session->set($data );
            

            return redirect()->to("/crud");
        } else {
            echo 'La contraseña no es correcta';
        }
     
   
    
    
    
    
    
    
}
    public function salir(){
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/'));
    }
}
