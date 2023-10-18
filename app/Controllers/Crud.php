<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LoginModelo;
use App\Models\BebidaModelo;

class Crud extends Controller{
    public function Ingreso(){
        return view('/comunes/header');
        return view('crud');
    }

    

}