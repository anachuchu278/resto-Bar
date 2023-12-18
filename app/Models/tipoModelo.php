<?php

namespace App\Models;

use App\Controllers\AdminBebidasControlador;
use CodeIgniter\Model;

class tipoModelo extends Model
{
    protected $table = 'tipos_bebida';
    protected $primaryKey = 'id_tipo';
    protected $allowedFields = ['nombre_tipo'];

    public function tipo()
    {
        return $this->findAll();
    }

    public function filtrarPorTipo($tipo_id)
    {
        return $this->db->table('bebidas') // Asegúrate de tener la tabla correcta (puedes cambiar 'bebidas' al nombre correcto)
            ->where('id_tipo', $tipo_id)
            ->get()
            ->getResultArray();
    }
}
