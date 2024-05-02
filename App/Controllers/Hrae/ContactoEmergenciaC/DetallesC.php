<?php
include '../librerias.php';

$id_objectEmergencia = $_POST['id_object'];
$modelEmergenciaM = new ModelEmergenciaM();
$catalogoEstatusC = new catalogoEstatusC();
$catalogoEstatus = new catalogoEstatus();
$row = new row();

if ($id_objectEmergencia != null) {
    $response = $row->returnArray($modelEmergenciaM->listarEditById($id_objectEmergencia));
    $estatus = $catalogoEstatusC->returnCatEstatusByIdObject($catalogoEstatus->listarByAll(),$row->returnArrayById($catalogoEstatus->obtenerElemetoById($response['id_cat_estatus'])));
    $var = [
        'estatus' => $estatus,
        'response' => $response,
    ];
    echo json_encode($var);

} else {
    $response = $modelEmergenciaM->listarByNull();
    $estatus = $catalogoEstatusC->returnCatEstatus($catalogoEstatus->listarByAll());
    $var = [
        'estatus' => $estatus,
        'response' => $response,
    ];
    echo json_encode($var);
}
