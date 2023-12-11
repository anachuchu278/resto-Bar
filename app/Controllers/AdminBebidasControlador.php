<?php

namespace App\Controllers;

use App\Models\BebidaModelo;
use App\Models\tipoModelo;
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

    public function agregarVista() {
        $user = session('user');
        if(!$user || $user['rol'] < 1) {
            return redirect()->to('/login');
        } else {

            echo view('comunes/header');
            return view('admin_bebidas/agregar');
        }

    }
    // En tu controlador
    // public function tipos()
    // {
    //     // Obtener los tipos y pasarlos a la vista
    //     $tipoModelo = new TipoModelo(); // Asegúrate de tener el nombre correcto del modelo
    //     $data['tipos'] = $tipoModelo->tipo();

    //     // Cargar la vista con los datos
    //     echo view('admin_bebidas/agregar', $data);
    // }


    public function agregarA() {
        $bebidaModelo = new BebidaModelo();

       // $tipoModelo = new tipoModelo();
      // $datos['bebida'] = $tipoModelo->where('id_tipo', $id_tipo)->first();

        if($imagen = $this->request->getFile('imagen_ruta')) {
            $nuevoNombre = $imagen->getRandomName();
            $imagen->move('../public/uploads/', $nuevoNombre);
            $datos = [
                'nombre' => $this->request->getVar('nombre'),
                'id_tipo' => $this->request->getVar('id_tipo'),
                'precio' => $this->request->getVar('precio'),
                'descripcion' => $this->request->getVar('descripcion'),
                'imagen_ruta' => $nuevoNombre

            ];
           
            $bebidaModelo->insert($datos);

        }
        return redirect()->to('/');
    }

    public function editar($id) {
        $user = session('user');
        if(!$user || $user['rol'] < 1) {
            return redirect()->to('/login');
        } else {

            $bebidaModelo = new BebidaModelo();
            $datos['bebida'] = $bebidaModelo->where('id_bebida', $id)->first();
            
            echo view('comunes/header');
            return view('admin_bebidas/editar', $datos);
        }




    }
    public function actualizar() {

        $bebidaModelo = new BebidaModelo();
        $datos = [
            'nombre' => $this->request->getVar('nombre'),
            'id_tipo' => $this->request->getVar('id_tipo'),
            'precio' => $this->request->getVar('precio'),
            'descripcion' => $this->request->getVar('descripcion'),


        ];
        $id = $this->request->getVar('id_bebida');
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
    // public function actualizar($id)
    // {
    //     // Aquí se procesa la actualización de la bebida con el ID $id
    //     $bebidaModelo = new BebidaModelo();

    //     if ($this->request->getMethod() === 'post') {
    //         $bebidaModelo->update($id, $_POST); // Asumiendo que los datos del formulario se envían por POST
    //         return redirect()->to(base_url('adminBebidas'));
    //     }

    //     $data['bebida'] = $bebidaModelo->find($id);
    //     return view('admin_bebidas/editar', $data);
    // }
}
