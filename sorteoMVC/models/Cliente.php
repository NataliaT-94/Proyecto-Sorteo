<?php 
namespace Model;

class Cliente extends ActiveRecord {
    protected static $tabla = 'cliente';
    protected static $columnasDB = ['id', 'nombre' ,'telefono', 'precioTotal'];

    public $id;
    public $nombre;
    public $telefono;
    public $precioTotal;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->precioTotal = $args['precioTotal'] ?? '';

    }

    public function atributos() {
        return [
            'nombre' => $this->nombre,
            'telefono' => $this->telefono,
            'precioTotal' => $this->precioTotal
        ];
    }

}


?>