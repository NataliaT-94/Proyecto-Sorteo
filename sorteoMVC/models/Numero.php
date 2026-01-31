<?php 

namespace Model;

class Numero extends ActiveRecord {
    protected static $tabla = 'compraNumero';
    protected static $columnaDB = ['id', 'clienteId' ,'numeroId'];

    public $compraId;
    public $clienteId;
    public $numeroId;



}

?>