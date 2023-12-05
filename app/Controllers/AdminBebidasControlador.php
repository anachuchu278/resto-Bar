<?php

namespace App\Controllers;

use App\Models\BebidaModelo;
use App\Models\tipoModelo;
use CodeIgniter\Controller;

class AdminBebidasControlador extends Controller
{
    public function index()
    {
        $user = session('user');
        if (!$user || $user['rol'] < 1) {
            return redirect()->to('/login');
        } else {
            $bebidaModelo = new BebidaModelo();
            $data['bebidas'] = $bebidaModelo->findAll();

            echo view('comunes/header');
            return view('admin_bebidas/index', $data);

        }






    }



    public function guardar_imagen()
    {
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

<<<<<<< HEAD

            // Redirecciona o realiza otras acciones según tus necesidades
            //echo view('');
        } 

=======
>>>>>>> d43251ea3e0f73422111c559f20896aae1043f02
        //     // Redirecciona o realiza otras acciones según tus necesidades
        //     return redirect()->to(base_url('admin_bebidas/index'));
        // } else {
        //     // Maneja el caso en que no se envió ningún archivo
        //     return "Error al cargar la imagen: " ;

        // }
<<<<<<< HEAD

    
=======
    }
>>>>>>> d43251ea3e0f73422111c559f20896aae1043f02





    public function agregarVista()
    {
        echo view('comunes/header');
        return view('admin_bebidas/agregar');


    }
     public function tipos()
    {
        $tipoModelo = new tipoModelo();
        $tipo = $this->request->getPost('id_tipo');
        $data['tipo'] = $tipoModelo->tipo();

        return view('admin_bebidas/agregar', $data);
    }
    public function agregarA()
    {
        $user = session('user');
        if (!$user || $user['rol'] < 1) {
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
   
    public function editar($id)
    {



        $bebidaModelo = new BebidaModelo();
        $data['bebida'] = $bebidaModelo->obtenerDatos($id);


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $datosActualizados = [
                'nombre' => $_POST['nombre'],
                'tipo_id' => $_POST['tipo_id'],
                'precio' => $_POST['precio'],
                'descripcion' => $_POST['descripcion'],
                'imagen_ruta' => $_POST['imagen_ruta'],
            ];


            $actualizacionExitosa = $bebidaModelo->actualizarDatos($id, $datosActualizados);

            if ($actualizacionExitosa) {
                echo "Bebida actualizada con éxito";
            } else {
                echo "Error al actualizar la bebida";
            }
        }


        return view('admin_bebidas/editar', $data);


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
