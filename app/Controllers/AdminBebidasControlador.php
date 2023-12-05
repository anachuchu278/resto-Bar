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


            // Redirecciona o realiza otras acciones según tus necesidades
            //echo view('');
        } 

        //     // Redirecciona o realiza otras acciones según tus necesidades
        //     return redirect()->to(base_url('admin_bebidas/index'));
        // } else {
        //     // Maneja el caso en que no se envió ningún archivo
        //     return "Error al cargar la imagen: " ;

        // }

    

   



    public function agregar()
    {   
        $user = session('user'); 
        if (!$user || $user ['rol'] < 1) {
            return redirect()->to('/login');
        }
        else {
            // Aquí se procesa el formulario de agregar una nueva bebida
            if ($this->request->getMethod() === 'post') {
                $bebidaModelo = new BebidaModelo();
                $data = [
                    'nombre' => $this->request->getPost('nombre'),
                    'tipo' => $this->request->getPost('tipo'),
                    'precio' => $this->request->getPost('precio'),
                    'descripcion' => $this->request->getPost('descripcion'),
                    'ingredientes' => $this->request->getPost('ingredientes'),
                ];
    
                // Aquí debes agregar el código para manejar la carga de la imagen
                if(isset($_FILES['imagen'])){
                    $file_name = $_FILES['imagen']['name'];
                    $file_tmp = $_FILES['imagen']['tmp_name'];
                    
                    move_uploaded_file($file_tmp,"images/".$file_name);
                    $data['imagen'] = "images/".$file_name;
                }
    
                $bebidaModelo->insert($data);
                return redirect()->to(base_url('admin_bebidas'));
            }
            else {
                echo view('comunes/header');
                return view('admin_bebidas/agregar');
            }
        }
    }

    public function editar($id)
    {
      
    
        
        $bebidaModelo = new BebidaModelo();
        $data['bebida'] = $bebidaModelo->obtenerDatos($id);
        //var_dump($data);
        
        
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
