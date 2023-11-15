<?php

namespace App\Models;

use CodeIgniter\Model;

class CiudadModelo extends Model
{
    protected $table = 'ciudad';
    protected $primaryKey = 'id_ciudad';
    protected $allowedFields = ['ciudad'];
}