<?php
namespace App\Controllers;

use App\Models\BarModelo;
use CodeIgniter\Controller;

class BebidasControlador extends Controller
{
    public function mostrarBebida()
    {
        $bebidaId = $this->request->getPost('bebidaId'); 

        if (!empty($bebidaId)) {
            // Lógica para buscar bebida por nombre
            $bebidaModelo = new bebidaModelo();
            $bebidaEncontrada = $bebidaModelo->find($bebidaId); 

            $data['bebidaEncontrada'] = $bebidaEncontrada;

        return view('bebidasVista', $data);

    }
}
}