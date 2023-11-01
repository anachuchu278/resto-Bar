<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LoginModelo;
use App\Models\CrudModelo;

class Crud extends Controller{
    public function Ingreso(){
       
        $user = session('user');

        if (!$user || $user ['id'] < 1) {
            return redirect()->to('loginVista');
        } else {
            return view('comunes/header');
            echo view('crud');
            
        }
    }
    public function logout(){
        session_destroy(); 

    } 
    // public function Index(){
    //     echo view("comunes/header");
    // }
    
    
    }
