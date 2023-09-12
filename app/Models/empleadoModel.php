<?php
class empleadoModel extends CI_Model {

    public function registrarEmpleado($nombre, $email, $password, $rol) {
        $data = array(
            'nombre' => $nombre,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'rol' => $rol // Asigna el rol del empleado
        );

        // Reemplaza 'empleados' con el nombre de tu tabla de empleados
        $this->db->insert('empleados', $data);
    }

    public function obtenerEmpleadoPorEmail($email) {
        // Consultar un empleado por su correo electrónico
        // Reemplaza 'empleados' con el nombre de tu tabla de empleados
        $query = $this->db->get_where('empleados', array('email' => $email));
        return $query->row_array();
    }

    // Otras funciones para consultar o administrar empleados según tus necesidades
}
?>