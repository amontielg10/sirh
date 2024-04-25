<?php
include '../../../../conexion.php';
include '../../../Model/Hraes/PlazasM/PlazasM.php';

$model = new modelPlazasHraes();

$id_object = $_POST['id_object'];

if ($id_object != null) {
    $response = returnArrayById($model->detallesPlazas($id_object));
    $var = [
        'response' => $response,
    ];
    echo json_encode($var);

} 

function returnArrayById($result)
{
    if (pg_num_rows($result) > 0) {
        while ($row = pg_fetch_row($result)) {
            $response = $row;
        }
    }
    return $response;
}

