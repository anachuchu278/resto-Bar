<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LoginModelo;

class AddControlador extends Controller{
    public function index(){
        echo view('comunes/header');
        return view('nuevoAdmin');
    }
    public function NuevoAdmin(){
            $LoginModelo = new LoginModelo();
            $name = $this->request->getPost('nombre_usuario');
            $email = $this->request->getPost('email');
            
            $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
            $rol = 1;
            
            $userData = [
                'nombre_usuario' => $name,
                'email' => $email, 
                'password' => $password,
                'rol' => $rol
            ];
       
            $LoginModelo->insert($userData);
       
            
            return redirect()->to("crud");
         
    }
}