<?php
include('../../validar_sesion.php');
include('../../conexion.php');

$id_user = $_POST['idUsuario'];
$tbl_name = 'users';

$res = pg_delete($connectionDBsPro, $tbl_name, array(
    'id_user' => $id_user
)
);
if ($res) {
    echo true;
} else {
    echo false;
}






/*
$res = pg_delete($connectionDBsPro, $tbl_name, array(
    'id_user' => $id_user
));

if ($res){
    echo 'acceso';
} else {
    echo 'error';
}*/
/*
if(isset($_POST['idUsuario'])){
$id_user = $_POST['idUsuario']; //Se obtienen el id de usuario
$tbl_name = 'users';    //Se crea el nombre de la tabla 

//Se ejecuta la consulta para eliminar datos
    $res = pg_delete($connectionDBsPro, $tbl_name, array(
        'id_user' => $id_user
    ));
    if ($res){
        echo "Sucees";
    } 

} else {
    echo "Error";
}
*/



