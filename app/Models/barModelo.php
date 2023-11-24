<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Summary of BarModelo
 */
class barModelo extends Model
{
    protected $table = 'bebidas';

    /**
     * Summary of buscarBebidaPorNombre
     * @param mixed $nombre
     * @return array|null
     */
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
    $query = $this->db->query("SELECT tipo_id FROM bebidas JOIN tipos_bebida ON bebidas.tipo_id = tipos_bebida.nombre");
    return $query->getResultArray();
        
}
}
