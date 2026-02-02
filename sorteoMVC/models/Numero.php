<?php 

namespace Model;

class Numero extends ActiveRecord {
    protected static $tabla = 'numero';
    protected static $columnaDB = ['id', 'numero' ,'vendido'];

    public $id;
    public $numero;
    public $vendido;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->numero = $args['numero'] ?? '';
        $this->vendido = $args['vendido'] ?? 0;
    }

        public function estaVendido(): bool {
        return $this->vendido === 1;
    }
}

?>