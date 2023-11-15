<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductoModelo extends Model
{
    protected $table = 'bebidas';

    public function buscarProductoPorId($tipo_id)
    {
        $query = $this->db->table($this->table)
            ->where('tipo_id', $tipo_id)
            ->get();

        return $query->getRowArray();
    }
}