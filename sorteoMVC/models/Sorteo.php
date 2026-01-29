<?php 
namespace Model;

class Compra extends ActiveRecord {
    protected static $tabla = 'sorteo';
    protected static $columnaDB = ['sorteoId', 'productoId' ,'compraId'];

    public $sorteoId;
    public $productoId;
    public $compraId;

}


?>