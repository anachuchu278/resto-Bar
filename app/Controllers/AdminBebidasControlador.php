<?php

namespace App\Controllers;

use App\Models\BebidaModelo;


use CodeIgniter\Controller;

class AdminBebidasControlador extends Controller {
    public function index() {
        $user = session('user');
        if(!$user || $user['rol'] < 1) {
            return redirect()->to('/login');
        } else {
            $bebidaModelo = new BebidaModelo();
            $data['bebidas'] = $bebidaModelo->findAll();

            echo view('comunes/header');
            return view('admin_bebidas/index', $data);
        }
    }

    public function agregarVista(){
        echo view('comunes/header');
        return view('admin_bebidas/agregar');
    }


    public function agregarA() {
        $bebidaModelo = new BebidaModelo();

 

        if($imagen = $this->request->getFile('id_imagen')) {
            $nuevoNombre = $imagen->getRandomName();
            $imagen->move('../assets/images/', $nuevoNombre);
            $datos = [
                'nombre_bebida' => $this->request->getVar('nombre_bebida'),
                'id_tipo' => $this->request->getVar('id_tipo'),
                'precio' => $this->request->getVar('precio'),
                'descripcion' => $this->request->getVar('descripcion'),
                'id_imagen' => $nuevoNombre,

            ];
           
            $bebidaModelo->insert($datos);

        }
        return redirect()->to('/');
    }

 




    public function editar($id) {
        $bebidaModelo = new BebidaModelo();
        $datos['bebida']=$bebidaModelo->where('id_bebida',$id)->first();

        echo view('comunes/header');
        return view('admin_bebidas/editar', $datos);
    }
    public function actualizar() {

        $bebidaModelo = new BebidaModelo();
        $datos = [
            'nombre_bebida'=> $this->request->getVar('nombre_bebida'),
            'id_tipo'=> $this->request->getVar('id_tipo'),
            'precio'=> $this->request->getVar('precio'),
            'descripcion'=> $this->request->getVar('descripcion'),
        ];
        $id = $this->request->getVar('id_bebida');
        
        $datos['bebida']=$bebidaModelo->where('id_bebida',$id)->first();
        
        $bebidaModelo->update($id, $datos);
        $validacion = $this->validate([
            'imagen_ruta' => [
                'uploaded[imagen_ruta]',
                'mime_in[imagen_ruta,image/jpg,image/jpeg,image/png]',
                'max_size[imagen_ruta,1200]',
            ]
        ]);
        if($validacion) {
            $datosBebida = $bebidaModelo->where('id_bebida', $id)->first();
            $ruta = ('../public/uploads/'.$datosBebida['imagen_ruta']);
            unlink($ruta);
            if($imagen = $this->request->getFile('imagen_ruta')) {
                $nuevoNombre = $imagen->getRandomName();
                $imagen->move('../public/uploads/', $nuevoNombre);
                $datos = [
                    'imagen_ruta' => $nuevoNombre
                ];
                $bebidaModelo->update($id, $datos);

            }
        }

        return redirect()->to('/');


    }

    public function eliminar($id_bebida) {
        // Aquí se procesa la eliminación de la bebida con el ID $id

        $bebidaModelo = new BebidaModelo();
        $bebidaModelo->delete($id_bebida);
        return redirect()->to(base_url('adminBebidas'));
    }
    public function guardar() {
        // Aquí se procesa el formulario de agregar una nueva bebida
        if($this->request->getMethod() === 'post') {
            $bebidaModelo = new BebidaModelo();
            $bebidaModelo->insert($_POST); // Asumiendo que los datos del formulario se envían por POST
            return redirect()->to(base_url('adminBebidas'));
        }
    }
    
   
}
