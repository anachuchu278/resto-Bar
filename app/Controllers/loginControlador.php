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
    public function loguearse(){
        $LoginModelo = new LoginModelo(); 
        
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $result = $LoginModelo->where('email',$email)->first(); 
        if ($result['id']> 0){
            if (password_verify($password, $result['password'])) {
                //$this->session->set("user",$result); 

                return view('crud');
            } else {
                echo 'Invalid password.';
            }
        }

    }


}
