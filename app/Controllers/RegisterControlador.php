<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\RegisterModelo;

class registerControlador extends Controller

{
    public function Index()
    {
        echo view('comunes/header');
        return  view('registerVista');
    }
    public function registrarse()
    {
        $RegisterModelo = new RegisterModelo();

        $name = $this->request->getPost('nombre');
        $email = $this->request->getPost('email');
        $password = password_hash($this->request->getPost('contrasena'), PASSWORD_DEFAULT);

        $data = ['nombre' => $name, 'email' => $email, 'contrasena' => $password];


        $r = $RegisterModelo->insert($data);

        if ($r) {
            echo "usuario registrado correctamente";
        } else {
            echo "error";
        }
    }

    public function registrarEmpleado() {
        // Recupera los datos del formulario de registro
        $nombre = $this->input->post('nombre');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
    
        // Verifica si el correo electrónico es igual al correo específico para empleados
        if ($email == 'admin@gmail.com') {
            // Registra al empleado en la base de datos (debes tener un modelo para esto)
            $this->load->model('empleadoModel'); // Reemplaza 'EmpleadoModel' con el nombre de tu modelo
            $this->empleadoModel->registrarEmpleado($nombre, $email, $password);
    
            // Redirige al empleado a la página de administrador de bebidas
            redirect('adminControlador/administrarBebidas');
        } else {
            // Si el correo no coincide, puedes mostrar un mensaje de error o redirigir a otra página
            redirect('otraPagina');
        }
    }
}
