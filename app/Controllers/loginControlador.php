<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LoginModelo;

class loginControlador extends BaseController
{
    public function Index()
    {
        $user = session('user'); 
        // if (!$user || $user ['id'] < 1) {
        //     return redirect()->to('');
        // }
        // else {
           
        // }

        echo view('comunes/header');
        return view('loginVista');
    }
    public function loguearse()
    {
        $LoginModelo = new LoginModelo();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('contrasena');
        $rol = $this->request->getPost('rol');

        $result = $LoginModelo->where('email', $email)->first();
        

        if ($result !== null && $result['id'] > 0) {
            if (password_verify($password, $result['contrasena'])) {
                // Contraseña correcta, establece la sesión del usuario
                $this->session->set("user", $result);
                $user = session();
                $rol = $result['rol'];
        
                if ($rol == 1) {
                    return redirect()->to('crud');
                } else {
                    return redirect()->to('/');
                }
            } else {
           
                return redirect()->to('login')->with('error', 'Contraseña incorrecta');
            }
        } else {
          
            return redirect()->to('login')->with('error', 'Usuario no encontrado');
        }
        
                
          
    }
    public function salir()
    {
        session_destroy();
        return redirect()->to('login');
    }
<<<<<<< HEAD


=======
>>>>>>> f1e1a3875fa6066fda8fc604e184ebe522bc3719
}
