<?php 

namespace Model;

class Registros extends ActiveRecord {
    protected static $tabla = 'registros';
    protected static $columnasDB = ['id', 'usuarioId' ,'numeroId', 'productoId'];

    public $id;
    public $usuarioId;
    public $numeroId;
    public $productoId;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->usuarioId = $args['usuarioId'] ?? null;
        $this->numeroId = $args['numeroId'] ?? null;
        $this->productoId = $args['productoId'] ?? null;
    }

    public function atributos() {
        return [
            'usuarioId' => $this->usuarioId,
            'numeroId' => $this->numeroId,
            'productoId' => $this->productoId
        ];
    }


}

?>
