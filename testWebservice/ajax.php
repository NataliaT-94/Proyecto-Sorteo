<?php 


if(isset($_POST['AJAX'])){


    if($_POST['AJAX'] == 'Guardar datos'){
        $sql = "
        SELECT * FROM TABLA WHERE ID = $_POST[PRODUCTOID]
        ";
        
        // $RESULTADO = mysqli_query($conm, $sql);

        // $datos['resultado'] = $RESULTADO;
    }
    
    
    
    
    if($_POST['AJAX'] == 'Eliminar datos'){
        $sql = "
        DELETE * FROM TABLA WHERE ID = $_POST[PRODUCTOID]
        ";
    }




    $datos['post'] = $_POST;
    die(json_encode($datos));
}