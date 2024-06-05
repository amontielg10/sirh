<?php

include '../librerias.php';

$modelEmpleadosHraes = new modelEmpleadosHraes();
$row = new Row();

$empleados = $row->returnArrayById($modelEmpleadosHraes->empleadosCountAll());

$var = [
    'empleados' => $empleados[0],
];
echo json_encode($var);
