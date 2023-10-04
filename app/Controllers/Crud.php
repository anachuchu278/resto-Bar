<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LoginModelo;

class Crud extends Controller{
    public function crud(){
        echo view('comunes/header');
        return view('crud');
    }

    

}