<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModelo extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    //protected $useSoftDeletes = true;

    protected $allowedFields = ['nombre_usuario', 'email', 'password', 'created_at' , 'rol'];

    protected $useTimeStamps = false;
    protected $createdFields = 'created_at';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    
    /*public function insert($result=null, bool $returnID =true) {
        if (isset($result['contrasena'])){
            $result['contrasena'] = password_hash($result['contrasena'],PASSWORD_DEFAULT);
        }
        return parent::insert($result,$returnID);
    }*/
}

