<?php

namespace App\Controllers;

use App\Models\BebidaModelo;
use CodeIgniter\Controller;

class AdminBebidasControlador extends Controller
{
    public function index()
    {   
        $user = session('user'); 
        if (!$user || $user ['rol'] < 1) {
            return redirect()->to('/login');
        }
        else {
            $bebidaModelo = new BebidaModelo();
            $data['bebidas'] = $bebidaModelo->findAll(); 
            
            echo view('comunes/header');
            return view('admin_bebidas/index', $data);
           
        }

      


      
        
    }

    public function agregar()
    {   
        $user = session('user'); 
        if (!$user || $user ['rol'] < 1) {
            return redirect()->to('/login');
        }
        else {
            echo view('comunes/header');
            return view('admin_bebidas/agregar');
           
        }
        // Aquí se procesa el formulario de agregar una nueva bebida
        if ($this->request->getMethod() === 'post') {
            $bebidaModelo = new BebidaModelo();
            $bebidaModelo->insert($_POST); // Asumiendo que los datos del formulario se envían por POST
            return redirect()->to(base_url('admin_bebidas'));
        }
        // echo view('comunes/header');
        // return view('admin_bebidas/agregar');
       
    }

    public function editar()
    {
        
       
        $bebidaModelo = new BebidaModelo();
        
    

        $data = [
            'id_bebida' => $this->request->getVar('id_bebida'),
            'nombre' => $this->request->getVar('nombre'),
            'id_tipo' => $this->request->getVar('id_tipo'),
            'precio' => $this->request->getVar('precio'),
            'descripcion' => $this->request->getVar('descripcion'),
            'imagen_ruta' => $this->request->getVar('imagen_ruta'),
        ];
        
        $id=$this->request->getVar('id_bebida');
        $bebidaModelo->Actualizar($data,$id); 
        return view('admin_bebidas/editar',$data);
    }

    public function eliminar($id_bebida)
    {
        // Aquí se procesa la eliminación de la bebida con el ID $id
        
        $bebidaModelo = new BebidaModelo();
        $bebidaModelo->delete($id_bebida);
        return redirect()->to(base_url('adminBebidas'));
    }
    public function guardar()
    {
        // Aquí se procesa el formulario de agregar una nueva bebida
    if ($this->request->getMethod() === 'post') {
            $bebidaModelo = new BebidaModelo();
            $bebidaModelo->insert($_POST); // Asumiendo que los datos del formulario se envían por POST
            return redirect()->to(base_url('adminBebidas'));
            }
    }
    public function actualizar($id)
    {
        // Aquí se procesa la actualización de la bebida con el ID $id
        $bebidaModelo = new BebidaModelo();

        if ($this->request->getMethod() === 'post') {
          $bebidaModelo->update($id, $_POST); // Asumiendo que los datos del formulario se envían por POST
         return redirect()->to(base_url('adminBebidas'));
        }

        $data['bebida'] = $bebidaModelo->find($id);
        return view('admin_bebidas/editar', $data);
    }
}
