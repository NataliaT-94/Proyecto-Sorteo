<?php 

namespace Model;

class CompraNumero extends ActiveRecord {
    protected static $tabla = 'compraNumero';
    protected static $columnaDB = ['id', 'clienteId' ,'numeroId'];

    public $id;
    public $clienteId;
    public $numeroId;



}

?>
