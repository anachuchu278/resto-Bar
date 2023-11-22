<?php

namespace App\Models;

use CodeIgniter\Model;

class BarModelo extends Model
{
    protected $table = 'bebidas';

    public function buscarBebidaPorNombre($nombre)
{
    $query = $this->db->table($this->table)
        ->where('nombre', $nombre)
        ->get();

    if ($query->getNumRows() > 0) {
        return $query->getRowArray(); // Cambiado a getRowArray() para obtener solo un resultado
    } else {
        return null;
    }
}
public function filtrarBebidasPorTipo($tipo)
{
    // Ajusta la lógica según tu estructura de base de datos
    $this->db->select('*');
    $this->db->from('bebidas');
    $this->db->where('tipo', $tipo);
    return $this->db->get()->result_array();
}
}
