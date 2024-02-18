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



