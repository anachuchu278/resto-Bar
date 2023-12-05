<?php
namespace App\Models;

use App\Controllers\AdminBebidasControlador;
use CodeIgniter\Model;

class tipoModelo extends Model
{
    protected $table = 'tipos_bebida';
    protected $primaryKey = 'id_tipo';
    protected $allowedFields = ['nombre_tipo'];

    public function tipo()
    {
        return $this->findAll();
    }

}