<?php
include '../../../../conexion.php';
include '../../../Model/Hraes/EmpleadosM/EmpleadosM.php';

$model = new modelEmpleadosHraes();

$id_object = $_POST['id_object'];

if ($id_object != null) {

    $query = $model->listarByIdEdit($id_object);
    if (!$result = pg_query($connectionDBsPro, $query)) {
        exit(pg_pg_result_error($connectionDBsPro));
    }
    $response = array();
    if (pg_num_rows($result) > 0) {
        while ($row = pg_fetch_assoc($result)) {
            $response = $row;
        }
    }
    //echo json_encode($response);

    $var = [
        'response' => $response
    ];
    echo json_encode($var);
} else {
    $response = $model->listarByNull();
    echo json_encode($response);
}
