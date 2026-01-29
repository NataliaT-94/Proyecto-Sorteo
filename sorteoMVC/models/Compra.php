<?php 

namespace Model;

class Compra extends ActiveRecord {
    protected static $tabla = 'compra';
    protected static $columnaDB = ['compraId', 'productoId' ,'numero', 'compraConfirmada'];

    public $compraId;
    public $productoId;
    public $numero;
    public $compraConfirmada;


}

?>
