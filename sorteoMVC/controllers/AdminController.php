<?php
namespace Controllers;

use Model\AdminCita;
use MVC\Router;

class AdminController{

    public static function index(Router $router){
        //session_start();

        isAdmin();

        $fecha = $_GET['fecha'] ?? date('Y-m-d');
        $fechas = explode('-', $fecha);//separa el string por los -

        if(!checkdate($fechas[1], $fechas[2], $fechas[0])){
            header('Location: /404');
        }

        //Consultar la Base de Datos
        $consulta = " SELECT compra.compraId, compra.numero, usuario.nombre as cliente, ";
        $consulta .= " usuario.telefono, producto.nombre as producto, producto.precio ";
        $consulta .= " FROM citas ";
        $consulta .= " LEFT OUTER JOIN usuarios ";
        $consulta .= " ON citas.usuarioId=usuario.usuarioId ";
        $consulta .= " LEFT OUTER JOIN sorteo ";
        $consulta .= " ON sorteo.compraId=compra.compraId ";
        $consulta .= " LEFT OUTER JOIN producto ";
        $consulta .= " ON producto.productoId=sorteos.productoId ";
        $consulta .= " WHERE fecha = '{$fecha}' ";

        $compra = AdminCita::SQL($consulta);

        $router->render('admin/index', [
            'nombre' => $_SESSION['nombre'],
            'compra' => $compra,
            'fecha' => $fecha
        ]);

    }


}


?>