<?php

namespace App\Models;

use CodeIgniter\Model;

class BarModelo extends Model
{
    protected $table = 'bebidas';
    protected $primaryKey = 'id_bebida';
    protected $allowedFields = ['nombre', 'tipo_id', 'precio', 'descripcion','imagen_ruta'];

}