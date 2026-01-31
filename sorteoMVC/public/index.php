<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\APIController;
use Controllers\ProductoController;


$router = new Router();

$router->get('/', [ProductoController::class, 'index']);

//API
$router->get('/api/numero', [APIController::class, 'index']);


// $router->get('/layout', [ProductoController::class, 'index']);

//Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();



