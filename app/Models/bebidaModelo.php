<?php
namespace App\Models;

use App\Controllers\BebidasControlador;
use CodeIgniter\Model;

class BebidaModelo extends Model
{
    protected $table = 'bebidas';
    protected $primaryKey = 'id_bebida';
    protected $allowedFields = ['nombre', 'id_tipo', 'precio', 'descripcion', 'imagen_ruta'];


    public function buscarBebidaPorId($id)
    {

        return $this->find($id);

    }

public function insertBebida($data){
    $str = 'INSERT INTO bebidas (nombre, tipo_id, precio, descripcion,ingredientes, id_imagen)
    VALUES ("'.$data['nombre'].'", "'.$data['id_tipo'].'", "'.$data['precio'].'", "'.$data['descripcion'].'", "'.$data['ingredientes'].$data['id_imagen'] .'")';

    $data = $this->db->query($str);

}






    public function obtenerTodasLasBebidas()
    {
        // Obtiene todas las bebidas de la base de datos
        return $this->findAll();
    }

    public function obtenerDatos($id)
    {
        

        $query = $this->db->query("SELECT * FROM bebidas WHERE id_bebida = ?", [$id]);
        
        
        $resultado = $query->getRow();
        
        return $resultado;
        

            

    }
 

    public function buscarBebidaPorNombre($nombre)
{
    $query = $this->db->table($this->table)
        ->where('nombre', $nombre)
        ->get();

    if ($query->getNumRows() > 0) {
        return $query->getRowArray(); // Cambiado a getRowArray() para obtener solo un resultado
    } else {
        return null;
    }
}

    public function Actualizar($id)
    {
        
    if (!empty($resultados) && isset($resultados->id_bebida)) {
       
        $id = $resultados->id_bebida;

        $this->update($id,$resultados);

        return true; 
    } else {
        return false; 
    }
    }
   
}