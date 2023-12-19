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

public function eliminarProductoDelCarrito($idUsuario, $idBebida)
{
    $carrito = $this->obtenerProductosDelCarrito($idUsuario);

    // Verifica si el producto está en el carrito
    if (isset($carrito[$idBebida])) {
        // Elimina completamente el producto del carrito
        unset($carrito[$idBebida]);

        // Guarda la actualización del carrito
        $this->guardarCarritoEnSesion($idUsuario, $carrito);
        return true;
    }

    return false; // Producto no encontrado en el carrito
}

protected function guardarCarritoEnSesion($idUsuario, $carrito)
{
    // Guarda el carrito actualizado en la sesión
    session()->set("carrito_$idUsuario", $carrito);
}
}