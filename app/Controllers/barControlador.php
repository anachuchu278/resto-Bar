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
        $barModelo = new barModelo();
        $data['filtrar'] = $barModelo->findAll();

     
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

public function filtrarPorTipo()
{   
    $tipo = $this->request->getPost('tipo_id');
      // Print out the tipo_id

    $barModelo = new barModelo();
    $result = $barModelo->filtrarBebidasPorTipo($tipo);

  // Print out the result

    $data['filtrar'] = $result;
    echo view('barVista', $data);
}


    public function buscarProductoPorId($id)
{
    // Lógica para buscar un producto por su ID
    $productoModelo = new barModelo(); // Asegúrate de cargar el modelo adecuado
    $producto = $productoModelo->buscarProductoPorId($id);

    return $producto;
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
    }
public function comprar()
{
    $carrito = session()->get('carrito') ?? [];
    $CarritoModelo = new CarritoModelo();

    $bebidaModelo = new BebidaModelo();
    $productos = [];
    $total = 0;

    foreach ($carrito as $id_bebida => $cantidad) {
        $producto = $bebidaModelo->find($id_bebida);

        if ($producto) {
            $productos[$id_bebida] = [
                'id_bebida' => $id_bebida,
                'nombre' => $producto['nombre'],
                'tipo_id' => $producto['tipo_id'],
                'precio' => $producto['precio'],
                'descripcion' => $producto['descripcion'],
                'imagen_ruta' => $producto['imagen_ruta'],
                'cantidad' => $cantidad,
            ];

            $total += $producto['precio'] * $cantidad;
        }
    }

    session()->set('productos_carrito', $productos);
    session()->set('total_carrito', $total);

    $data = [
        'productos' => $productos,
        'total' => $total,
        // Otros datos que necesitas pasar a la vista
    ];

    return view('ComprarVista', $data);
}
public function procesarCompra()
{
    // Obtener el carrito de la sesión
    $carrito = session()->get('carrito') ?? [];


    // Verificar si el carrito está vacío
    if (empty($carrito)) {
        // Puedes redirigir o mostrar un mensaje de error
        return redirect()->to(base_url(''));
    }

    // Obtener detalles de productos desde la base de datos
    $bebidaModelo = new BebidaModelo();
    $CarritoModelo = new CarritoModelo();

    // Limpiar carrito después de procesar la compra
    session()->remove('carrito');

    $total = 0;

    foreach ($carrito as $id_bebida => $cantidad) {
        $producto = $bebidaModelo->find($id_bebida);

        if ($producto) {
            // Calcular el total
            $total += $producto['precio'] * $cantidad;

            // Insertar en la tabla carrito_compras
            $CarritoModelo->insert([
                'id_bebida' => $id_bebida,
                'cantidad' => $cantidad,
            ]);
        }
    }

    // Datos para pasar a la vista
    $data = [
        'total' => $total,
        // Otros datos que puedas necesitar
    ];

    // Cargar la vista de procesar compra
    return view('procesarCompra', $data);
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
           
        }  
        
    
    }   

}