<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LoginModelo;

class AddControlador extends Controller{
    public function NuevoAdmin(){
        $validation = $this->validate([
            'nombre' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Su Nombre completo es requerido'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[usuarios.email]',
                'errors' => [
                    'required' => 'Correo electrónico es requerido',
                    'valid_email' => 'Debe ingresar un correo electrónico válido, por ejemplo: @gmail.com',
                    'is_unique' => 'Correo electrónico ya está registrado'
                ]
            ],
            'contraseña' => [
                'rules' => 'required|min_length[5]|max_length[12]',
                'errors' => [
                    'required' => 'Se requiere Contraseña',
                    'min_length' => 'La Contraseña debe tener al menos 5 caracteres de longitud.',
                    'max_length' => 'La Contraseña no debe tener más de 12 caracteres de longitud'
                ]
            ],
        ]);
       
        if (!$validation) {

            //$this->session->setFlashdata('errors', $this->validator->getErrors());
            echo view('comunes/header');
            return view('nuevoAdmin');
        } else {
            $userModel = new LoginModelo();
       
            $userData = [
                'nombre' => $this->request->getPost('nombre'),
                'email' => $this->request->getPost('email'),
                'contrasena' => password_hash($this->request->getPost('contrasena'), PASSWORD_DEFAULT),
                'rol' => 1
            ];
       
            $userModel->insert($userData);
       
            
            return redirect()->to("crud");
        }  
    }
}