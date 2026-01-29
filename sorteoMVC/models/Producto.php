<?php 

namespace Model;

class Compra extends ActiveRecord {
    protected static $tabla = 'producto';
    protected static $columnaDB = ['productoId' ,'nombre', 'precio', 'fecha', 'descripcion'];

    public $productoId;
    public $nombre;
    public $precio;
    public $fecha;
    public $descripcion;

}
