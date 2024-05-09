<?php
include '../librerias.php';

$id_object = $_POST['id_object'];
$modelMovimientosM = new ModelMovimientosM();
$catMovimientoM = new CatMovimientoM();
$catSelectC = new CatSelectC();
$row = new row();

if ($id_object != null) {
    $response = $row-> returnArray($modelTelefonoM->listarEditById($id_objectTelefono));
    $estatus = $catalogoEstatusC->returnCatEstatusByIdObject($catalogoEstatus->listarByAll(), $row->returnArrayById($catalogoEstatus->obtenerElemetoById($response['id_cat_estatus'])));
    $var = [
        'estatus' => $estatus,
        'response' => $response,
    ];
    echo json_encode($var);

} else {
    $response = $modelMovimientosM->listarByNull();
    $general = $catSelectC->selectByAllById($catMovimientoM->listarByAllGeneral(),2,0);
    $especifico = $catSelectC->selecStaticByNull();
    $var = [
        'response' => $response,
        'general' => $general,
        'especifico' => $especifico,
    ];
    echo json_encode($var);
}
