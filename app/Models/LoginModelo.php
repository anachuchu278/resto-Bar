<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModelo extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    //protected $useSoftDeletes = true;

    protected $allowedFields = ['name', 'email', 'password', 'created_at'];

    protected $useTimeStamps = false;
    protected $createdFields = 'created_at';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
}

