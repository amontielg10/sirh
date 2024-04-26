<?php
include '../../../../conexion.php';

include '../../../Model/Hraes/PlazasM/PlazasM.php';
include '../../../Model/Catalogos/CatPlazasM/CatPlazasM.php';
include '../../../Controllers/Catalogos/CatPlazasC/CatPlazasC.php';
include '../../../Model/Catalogos/CatUnidadResponsableM/CatUnidadResponsableM.php';
include '../../../Controllers/Catalogos/CatUnidadResponsableC/CatUnidadResponsableC.php';
include '../../../Model/Hraes/Catalogos/CatTipoContratacionM/CatTipoContratacionM.php';
include '../../../Controllers/Hrae/Catalogos/CatTipoContratacionC/CatTipoContratacionC.php';
include '../../../Model/Hraes/Catalogos/CatPuestoM/CatPuestoM.php';
include '../../../Controllers/Hrae/Catalogos/CatPuestoC/CatPuestosC.php';
include '../../../Model/Hraes/Catalogos/CatTabularesM/CatTabularesM.php';
include '../../../Controllers/Hrae/Catalogos/CatTabularesC/CatTabularesC.php';
include '../../../Model/Hraes/Catalogos/CatNivelesM/CatNivelesM.php';
include '../../../Controllers/Hrae/Catalogos/CatNivelesC/CatNivelesC.php';

$catalogoPlazasM = new catalogoPlazasM();
$catalogoPlazasC = new catalogoPlazasC();
$modelPlazasHraes = new modelPlazasHraes();
$catalogoTipoContratcionHraesC = new catalogoTipoContratcionHraesC();
$catalogoTipoContratacionM = new catalogoTipoContratacionM();
$catalogoUnidadResponsableC = new catalogoUnidadResponsableC();
$cataloUnidadResposableM = new cataloUnidadResposableM();
$catalogoPuestosC = new catalogoPuestosC();
$catalogoPuestoM = new catalogoPuestoM();
$catalogoTabularesC = new catalogoTabularesC();
$catalogoTabularesM = new catalogoTabularesM();
$catalogoNivelesC = new catalogoNivelesC();
$catalogoNivelesM = new catalogoNivelesM();

$id_object = $_POST['id_object'];

if ($id_object != null){

} else {
    $plazas = $catalogoPlazasC -> returnCatPlazas($catalogoPlazasM->listarByAll());
    $contratacion = $catalogoTipoContratcionHraesC -> returnCatContratacion($catalogoTipoContratacionM->listarByAll());
    $entity = $modelPlazasHraes -> listarByNull();
    $unidadResp = $catalogoUnidadResponsableC ->returnCatUnidad($cataloUnidadResposableM ->listarByAll());
    $puesto = $catalogoPuestosC ->returnCatPuestos($catalogoPuestoM->listarByAll());
    $tabulares = $catalogoTabularesC->returnSelect($catalogoTabularesM->listarByAll());
    $niveles = $catalogoNivelesC->returnSelect($catalogoNivelesM->listarByAll());
    $raw = [
        'niveles' => $niveles,
        'puesto' => $puesto,
        'plazas' => $plazas,
        'entity' => $entity,
        'contratacion' => $contratacion,
        'unidadResp' => $unidadResp,
        'tabulares' => $tabulares,
    ];
    echo json_encode($raw);
}

/*
include '../../../Model/Hraes/CentroTrabajoM/CentroTrabajoM.php';
include '../../../Model/Catalogos/CatEntidadM/CatEntidadM.php';
include '../../../Model/Catalogos/CatRegionM/CatRegionM.php';
include '../../../Model/Catalogos/CatEstatusM/CatEstatusM.php';
include '../../../Controllers/Catalogos/CatEntidadC/CatEntidadC.php';
include '../../../Controllers/Catalogos/CatRegionC/CatRegionC.php';
include '../../../Controllers/Catalogos/CatEstatusC/CatEstatusC.php';

$model = new modelCentroTrabajoHraes();
$catEntidad = new catalogoEntidad();
$catalogoEntidad = new catalogoEntidadC();
$catalogoRegionC = new catalogoRegionC();
$catalogoRegion = new catalogoRegion();
$catalogoEstatus = new catalogoEstatus();
$catalogoEstatusC = new catalogoEstatusC();

$id_object = $_POST['id_object'];

if ($id_object != null) {
    $response = returnArray($model->listarByIdEdit($id_object));
    $entidad = $catalogoEntidad->returnCatEntidadByIdObject($catEntidad->listarByAll(),returnArrayById($catEntidad->obtenerElemetoById($response['id_cat_entidad'])));
    $region = $catalogoRegionC->returnCatRegionByIdObject($catalogoRegion->listarByAll(),returnArrayById($catalogoRegion->obtenerElemetoById($response['id_cat_region'])));
    $estatus = $catalogoEstatusC->returnCatEstatusByIdObject($catalogoEstatus->listarByAll(),returnArrayById($catalogoEstatus->obtenerElemetoById($response['id_estatus_centro'])));
    $var = [
        'entidad' => $entidad,
        'response' => $response,
        'region' => $region,
        'estatus' => $estatus,
    ];
    echo json_encode($var);

} else {
    $entidad = $catalogoEntidad->returnCatEntidad($catEntidad->listarByAll());
    $region = $catalogoRegionC->returnCatRegion($catalogoRegion->listarByAll());
    $estatus = $catalogoEstatusC->returnCatEstatus($catalogoEstatus->listarByAll());
    $response = $model->listarByNull();
    $var = [
        'entidad' => $entidad,
        'response' => $response,
        'region' => $region,
        'estatus' => $estatus,
    ];
    echo json_encode($var);
}

function returnArray($result)
{
    if (pg_num_rows($result) > 0) {
        while ($row = pg_fetch_assoc($result)) {
            $response = $row;
        }
    }
    return $response;
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

*/