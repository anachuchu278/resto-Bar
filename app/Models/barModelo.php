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

<<<<<<< HEAD
    echo "Result: ";
    print_r($result);  // Print out the result
=======
    $query = $this->db->query("SELECT tipo_id FROM bebidas");
    
    return $query->getResultArray();
        
>>>>>>> d43251ea3e0f73422111c559f20896aae1043f02

    return $result;
}
}
