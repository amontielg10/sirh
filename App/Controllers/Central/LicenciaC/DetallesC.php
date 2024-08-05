<?php
include '../librerias.php';

$row = new Row();
$catDiasM = new CatDiasM();
$catSelectC = new CatSelectC();
$catLicenciaM = new CatLicenciaM();
$modelLicenciasM = new ModelLicenciasM();
$estatus = new CatEstatusIncidenciasM();


$id_object = $_POST['id_object'];


if ($id_object != null) {

    $entity = $row->returnArray($modelLicenciasM->listarByIdEdit($id_object));
    $licencia = $catSelectC->selectByEditCatalogo($catLicenciaM->listarByAll(),$row->returnArrayById($catLicenciaM->listarById($entity['id_cat_tipo_licencia'])));
    $dias = $catSelectC->selectByEditCatalogo($catDiasM->listarByAll(),$row->returnArrayById($catDiasM->listarById($entity['id_cat_tipo_dias'])));
    $estatus = $catSelectC->selectByEditCatalogo($estatus->listarByAll(),$row->returnArrayById($estatus->listarById($entity['id_cat_estatus_incidencias'])));

    $var = [
        'entity' => $entity,
        'licencia' => $licencia,
        'dias' => $dias,
        'estatus' => $estatus,
    ];
    echo json_encode($var);
} else {

    $entity = $modelLicenciasM->listarByNull();
    $licencia = $catSelectC->selectByAllCatalogo($catLicenciaM->listarByAll());
    $dias = $catSelectC->selectByAllCatalogo($catDiasM->listarByAll());
    $estatus = $catSelectC->selectByAllCatalogo($estatus->listarByAll());

    $var = [
        'entity' => $entity,
        'licencia' => $licencia,
        'dias' => $dias,
        'estatus' => $estatus,
    ];
    echo json_encode($var);
}
