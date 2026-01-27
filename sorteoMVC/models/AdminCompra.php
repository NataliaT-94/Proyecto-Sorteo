<?php
namespace Model;

class AdminCita extends ActiveRecord{
    //Base de Datos
    protected static $tabla = 'sorteo';//la informacion la va a sacer de la tabla de sorteo
    protected static $columnasDB = ['sorteoId', 'cliente', 'telefono', 'producto', 'precioTotal' ];
    
    public $sorteoId;
    public $cliente;
    public $telefono;
    public $producto;
    public $precioTotal;

    public function __construct($args = []){
        $this->sorteoId = $args['sorteoId'] ?? null;
        $this->cliente = $args['cliente'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->producto = $args['producto'] ?? '';
        $this->precioTotal = $args['precioTotal'] ?? '';
        
    }
}


?>