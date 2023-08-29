<?php

namespace App\Controllers;

use App\Models\BebidaModelo;
use CodeIgniter\Controller;

class AdminBebidasControlador extends Controller
{
    public function index()
    {
        $bebidaModelo = new BebidaModelo();
        $data['bebidas'] = $bebidaModelo->findAll();

        return view('admin_bebidas/index', $data);
    }

    public function agregar()
    {
        // Aquí se procesa el formulario de agregar una nueva bebida
        if ($this->request->getMethod() === 'post') {
            $bebidaModelo = new BebidaModelo();
            $bebidaModelo->insert($_POST); // Asumiendo que los datos del formulario se envían por POST
            return redirect()->to(base_url('admin_bebidas'));
        }

        return view('admin_bebidas/agregar');
    }

    public function editar($id)
    {
        // Aquí se procesa el formulario de edición de la bebida con el ID $id
        $bebidaModelo = new BebidaModelo();

        if ($this->request->getMethod() === 'post') {
            $bebidaModelo->update($id, $_POST); // Asumiendo que los datos del formulario se envían por POST
            return redirect()->to(base_url('admin_bebidas'));
        }

        $data['bebida'] = $bebidaModelo->find($id);
        return view('admin_bebidas/editar', $data);
    }

    public function eliminar($id)
    {
        // Aquí se procesa la eliminación de la bebida con el ID $id
        $bebidaModelo = new BebidaModelo();
        $bebidaModelo->delete($id);
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
