<?php

namespace Controllers;

use MVC\Router;
use Model\Numero;
use Model\Producto;

class ProductoController{
    public static function index(Router $router){
        $producto =Producto::find(1);
        // echo json_encode($producto, JSON_UNESCAPED_SLASHES);
        
        $numeros = Numero::all();


        $router->render('templates/header',[
            'producto' => $producto,
            'numeros' => $numeros
        ]);
    }

}