<?php

namespace Controllers;

use Model\Producto;
use Model\CompraNumero;
use Model\Usuario;
use MVC\Router;

class DashboardController {
    public static function index(Router $router){
    //Obtener ultimos registros
        $registros = CompraNumero::get(5);
            foreach($registros as $registro){
                $registro->usuario = Usuario::find($registro->usuario_id);
        }


        $router->render('admin/dashboard/index',[
            'titulo' => 'Panel de Administracion',
            'registros' => $registros
        ]);
    }
        
}

?>