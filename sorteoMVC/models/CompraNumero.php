<?php 

namespace Model;

class CompraNumero extends ActiveRecord {
    protected static $tabla = 'compraNumero';
    protected static $columnaDB = ['id', 'clienteId' ,'numeroId'];

    public $id;
    public $clienteId;
    public $numeroId;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->clienteId = $args['clienteId'] ?? null;
        $this->numeroId = $args['numeroId'] ?? null;
    }


}

?>
