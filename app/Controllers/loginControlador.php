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

        $result = $LoginModelo->where('email', $email)->first();


        if ($result !== null && $result['id'] > 0) {
            if (password_verify($password, $result['contrasena'])) {
                // Contraseña correcta, establece la sesión del usuario
                $this->session->set("user", $result);
                $user = session();
        
                if ($user = ['rol'] == 1) { 
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
        echo view('comunes/header');
        return view('loginVista');
    }
}
