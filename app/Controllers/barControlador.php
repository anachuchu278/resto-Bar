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

 
   public function buscarBebida()
   {
      $busqueda = $this->request->getPost('busqueda');
      if ($busqueda !== "") {
         $data['bebidaEncontrada'] =

            $this->barModelo->buscarBebidaPorNombre($busqueda);
      } else {
         $data['bebidaEncontrada'] = null;
      }
     
      $bebidaModelo = new BebidaModelo();
      $data['bebidas'] = $bebidaModelo->findAll();
      return view('barVista', $data);
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

   
    $precio = $bebidaModelo->obtenerPrecioUnitario($id_bebida);
    $nombre = $bebidaModelo->obtenerNombre($id_bebida);

    
    $productos = session()->get('carrito') ?? [];

  
    if (isset($productos[$id_bebida])) {
        
        $productos[$id_bebida]['cantidad'] += $cantidad;
        $productos[$id_bebida]['total'] += ($precio * $cantidad);
    } else {
        
        $productos[$id_bebida] = [
            'id_bebida' => $id_bebida,
            'cantidad' => $cantidad,
            'precio_unitario' => $precio,
            'total' => $precio * $cantidad,
            'nombre' => $nombre,
        ];
    }

    
    $totalCarrito = array_sum(array_column($productos, 'total'));

   
    session()->set('carrito', $productos);

   
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
     
      if (empty($carrito)) {
         
         return redirect()->to(base_url(''));
      }
     
      $bebidaModelo = new BebidaModelo();
      $CarritoModelo = new CarritoModelo();
     
      session()->remove('carrito');
      $total = 0;
      foreach ($carrito as $id_bebida => $cantidad) {
         $producto = $bebidaModelo->find($id_bebida);
         if ($producto) {
            
            $total += $producto['precio'] * $cantidad;
           
            $CarritoModelo->insert([
               'id_bebida' => $id_bebida,
               'cantidad' => $cantidad,
            ]);
         }
      }
     
      $data = [
         'total' => $total,
        
      ];
     
      return view('procesarCompra', $data);

   }
   public function procesarCompra()
   {
     
      $carrito = session()->get('carrito') ?? [];

      
      if (empty($carrito)) {
        
         return redirect()->to(base_url(''));
      }
     
      $bebidaModelo = new BebidaModelo();
      $CarritoModelo = new CarritoModelo();
    
      session()->remove('carrito');
      $total = 0;
      foreach ($carrito as $id_bebida => $cantidad) {
         $producto = $bebidaModelo->find($id_bebida);
         if ($producto) {
          
            $total += $producto['precio'] * $cantidad;
          
            $CarritoModelo->insert([
               'id_bebida' => $id_bebida,
               'cantidad' => $cantidad,
            ]);
         }
      }
     
      $data = [
         'total' => $total,
         
      ];

     
      return view('procesarCompra', $data);
   }

   public function usuarioCuenta()
   {
      $user = session('user');
      if (!$user || $user['id_usuario'] < 1) {
         return redirect()->to('/login');
      } else {
         $session = session(); 

         $user = $session->get('user');  

        
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
         $session = session(); 

         $user = $session->get('user'); 

       
         $data['user'] = $user;

         echo view('comunes/header');
         return view('ver-carrito', $data);
      }

   }
}