<?php

namespace Controllers;


use Model\Numero;
use Model\Producto;

class APIController{
    public static function index(){
        $numero = Numero::all();
        echo json_encode($numero);
    }
}