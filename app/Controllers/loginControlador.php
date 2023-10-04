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

    if ($result) {
        // Verificar si $result no es vacío antes de acceder a sus propiedades
        if ($result['id'] > 0 && password_verify($password, $result['contrasena'])) {
            $this->session->set("usuario", $result);

            return redirect()->to("/crud");
        } else {
            echo 'La contraseña no es correcta';
        }
    } else {
        echo 'El email no se encuentra registrado';
    }
    }
    public function crud(){
        return view('crud');
    }

}
