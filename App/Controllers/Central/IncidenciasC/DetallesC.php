<?php
include '../librerias.php';

$id_object = $_POST['id_object'];
$incidenciasM = new IncidenciasM();
$row = new row();
$catSelectC = new CatSelectC();

if ($id_object != null) {
    $response = $row->returnArray($incidenciasM->modificarIncidencia($id_object));
    $var = [
        'response' => $response,
    ];
    echo json_encode($var);

} else {
    $response = $incidenciasM->listarByNull();
    $catIncidencias = $catSelectC->selectByAllCatalogo($incidenciasM->listarCatIncidencias());
    $var = [
        'response' => $response,
        'catIncidencias' => $catIncidencias,
    ];
    echo json_encode($var);
}
