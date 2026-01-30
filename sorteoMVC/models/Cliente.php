<?php 
namespace Model;

class Cliente extends ActiveRecord {
    protected static $tabla = 'cliente';
    protected static $columnaDB = ['id', 'nombre' ,'telefono', 'precioTotal'];

    public $id;
    public $nombre;
    public $telefono;
    public $precioTotal;

}


?>