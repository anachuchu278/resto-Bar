<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LoginModelo;

class loginControlador extends BaseController
{
    public function Index()
    {
        $user = session('user'); 
       

        echo view('comunes/header');
        echo view('loginVista');
        return view('comunes/footer');
    }
    public function loguearse()
    {
        $LoginModelo = new LoginModelo();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $rol = $this->request->getPost('rol');

        $result = $LoginModelo->where('email', $email)->first();
        
<<<<<<< HEAD
        if ($result !== null && $result['id'] > 0) {
            if (password_verify($password, $result['contrasena'])) {
=======
        //echo password_hash($password, PASSWORD_BCRYPT);
        if ($result !== null && $result['id_usuario'] > 0) {
            if (password_verify($password, $result['password'])) {
>>>>>>> d58325b099157435f23b987f04553c27e5c952c6
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






}
