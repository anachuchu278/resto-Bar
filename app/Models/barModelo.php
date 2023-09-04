<?php

namespace App\Models;

use CodeIgniter\Model;

class BarModelo extends Model
{
    protected $table = 'bebidas';


    public function buscarBebidaPorNombre($nombre)
    {
        // Realiza la consulta a la base de datos para buscar la bebida por su nombre
        $query = $this->db->table($this->table)
            ->where('nombre', $nombre)
            ->get();

        // Verifica si se encontró una bebida con el nombre buscado
        if ($query->getNumRows() > 0) {
            // Retorna la bebida encontrada como un array
            return $query->getRowArray();
        } else {
            // Si no se encontró ninguna bebida, retorna null
            return null;
        }
        
    }
    public function obtenerTodasLasBebidas()
    {
        // Obtiene todas las bebidas de la base de datos
        return $this->findAll();
}
}