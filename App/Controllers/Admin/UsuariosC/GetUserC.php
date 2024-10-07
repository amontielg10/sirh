<?php

include '../librerias.php';

/*
|--------------------------------------------------------------------------
| Codigo para obtener el nombre de usuario a travez de id_user 
|--------------------------------------------------------------------------
| Se agregan los objetos a ocupar, en este caso se instancia el objeto de usuariosM, con la 
| finalidad de que al ingresar el id, a travez de una consulta SQL se obtenga el nombre del empleado
| que agrego o modifico en la tabla
|
*/
$usuariosM = new UsuariosM();
$row = new Row();

$userName = $row->returnArrayById($usuariosM->getNemOfUser($_POST['id_user']));

echo $userName[0];
