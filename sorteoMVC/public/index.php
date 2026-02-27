<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\DashboardController;
use Controllers\NumeroController;
use Controllers\ProductoController;
use MVC\Router;


$router = new Router();

$router->get('/', [ProductoController::class, 'index']);

//API

$router->get('/api/numero', [NumeroController::class, 'index']);
$router->post('/api/comprar', [NumeroController::class, 'comprar']);

// Area de Administracion
$router->get('/admin/dashboard', [DashboardController::class, 'index']);

// $router->get('/layout', [ProductoController::class, 'index']);

//Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();



