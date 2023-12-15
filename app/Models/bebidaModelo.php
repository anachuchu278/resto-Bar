<?php
namespace App\Models;

use App\Controllers\BarControlador;
use CodeIgniter\Model;

class BebidaModelo extends Model
{
   protected $table = 'bebidas';
   protected $primaryKey = 'id_bebida';

   protected $allowedFields = ['nombre', 'id_tipo', 'precio',
      'descripcion', 'id_imagen'];

   public function buscarBebidaPorId($id)
   {
      return $this->find($id);
   }
   public function obtenerPrecioUnitario($id_bebida)
   {
      $bebida = $this->find($id_bebida);
      if (!empty($bebida) && array_key_exists('precio', $bebida)) {
         return $bebida['precio'];
     } else {
         return null;
      }
   }
   public function calcularTotalCarrito($id_bebida){
      $bebida = $this->find($id_bebida);
      if(!empty($bebida) && array_key_exists('total',$bebida)) {
   }else{
      return null;
   }
}
public function obtenerProductosDelCarrito($id_bebida){
   $bebida = $this->find($id_bebida);
   if(!empty($bebida) && array_key_exists('total',$bebida)) {
}else{
   return null;
}
}
   public function insertBebida($data)
   {
      $str = 'INSERT INTO bebidas (nombre, tipo_id, precio,
descripcion,ingredientes, id_imagen)
VALUES ("' . $data['nombre'] . '", "' . $data['tipo_id'] . '",
"' . $data['precio'] . '", "' . $data['descripcion'] . '",
"' . $data['ingredientes'] . $data['id_imagen'] . '")';
      $data = $this->db->query($str);
   }

   public function obtenerTodasLasBebidas()
   {
      // Obtiene todas las bebidas de la base de datos
      return $this->findAll();
   }
   public function obtenerDatos($id)
   {

      $query = $this->db->query("SELECT * FROM bebidas WHERE

id_bebida = ?", [$id]);

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
         $this->update($id, $resultados);
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
   public function obtenerNombre($id_bebida)
   {
      // Supongamos que tu tabla se llama 'bebidas' y tiene una columna 'nombre'
      $query = $this->db->table('bebidas')
         ->select('nombre')
         ->where('id_bebida', $id_bebida)
         ->get();

      return $query->getRow('nombre');
   }
}