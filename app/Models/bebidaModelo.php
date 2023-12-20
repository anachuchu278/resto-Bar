<?php

namespace App\Models;


use CodeIgniter\Model;

class BebidaModelo extends Model
{

    protected $table = 'bebidas';
    protected $primaryKey = 'id_bebida';
    protected $allowedFields = ['nombre_bebida', 'id_tipo', 'precio','descripcion', 'id_imagen'];

    public function buscarBebidaPorId($id)
    {

        return $this->find($id);
    }

    
    public function obtenerPrecioUnitario($id_bebida)
    {
        $bebida = $this->find($id_bebida);
        if ($bebida && array_key_exists('precio', $bebida)) {
            return $bebida['precio'];
        } else {
            return null;
        }
    }


    public function obtenerNombre($id_bebida)
    {
        $bebida = $this->find($id_bebida);
        if ($bebida && array_key_exists('nombre_bebida', $bebida)) {
            return $bebida['nombre_bebida'];
        } else {
            return null;
        }
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

            $this->update($id, $resultados);

            return true;
        } else {
            return false;
        }
    }
}
