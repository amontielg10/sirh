<?php

include '../../../conexion.php';

$condicion = [
    'id_usuarios_pk' => $_POST['id_usuario_pk']
];

$datos = [
    'nombre' => $_POST['nombre'],
    'edad' => $_POST['edad'],
    'fecha_nacimiento' => $_POST['fecha_nacimiento'],
];

if($_POST['id_usuario_pk'] != null){ //Modificar
    $pg_update = pg_update($connectionDBsPro, 'usuarios', $datos, $condicion);
    if($pg_update){
        echo 'edit';
    } else {
        echo 'error';
    }
} else { //Agregar
    $pg_add = pg_insert($connectionDBsPro, 'usuarios', $datos);
    if($pg_add){
        echo 'add';
    } else {
        echo 'error';
    }
}


