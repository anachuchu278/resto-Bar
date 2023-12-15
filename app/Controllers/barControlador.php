<?php
namespace App\Controllers;

use App\Models\TipoBebidaModelo;

use App\Models\BarModelo;
use App\Models\BebidaModelo;
use App\Models\CarritoModelo;
use CodeIgniter\Controller;
use App\Models\loginModelo;
use App\Models\tipoModelo;

class BarControlador extends Controller
{
   private $barModelo;
   private $CarritoModelo;

   public function __construct()
   {
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
      $bebidaModelo = new BarModelo(); // Cambiado a BarModelo
      $data['bebidaEncontrada'] = $bebidaModelo->where('tipo_id',

         $tipo_id)->findAll();

      echo view('barVista', $data);
   }
   public function buscarBebida()
   {
      $busqueda = $this->request->getPost('busqueda');
      if ($busqueda !== "") {
         $data['bebidaEncontrada'] =

            $this->barModelo->buscarBebidaPorNombre($busqueda);
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

      // Verificar si se ha enviado el formulario
      if ($this->request->getPost()) {
         // Obtener el tipo seleccionado
         $tipo_id = $this->request->getPost('tipo_id');
         // Llamar al modelo para obtener las bebidas filtradas por tipo
         $tipoModelo = new tipoModelo(); // Asegúrate de tener un modelo para las bebidas (puedes cambiar 'barModelo' al nombre correcto)
         $data['bebidas'] = $tipoModelo->filtrarPorTipo($tipo_id);

      } else {
         // Si no se ha enviado el formulario, simplemente obtén todas las bebidas

         $tipoModelo = new tipoModelo();
         $data['bebidas'] = $tipoModelo->findAll();
      }
      // Obtener los tipos para el menú desplegable
      $tipoModelo = new tipoModelo();
      $data['filtrar'] = $tipoModelo->tipo();
      $tipo = $this->request->getPost('tipo_id');
      $barModelo = new barModelo();
      $result = $barModelo->filtrarBebidasPorTipo($tipo);
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

   public function agregarAlCarrito()
   {
      $id_bebida = $this->request->getPost('id_bebida');
      $cantidad = $this->request->getPost('cantidad');
      // Obtener el precio unitario de la bebida desde el modelo BebidaModelo
      $bebidaModelo = new BebidaModelo();
      $precio = $bebidaModelo->obtenerPrecioUnitario($id_bebida);
      // Calcular el precio total
      $total = $precio * $cantidad;

      // Agregar el producto al carrito (guardar en la sesión, base de datos, etc.)
      $carrito = session()->get('carrito') ?? [];
      $id_bebida = intval($id_bebida);
      if (isset($carrito[$id_bebida])) {
         $carrito[$id_bebida]['cantidad'] += $cantidad;
         $carrito[$id_bebida]['total'] += $total;
      } else {
         $carrito[$id_bebida] = [
            'id_bebida' => $id_bebida,
            'nombre' => $bebidaModelo->obtenerNombre($id_bebida), // Ajusta según tu modelo

            'cantidad' => $cantidad,
            'precio_unitario' => $precio,
            'total' => $total,
         ];
      }
      session()->set('carrito', $carrito);
      // Calcular el total del carrito
      $totalCarrito = array_sum(array_column($carrito, 'total'));
      // Redirigir a la vista de comprarVista con los parámetros necesarios
      echo view('comunes/header');
      return view('comprarVista', [
         'productos' => $carrito,
         'total' => $totalCarrito,
      ]);
   }
   public function eliminarDelCarrito($id_bebida)
   {
      // Aquí se procesa la eliminación de la bebida con el ID $id
      $bebidaModelo = new BebidaModelo();
      $bebidaModelo->delete($id_bebida);
      return redirect()->to(base_url('adminBebidas'));
   }
   public function comprar()
   {

      $carrito = session()->get('carrito') ?? [];
      $CarritoModelo = new CarritoModelo();
      $cantidad = $_GET['cantidad'];
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
      // Cargar la vista de procesarCompra
      return view('procesarCompra', $data);

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

   public function usuarioCuenta()
   {
      $user = session('user');
      if (!$user || $user['id_usuario'] < 1) {
         return redirect()->to('/login');
      } else {
         $session = session(); // Asegúrate de cargar la sesión si aún no lo has hecho

         $user = $session->get('user'); // Suponiendo que 'user' es la clave en la que has almacenado los datos de usuario

         // Pasar los datos a la vista
         $data['user'] = $user;

         echo view('comunes/header');
         return view('cuentaUsuario', $data);
      }

   }

   public function verCarrito()
{
   $bebidaModelo = new BebidaModelo();
    $user = session('user');

    if (!$user || $user['id_usuario'] < 1) {
        return redirect()->to('/login');
    } else {
        $session = session();
        $user = $session->get('user'); 
      $id_bebida = $this->request->getPost('id_bebida');
        // Obtener productos del carrito (ajusta esto según tu implementación)
        $productos = $bebidaModelo->obtenerProductosDelCarrito($id_bebida); // Ajusta según tu lógica
        $total = $this->request->getPost('productos');
       

        // Pasar los datos a la vista
        $data['user'] = $user;
        $data['productos'] = $productos;
        $data['total'] = $total;

        echo view('comunes/header');
        return view('comprarVista', $data);
    }
}
}