<?php

namespace App\Models;

use CodeIgniter\Model;

class TipoBebidaModelo extends Model
{
    protected $table = 'tipos_bebida';
    protected $primaryKey = 'id'; // El nombre de la columna que es la clave primaria en la tabla 'tipos_bebida'
    protected $allowedFields = ['nombre'];
    
    public function getBebidasPorTipo($tipoId)
    {
        return $this->db->table('bebidas')
            ->where('tipo_id', $tipoId)
            ->get()
            ->getResult();
    }// Otras columnas permitidas si las tienes
}