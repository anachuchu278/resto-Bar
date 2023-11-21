<?php

namespace App\Controllers;

use App\Models\TipoBebidaModelo;
use App\Models\BarModelo;
use App\Models\BebidaModelo;
use App\Models\CarritoModelo;
use CodeIgniter\Controller;
use App\Models\loginModelo;

class BarControlador extends Controller {

    private $barModelo;
    private $CarritoModelo;


public function __construct() {
    $this->barModelo = new BebidaModelo();
    $this->CarritoModelo = new CarritoModelo();
    if (!session()->has('carrito')) {
        session()->set('carrito', []);
    }
}


    public function index()
    {
        $bebidaModelo = new BebidaModelo();
        $data['bebidas'] = $bebidaModelo->findAll();

        // Obtener los tipos de bebida disponibles
        $tipoBebidaModelo = new TipoBebidaModelo();
        $data['tiposBebida'] = $tipoBebidaModelo->findAll();
        $user = session('user'); 

        echo view('comunes/header');
        echo view('barVista', $data);
        echo view('comunes/footer');
    }

    public function verDetalleOrden($tipo_id)
    {
        // Lógica para ver detalles de una bebida específica
        $bebidaModelo = new BarModelo();  // Cambiado a BarModelo
        $data['bebidaEncontrada'] = $bebidaModelo->where('tipo_id', $tipo_id)->findAll();

        echo view('barVista', $data);
    }

    public function buscarBebida()

{
    $busqueda = $this->request->getPost('busqueda');

    if ($busqueda !== "") {
        $data['bebidaEncontrada'] = $this->barModelo->buscarBebidaPorNombre($busqueda);
    } else {
        $data['bebidaEncontrada'] = null;
    }

    // Obtener todas las bebidas (puedes ajustar esto según tus necesidades)
    $bebidaModelo = new BebidaModelo();
    $data['bebidas'] = $bebidaModelo->findAll();

    return view('barVista', $data);
}
// public function verDetalleOrden($tipo_id)
// {
//     // Lógica para ver detalles de una bebida específica
//     $bebidaModelo = new BebidaModelo();  
//     $data['bebidaEncontrada'] = $bebidaModelo->where('tipo_id', $tipo_id)->first(); // Usamos 'first' para obtener solo un resultado

//     {
//         $busqueda = $this->request->getPost('busqueda');

//         if ($busqueda !== "") {
//             $data['bebidaEncontrada'] = $this->barModelo->buscarBebidaPorNombre($busqueda);
//         } else {
//             $data['bebidaEncontrada'] = null;
//         }

//         return view('barVista', $data);
//     }
// }
    public function filtrarPorTipo($tipo)
    {
        // Obtener las bebidas filtradas por tipo
        $bebidaModelo = new BebidaModelo();
        $data['bebidas'] = $bebidaModelo->findAll();

        echo view('barVista', $data);
    }


    public function Ingresar(){
        $carrito = session()->get('carrito');

    $data['carrito'] = $carrito;

    echo view('comprarVista', $data);
        return view('comprarVista');
    }
    public function buscarProductoPorId($id)
{
    // Lógica para buscar un producto por su ID
    $productoModelo = new barModelo(); // Asegúrate de cargar el modelo adecuado
    $producto = $productoModelo->buscarProductoPorId($id);

    return $producto;
}
    public function autenticar()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
    
        // Verifica las credenciales (en este caso, consulta la base de datos)
        $usuarioModelo = new LoginModelo();
        $usuario = $usuarioModelo->where('email', $email)
                                 ->where('password', $password)
                                 ->first();
    
        if ($usuario) {
            // Credenciales correctas
            if ($usuario['rol'] == 1) {
                // Es administrador, redirige a la página de administrador
                return redirect()->to(base_url('barControlador/administrador'));
            } else {
                // Es usuario común, redirige a la página de usuario común
                return redirect()->to(base_url('barControlador/comprar'));
            }
        } else {
            // Credenciales incorrectas, redirige de vuelta al inicio de sesión
            return redirect()->to(base_url('barControlador/login'));
        }
    }
    
    public function administrador()
    {
        // Lógica para la página de administrador
        echo view('adminVista');
    }
    

    public function agregarAlCarrito($id_bebida){

    $CarritoModelo = new CarritoModelo();
    $bebidaModelo = new BebidaModelo();
    $producto = $bebidaModelo->find($id_bebida);

    if ($producto) {
        $cantidad = $this->request->getPost('cantidad');
        
        // Asegurémonos de que la cantidad sea un entero válido
        $cantidad = is_numeric($cantidad) ? intval($cantidad) : 1;

        // Obtenemos el carrito actual
        $carrito = session()->get('carrito') ?? [];

        // Si el producto ya está en el carrito, actualizamos la cantidad
        if (isset($carrito[$id_bebida])) {
            $carrito[$id_bebida] += $cantidad;
        } else {
            // Si no, simplemente agregamos el producto al carrito con la cantidad
            $carrito[$id_bebida] = $cantidad;
        }

        // Guardamos el carrito actualizado en la sesión
        session()->set('carrito', $carrito);

        return view('agregarAlCarrito', ['producto' => $producto]);
    } else {
        return view('barVista');
    }
    // ... Otros métodos ...
  





//     private function guardarEnCarrito($id_bebida, $cantidad)
// {
//     $carrito = session()->get('carrito') ?? [];

//     // Si el producto ya está en el carrito, actualiza la cantidad
//     if (array_key_exists($id_bebida, $carrito)) {
//         $carrito[$id_bebida]['cantidad'] += $cantidad;
//     } else {
//         // Si no, agrega un nuevo elemento al carrito
//         $carrito[$id_bebida] = [
//             'id_bebida' => $id_bebida,
//             'cantidad' => $cantidad,
//         ];
//     }

//     // Guarda el carrito en la sesión
//     session()->set('carrito', $carrito);
// }
// public function comprar()

// {
//     $carrito = session()->get('carrito') ?? [];
//     $CarritoModelo = new CarritoModelo();

//     $bebidaModelo = new BebidaModelo();
//     $productos = [];
//     $total = 0;

//     foreach ($carrito as $id_bebida => $cantidad) {
//         $producto = $bebidaModelo->find($id_bebida);

//         if ($producto) {
//             $productos[$id_bebida] = [
//                 'id_bebida' => $id_bebida,
//                 'nombre' => $producto['nombre'],
//                 'tipo_id' => $producto['tipo_id'],
//                 'precio' => $producto['precio'],
//                 'descripcion' => $producto['descripcion'],
//                 'imagen_ruta' => $producto['imagen_ruta'],
//                 'cantidad' => $cantidad,
//             ];

//             $total += $producto['precio'] * $cantidad;
//         }
//     }

//     session()->set('productos_carrito', $productos);
//     session()->set('total_carrito', $total);

//     $data = [
//         'productos' => $productos,
//         'total' => $total,
//         // Otros datos que necesitas pasar a la vista
//     ];

//     return view('ComprarVista', $data);
// }
// public function procesarCompra()
// {
//     // Obtener el carrito de la sesión
//     $carrito = session()->get('carrito') ?? [];

//     // Verificar si el carrito está vacío
//     if (empty($carrito)) {
//         // Puedes redirigir o mostrar un mensaje de error
//         return redirect()->to(base_url(''));
//     }

//     // Obtener detalles de productos desde la base de datos
//     $bebidaModelo = new BebidaModelo();
//     $CarritoModelo = new CarritoModelo();

//     // Limpiar carrito después de procesar la compra
//     session()->remove('carrito');

//     $total = 0;

//     foreach ($carrito as $id_bebida => $cantidad) {
//         $producto = $bebidaModelo->find($id_bebida);

//         if ($producto) {
//             // Calcular el total
//             $total += $producto['precio'] * $cantidad;

//             // Insertar en la tabla carrito_compras
//             $CarritoModelo->insert([
//                 'id_bebida' => $id_bebida,
//                 'cantidad' => $cantidad,
//             ]);
//         }
//     }

//     // Datos para pasar a la vista
//     $data = [
//         'total' => $total,
//         // Otros datos que puedas necesitar
//     ];

//     // Cargar la vista de procesar compra
//     return view('procesarCompra', $data);
// }
// }

} 
    public function usuarioCuenta(){
        $user = session('user'); 
        if (!$user || $user ['id'] < 1) {
            return redirect()->to('/login');
        }
        else {
            $session = session(); // Asegúrate de cargar la sesión si aún no lo has hecho
            $user = $session->get('user'); // Suponiendo que 'user' es la clave en la que has almacenado los datos de usuario

            // Pasar los datos a la vista
            $data['user'] = $user;

            
            echo view('comunes/header');
            return view('cuentaUsuario', $data);
           
        }      // En tu controlador u otro lugar adecuado
            
           
        
    }
}