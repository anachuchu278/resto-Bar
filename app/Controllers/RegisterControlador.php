<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\RegisterModelo;

class registerControlador extends Controller

{
    public function Index()
    {
        
        echo view('comunes/header');
        echo  view('registerVista');
        return view('comunes/footer');
    }
    public function registrarse()
    {
        $RegisterModelo = new RegisterModelo();
        

        $name = $this->request->getPost('nombre_usuario');
        $email = $this->request->getPost('email');
        
        $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

        $data = ['nombre_usuario' => $name, 'email' => $email, 'password' => $password];
        
       
        $r = $RegisterModelo->insert($data);
        
        if(!$r==0) {
            return redirect()->to("login");
        } 
    }
}
