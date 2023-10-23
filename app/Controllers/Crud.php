<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LoginModelo;
use App\Models\CrudModelo;

class Crud extends Controller{
    public function Ingreso(){
       
        $user = session('user');

        if (!$user || $user->id < 1) {
            return redirect()->to('login');
        } else {
        return view('crud' , $data);
    }

    
    }
}