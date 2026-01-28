<?php
namespace Model;

class Compra extends ActiveRecord{
    //Base de Datos
    protected static $tabla = 'compra';
    protected static $columnasDB = ['compraId', 'productoId', 'usuarioId', 'numero', 'precioTotal'];
    
    public $compraId;
    public $productoId;
    public $usuarioId;
    public $numero;
    public $precioTotal;

    public function __construct($args = []){
        $this->compraId = $args['compraId'] ?? null;
        $this->productoId = $args['productoId'] ?? '';
        $this->usuarioId = $args['usuarioId'] ?? '';
        $this->numero = $args['numero'] ?? '';
        $this->precioTotal = $args['precioTotal'] ?? '';
        
    }
}



?>