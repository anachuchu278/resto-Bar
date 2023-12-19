<?php

namespace App\Models;

use CodeIgniter\Model;

class RegisterModelo extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';

    protected $useAutoIncrement = true;

    protected $returnType = 'object';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['nombre_usuario', 'email', 'password', 'created_at'];

    protected $useTimeStamps = false;
    protected $createdFields = 'created_at';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
