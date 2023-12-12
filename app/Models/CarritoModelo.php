<?php

namespace App\Models;

use CodeIgniter\Model;

class CarritoModelo extends Model
{
    protected $table = 'carrito_compras';
    protected $primaryKey = 'id_carrito';
    protected $allowedFields = ['id_bebida', 'cantidad','id_usuario']; 
}