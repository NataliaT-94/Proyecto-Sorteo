<?php

namespace Controllers;

use Model\Compra;
use Model\Producto;
use Model\Sorteo;

class APIController{
    public static function index(){
        $compra = Compra::all();
        echo json_encode($compra);
    }

     
}