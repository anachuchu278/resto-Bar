<?php 
namespace App\Models;

use CodeIgniter\Model;

class CrudModelo extends Model{
    protected $table      = 'bebidas';
    
    public function obtenerDatos(){

        // Realiza una consulta SQL para obtener datos
    $query = $this->query('SELECT * FROM bebidas');

    // Obtén los resultados en forma de arreglo
    $results = $query->getResult();
    }
}