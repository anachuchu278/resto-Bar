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
        $query = $this->db->table('bebidas')
            ->select('id_bebida, nombre, tipo_id, precio, descripcion, imagen_ruta')
            ->get();

        $resultados = $query->getResult();
        
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

    public function Actualizar($resultados)
{
    // Asegúrate de que $resultados no esté vacío y 'id_bebida' sea un valor válido
    if (!empty($resultados) && is_numeric($resultados['id_bebida'])) {
        // Filtra los datos permitidos antes de actualizar
        $this->set($resultados);
        
        // Filtra el identificador único
        $this->where('id_bebida', $resultados['id_bebida']);

        // Realiza la actualización en la base de datos
        $this->update();

        return true; // Opcional: Devuelve true para indicar éxito
    } else {
        return false; // Opcional: Devuelve false para indicar error
    }
}
private function guardarRutaEnBaseDeDatos($rutaArchivo)
{
 
    $bebidaModelo = new bebidaModelo();
    $bebidaModelo->insert(['imagen' => $rutaArchivo]);
}

}

