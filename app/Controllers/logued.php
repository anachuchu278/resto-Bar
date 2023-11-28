<?php

namespace App\Controllers;

class Loguearse extends BaseController
{
    public function crud() {

    
    $user = session('user'); 
    if (!$user) {
        return redirect()->to('login');
    }
    else {
        return redirect()->to('crud');
    }
} 
}