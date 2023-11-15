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
     
}

<<<<<<< HEAD
=======
    public function obtenerTodasLasBebidas()
    {
        // Obtiene todas las bebidas de la base de datos
        return $this->findAll();
    }
    public function Actualizar($data,$id){
        $this->update($data,$id);

    }
}
>>>>>>> f1e1a3875fa6066fda8fc604e184ebe522bc3719
