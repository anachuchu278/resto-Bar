<?php

namespace App\Models;

use CodeIgniter\Model;

class MetodoPagoModelo extends Model
{
    protected $table = 'metodo_de_pago';
    protected $primaryKey = 'metodo_id';
    protected $allowedFields = ['nombre'];
}