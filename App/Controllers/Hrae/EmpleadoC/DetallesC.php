<?php
include '../../../../conexion.php';
include '../../../Model/Hraes/EmpleadosM/EmpleadosM.php';
include '../../../Model/Hraes/CamposPersM/CamposPersM.php';

$model = new modelEmpleadosHraes();

$id_object = $_POST['id_object'];

if ($id_object != null) {
    $response = returnArray($model -> listarByIdEdit($id_object));
    $var = [
        'response' => $response,
    ];
    echo json_encode($var);

} else {
    $response = $model->listarByNull();
    echo json_encode($response);
}

function returnArray($result){
    if (pg_num_rows($result) > 0) {
        while ($row = pg_fetch_assoc($result)) {
            $response = $row;
        }
    }
    return $response;
}
