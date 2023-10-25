<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LoginModelo;
use App\Models\CrudModelo;

class Crud extends Controller{
    public function Ingreso(){
       
        $user = session('usuario');

        if (!$user || $user ['rol'] == 1) {
            return redirect()->to('crud');
        } else {
        return view('barVista');
    }

    
    }
}