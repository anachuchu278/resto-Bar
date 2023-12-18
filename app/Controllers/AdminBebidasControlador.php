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


    //public function guardar_imagen()
    //{
        // Obtén la instancia de la request
        // $request = service('request');

        // // Verifica si se ha enviado un archivo
        // if ($file = $request->getFile('imagen-ruta')) {
        //     // Genera un nombre único para el archivo
        //     $newName = $file->getRandomName();

        //     // Mueve el archivo a la carpeta public/uploads
        //     $file->move('./public/assets/', $newName);

        //     // Guarda la ruta del archivo en la base de datos
        //     $rutaArchivo = 'assets/' . $newName;
        //     $this->guardarRutaEnBaseDeDatos($rutaArchivo);


            // Redirecciona o realiza otras acciones según tus necesidades
            //echo view('');
        //} 

        //     // Redirecciona o realiza otras acciones según tus necesidades
        //     return redirect()->to(base_url('admin_bebidas/index'));
        // } else {
        //     // Maneja el caso en que no se envió ningún archivo
        //     return "Error al cargar la imagen: " ;

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


            // $imagen = $this->request->getFile('imagen');

            // // verifica imagen válida
            // if ($imagen->isValid() && !$imagen->hasMoved()) {

            //     // genera nombre único para la imagen
            //     $nuevoNombreImagen = $imagen->getRandomName();

            //     // mueve la imagen a la carpeta 
            //     $imagen->move('img', $nuevoNombreImagen);

            //     // ruta completa de la imagen para almacenar en la db
            //     $rutaImagen = base_url('img/' . $nuevoNombreImagen);

            //     // insertar imágen
            //     $idNuevaImagen = $bebidaModelo->insert([
            //         "imagen" => $rutaImagen
            //     ]);


            // datos para insertar en la db
            $data = [
                'nombre' => $this->request->getPost('nombre'),
                'precio' => $this->request->getPost('precio'),
                //'stock' => $this->request->getPost('stock'),
                'descripcion' => $this->request->getPost('descripcion'),
                'id_tipo' => $this->request->getPost('tipo_id'),
                'ingredientes' => $this->request->getPost('ingredientes'),
                //'id_estado' => $this->request->getPost('estado'),
                //'id_imagen' => $idNuevaImagen, 
            ];
            //var_dump($data);

            $bebidaModelo->insert($data);
            return redirect()->to('adminBebidas');
        }




    }
    public function actualizar() {

        $bebidaModelo = new BebidaModelo();
        $data['bebida'] = $bebidaModelo->obtenerDatos($id);


       
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
    
   
}
