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


        if ($result !== null && $result ['id'] > 0) {
            if (password_verify($password, $result ['contrasena'])) {
                // Contraseña correcta, establece la sesión del usuario y redirige a la vista de dashboard
                $this->session->set("user", $result);
                return redirect()->to('crud');
            } else {
                // Contraseña incorrecta
                echo 'Contraseña incorrecta';
            }
        } 
    }
    public function salir()
    {
        session_destroy();
        echo view('comunes/header');
        return view('loginVista');
    }
}
