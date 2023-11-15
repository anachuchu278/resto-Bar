<?php

namespace App\Models;

use CodeIgniter\Model;

class CalleModelo extends Model
{
    protected $table = 'calle';
    protected $primaryKey = 'id_calle';
    protected $allowedFields = ['id_calle', 'calle'];
}