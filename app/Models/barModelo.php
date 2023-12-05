<?php

namespace App\Models;

use CodeIgniter\Model;


class barModelo extends Model
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
    $builder = $this->db->table('bebidas');
    $builder->select('*');
    $builder->where('tipo_id', $tipo);
    $result = $builder->get()->getResultArray();

    echo "Result: ";
    print_r($result);  // Print out the result

    return $result;
}
}
