<?php
namespace Model;

class Compra extends ActiveRecord{
    //Base de Datos
    protected static $tabla = 'compra';//la informacion la va a sacer de la tabla de usuarios
    protected static $columnasDB = ['compraId', 'productoId', 'numero', 'precioTotal', 'usuarioId'];
    
    public $compraId;
    public $productoId;
    public $numero;
    public $precioTotal;
    public $usuarioId;

    public function __construct($args = []){
        $this->compraId = $args['compraId'] ?? null;
        $this->productoId = $args['productoId'] ?? '';
        $this->numero = $args['numero'] ?? '';
        $this->precioTotal = $args['precioTotal'] ?? '';
        $this->usuarioId = $args['usuarioId'] ?? '';
        
    }
}



?>