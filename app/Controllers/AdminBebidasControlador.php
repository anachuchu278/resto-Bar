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
        $request = service('request');

        // Verifica si se ha enviado un archivo
        if ($file = $request->getFile('imagen-ruta')) {
            // Genera un nombre único para el archivo
            $newName = $file->getRandomName();

            // Mueve el archivo a la carpeta public/uploads
            $file->move('./public/assets/', $newName);

            // Guarda la ruta del archivo en la base de datos
            $rutaArchivo = 'assets/' . $newName;
            $this->guardarRutaEnBaseDeDatos($rutaArchivo);

            // Redirecciona o realiza otras acciones según tus necesidades
            return redirect()->to(base_url('admin_bebidas/index'));
        } else {
            // Maneja el caso en que no se envió ningún archivo
            return "Error al cargar la imagen: " ;

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
       
       
    }

    public function editar($resultados)
    {
       
     // Crear una instancia del modelo
        $bebidaModelo = new BebidaModelo();
        echo var_dump($resultados);
        
        // Obtener los datos de las bebidas
        $resultados = $bebidaModelo->obtenerDatos($resultados);
        

        // Verificar si $resultados['bebidas'] no es null y contiene elementos
        if (!empty($resultados['bebidas']) ){
            $bebidaModelo->Actualizar($resultados);
            return view('admin_bebidas/editar', $resultados);

        
        
            
            // Pasar los datos a la vista y cargar la vista
            
        } else {
            // Manejar el caso donde $resultados['bebidas'] es null o está vacío
            return "No se encontraron bebidas para actualizar.";
        }


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
