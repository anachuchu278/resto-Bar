<?php

namespace App\Models;

use CodeIgniter\Model;

class carrito_model extends Model
{
    protected $table = 'carrito';

    protected $primaryKey = 'id';

    protected $allowedFields = ['carrito_id', 'bebida_id', 'cantidad'];

    public function agregarAlCarrito($carrito_id, $bebida_id, $cantidad)
    {
        $data = [
            'carrito_id' => $carrito_id,
            'bebida_id' => $bebida_id,
            'cantidad' => $cantidad
        ];

        $this->insert($data);
    }
}