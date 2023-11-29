<?php
namespace App\Models;

use App\Controllers\BebidasControlador;
use CodeIgniter\Model;

class BebidaModelo extends Model
{
    protected $table = 'bebidas';
    protected $primaryKey = 'id_bebida';
    protected $allowedFields = ['nombre', 'tipo_id', 'precio', 'descripcion', 'imagen_ruta'];


    public function buscarBebidaPorId($id)
    {

        return $this->find($id);

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
   public function agregar(){
       
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
    public function guardarRutaEnBaseDeDatos()
    {
        // Asume que tienes los demás datos de la bebida en un array $data
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'tipo' => $this->request->getPost('tipo'),
            'precio' => $this->request->getPost('precio'),
            'descripcion' => $this->request->getPost('descripcion'),
            'ingredientes' => $this->request->getPost('ingredientes'),
            'imagen' => $this->request->getPost('imagen_ruta'),
        ];
        $this->insert($data);
    }
}