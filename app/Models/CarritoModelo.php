<?php

namespace App\Models;
use CodeIgniter\Model;

class CarritoModelo extends Model
{
    public function agregarAlCarrito($id_carrito, $id_bebida, $cantidad)
{
    $data = [
        'id_carrito' => $id_carrito,
        'id_bebida' => $id_bebida,
        'cantidad' => $cantidad, 
    ];

    $this->db->table('carrito_compras')->insert($data);
}
    protected $table = 'carrito';
    protected $primaryKey = 'id';
    protected $allowedFields = ['usuario_id'];

    public function obtenerCarritoPorUsuario($usuarioId)
    {
        return $this->where('usuario_id', $usuarioId)->first();
    }

    public function agregarProductoAlCarrito($usuarioId, $productoId, $cantidad = 1)
    {
        $carrito = $this->obtenerCarritoPorUsuario($usuarioId);

        if (!$carrito) {
            $this->insert(['usuario_id' => $usuarioId]);
            $carrito = $this->obtenerCarritoPorUsuario($usuarioId);
        }

        // Verificar si el producto ya está en el carrito
        $productoEnCarrito = $this->db->table('carrito_bebidas')
            ->where('carrito_id', $carrito['id'])
            ->where('producto_id', $productoId)
            ->get()->getRowArray();

        if ($productoEnCarrito) {
            // Si el producto ya está en el carrito, actualizar la cantidad
            $cantidad += $productoEnCarrito['cantidad'];
            $this->db->table('carrito_bebidas')
                ->where('id', $productoEnCarrito['id'])
                ->update(['cantidad' => $cantidad]);
        } else {
            // Si no está en el carrito, agregarlo
            $this->db->table('carrito_bebidas')
                ->insert(['carrito_id' => $carrito['id'], 'producto_id' => $productoId, 'cantidad' => $cantidad]);
        }

        return true;
    }

    public function eliminarProductoDelCarrito($carritoId, $productoId)
    {
        return $this->db->table('carrito_bebidas')
            ->where('carrito_id', $carritoId)
            ->where('producto_id', $productoId)
            ->delete();
    }

    public function obtenerProductosEnCarrito($carritoId)
    {
        return $this->db->table('carrito_bebidas')
            ->where('carrito_id', $carritoId)
            ->get()->getResultArray();
    }

    public function calcularTotalCarrito($carritoId)
    {
        $productosEnCarrito = $this->obtenerProductosEnCarrito($carritoId);
        $total = 0;

        foreach ($productosEnCarrito as $producto) {
            // Aquí deberías tener una lógica para obtener el precio del producto
            // Puedes usar el modelo de productos o acceder a la base de datos directamente
            // $producto['producto_id'] te dará el ID del producto

            // Supongamos que tienes una función obtenerPrecioProducto($productoId) en el modelo de productos
            $precio = $this->db->table('productos')
                ->select('precio')
                ->where('id', $producto['producto_id'])
                ->get()->getRowArray()['precio'];

            $total += $precio * $producto['cantidad'];
        }

        return $total;
    }
}