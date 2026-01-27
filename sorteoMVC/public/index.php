<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\AuthController;



$router = new Router();


// Login
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'login']);
$router->post('/logout', [AuthController::class, 'logout']);

//Recuperar Password
$router->get('/olvide', [AuthController::class, 'olvide']);
$router->post('/olvide', [AuthController::class, 'olvide']);
$router->get('/recuperar', [AuthController::class, 'recuperar']);
$router->post('/recuperar', [AuthController::class, 'recuperar']);

//Crear Cuenta
$router->get('/crear-cuenta', [AuthController::class, 'crear']);
$router->post('/crear-cuenta', [AuthController::class, 'crear']);

//Confirmar cuenta
$router->get('/confirmar-cuenta', [AuthController::class, 'confirmar']);
$router->get('/mensaje', [AuthController::class, 'mensaje']);