<?php

namespace App\Models;

use CodeIgniter\Model;

class CompraModelo extends Model
{
    protected $table = 'compras';
    protected $primaryKey = 'id_compra';
    protected $allowedFields = ['ciudad_id', 'calle_id', 'metodo_pago_id', 'provincia'];
}