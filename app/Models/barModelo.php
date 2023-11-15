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
}
