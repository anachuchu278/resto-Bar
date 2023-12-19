<?php
namespace App\Controllers;


use App\Models\CarritoModelo;
use App\Models\BarModelo;
use App\Models\BebidaModelo;
use CodeIgniter\Controller;


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
    $bebidaModelo = new BebidaModelo;
    $id_bebida = $this->request->getPost('id_bebida');
    $cantidad = $this->request->getPost('cantidad');

    // Obtener el precio unitario y nombre de la bebida desde el modelo BebidaModelo
    $precio = $bebidaModelo->obtenerPrecioUnitario($id_bebida);
    $nombre = $bebidaModelo->obtenerNombre($id_bebida);

    // Obtener productos del carrito actual
    $productos = session()->get('carrito') ?? [];

    // Verificar si el producto ya está en el carrito
    if (isset($productos[$id_bebida])) {
        // Actualizar la cantidad y el total del producto existente
        $productos[$id_bebida]['cantidad'] += $cantidad;
        $productos[$id_bebida]['total'] += ($precio * $cantidad);
    } else {
        // Agregar el producto al carrito
        $productos[$id_bebida] = [
            'id_bebida' => $id_bebida,
            'cantidad' => $cantidad,
            'precio_unitario' => $precio,
            'total' => $precio * $cantidad,
            'nombre' => $nombre,
        ];
    }

    // Calcular el total general del carrito
    $totalCarrito = array_sum(array_column($productos, 'total'));

    // Guardar los productos y el total en la sesión
    session()->set('carrito', $productos);

    // Redirigir a la vista de comprarVista con los parámetros necesarios
    echo view('comunes/header');
    return view('comprarVista', [
        'productos' => $productos,
        'total' => $totalCarrito,
        'nombre' => $nombre,
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
      $user = session('user');
      if (!$user || $user['id'] < 1) {
         return redirect()->to('/login');
      } else {
         $session = session(); // Asegúrate de cargar la sesión si aún no lo has hecho

         $user = $session->get('user'); // Suponiendo que 'user' es la clave en la que has almacenado los datos de usuario

         // Pasar los datos a la vista
         $data['user'] = $user;

         echo view('comunes/header');
         return view('ver-carrito', $data);
      }

   }
}