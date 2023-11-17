<?php namespace App\Models;

use CodeIgniter\Model;

class BebidaModelo extends Model
{
    protected $table = 'bebidas';
    protected $primaryKey = 'id_bebida';
    protected $allowedFields = ['nombre', 'tipo_id', 'precio', 'descripcion', 'imagen_ruta'];


    public function buscarBebidaPorId($id){

        return $this->find($id);

    }
     


    public function obtenerTodasLasBebidas()
    {
        // Obtiene todas las bebidas de la base de datos
        return $this->findAll();
    }
    public function obtenerDatos(){
        return $this->db->query('
        SELECT * 
        ');
    }

    public function Actualizar($data, $id)
    {
        // Asegúrate de que $data no esté vacío y $id sea un valor válido
        if (!empty($data) && is_numeric($id)) {
            // Filtra los datos permitidos antes de actualizar
            $this->set($data);
            
            // Filtra el identificador único
            $this->where('id_bebida', $id);

            // Realiza la actualización en la base de datos
            $this->update();

            return true; // Opcional: Devuelve true para indicar éxito
        } else {
            return false; // Opcional: Devuelve false para indicar error
        }
    }
}


