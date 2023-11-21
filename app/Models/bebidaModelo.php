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

    public function obtenerDatos($resultados)
    {
        $query = $this->db->query("SELECT nombre,tipo_id,precio,descripcion FROM bebidas WHERE ");  
        
        $resultados = $query->getResult();
        return $resultados;

    }


    public function Actualizar($resultados)
    {
        // Asegúrate de que $resultados no esté vacío y 'id_bebida' sea un valor válido
    if (!empty($resultados)) {
        // Filtra los datos permitidos antes de actualizar
        $this->set($resultados);


        // Realiza la actualización en la base de datos
        $this->update();

        return true; // Opcional: Devuelve true para indicar éxito
    } else {
        return false; // Opcional: Devuelve false para indicar error
    }
    }
    public function guardarRutaEnBaseDeDatos($rutaArchivo)
    {

        $bebidaModelo = new bebidaModelo();
        $bebidaModelo->insert(['imagen' => $rutaArchivo]);
    }

}