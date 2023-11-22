<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LoginModelo;
use App\Models\CrudModelo;
use App\Controllers\loginControlador;


class Crud extends Controller{
    public function Ingreso(){
       
      $user = session('user'); 
        if (!$user || $user ['rol'] < 1) {
            return redirect()->to('/login');
        }
        else {
            echo view('comunes/header');
            echo view('crud');
           
        }

    
  

    } 
}
    
