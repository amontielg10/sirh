<?php 
include '../librerias.php';

$modelUsuariosM = new ModelUsuariosM();

$condicion = [
    'id_user' => $_POST['id_object']
];

if (isset($_POST['id_object'])){
    if ($modelUsuariosM -> eliminarByArray($connectionDBsPro, $condicion)){
        echo 'delete';
    }
} 
