<?php

namespace Controllers;

use MVC\Router;
use Model\Producto;

class ProductoController{
    public static function index(Router $router){
        $producto = Producto::find(1);
    }
}