<?php 

namespace Model;

class Compra extends ActiveRecord {
    protected static $tabla = 'producto';
    protected static $columnaDB = ['id' ,'nombre', 'descripcion', 'fecha', 'precio'];

    public $id;
    public $nombre;
    public $descripcion;
    public $fecha;
    public $precio;

}
