<?php

namespace App\Models;

use CodeIgniter\Model;

class CarritoModelo extends Model
{
    protected $table = 'carrito_compras';
    protected $primaryKey = 'id_carrito';
    protected $allowedFields = ['id_bebida', 'cantidad','id'];

    public function calcularTotalCarrito($productos)
{
    $total = 0;
    if (empty ($productos))
    foreach ($productos as $producto) {
        $total += $producto['precio'] * $producto['cantidad'];
    }

    return $total;
}

public function obtenerProductosDelCarrito($id_usuario)
{
    // Asegúrate de que el nombre de la tabla y las columnas coincidan con tu base de datos
    return $this->db->table('carrito_compras')
        ->select('id_bebida, cantidad')
        ->where('id_usuario', $id_usuario)
        ->get()
        ->getResultArray();
}
}