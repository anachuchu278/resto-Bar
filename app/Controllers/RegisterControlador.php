<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\RegisterModelo;

class registerControlador extends Controller

{
    public function Index()
    {
        
        echo view('comunes/header');
        return  view('registerVista');
    }
    public function registrarse()
    {
        $RegisterModelo = new RegisterModelo();
        

        $name = $this->request->getPost('nombre');
        $email = $this->request->getPost('email');
        
        $password = password_hash($this->request->getPost('contrasena'), PASSWORD_DEFAULT);

        $data = ['nombre' => $name, 'email' => $email, 'contrasena' => $password];
        
       
        $r = $RegisterModelo->insert($data);
        
        if(!$r==0) {
            return redirect()->to("login");
        } 
    }
}
