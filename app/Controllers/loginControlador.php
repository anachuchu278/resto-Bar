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
        $password = $this->request->getPost('password');

        $result = $LoginModelo->where('email', $email)->first(); 
        if ($result != null && $result['id'] > 0) {
            if (password_verify($password, $result['password'])) {
                $this->session->set("user", $result); 

                return view('barVista');
            } else {
                // Si la contraseña no es válida, muestra un mensaje de error en la vista
                $data['error'] = 'Contraseña no válida.';
                return view('loginVista', $data);
            }
        } else {
            // Si el usuario no se encuentra en la base de datos, muestra un mensaje de error en la vista
            $data['error'] = 'Usuario no encontrado.';
            return view('loginVista', $data);
        }
    }   
}