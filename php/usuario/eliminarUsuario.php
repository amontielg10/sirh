<?php
include('../../validar_sesion.php');
include('../../conexion.php');

$id_user = $_GET['id_user']; //Se obtienen el id de usuario
$tbl_name = 'users';    //Se crea el nombre de la tabla 

//Se ejecuta la consulta para eliminar datos
    $res = pg_delete($connectionDBsPro, $tbl_name, array(
        'id_user' => $id_user
    ));
    if ($res){
        $me = true;
        header("Location: ../../usuario.php?me=$me"); //Regreso a la tabla
    } else {
        header("Location: error.php"); //Muestra Error
    }






