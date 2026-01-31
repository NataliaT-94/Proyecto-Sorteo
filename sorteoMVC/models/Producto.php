<?php 

namespace Model;

class Producto extends ActiveRecord {
    protected static $tabla = 'producto';
    protected static $columnaDB = ['id' ,'nombre', 'descripcion', 'fecha', 'precio'];

    public $id;
    public $nombre;
    public $descripcion;
    public $fecha;
    public $precio;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->fecha = $args['fecha'] ?? '';
        $this->precio = $args['precio'] ?? '';

    }


}
