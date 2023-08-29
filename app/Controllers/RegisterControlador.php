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

        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

        $data = ['name' => $name, 'email' => $email, 'password' => $password];


        $r = $RegisterModelo->insert($data);

        if ($r) {
            echo "usuario registrado correctamente";
        } else {
            echo "error";
        }
    }
}
