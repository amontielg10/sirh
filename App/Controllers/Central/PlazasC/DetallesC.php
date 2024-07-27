<?php

include '../librerias.php';
include '../../../Model/Central/Catalogos/CatPuestoM/CatPuestoM.php';

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
$catZonasPagoM = new CatZonasPagoM();
$catZonaPagoC = new CatZonaPagoC();
$catSelectC = new CatSelectC();
$modelCentroTrabajoHraes = new modelCentroTrabajoHraes();
$catUnidadAdM = new CatUnidadAdM();
$row = new Row();

$id_object = $_POST['id_object'];

if ($id_object != null){

    $entity = $row->returnArray($modelPlazasHraes -> listarByIdEdit($id_object));
    $niveles = $row->returnArrayById($catalogoPuestoM->nameOfPuesto($entity['id_cat_puesto_hraes']));
    $plazas = $catalogoPlazasC ->returnCatPLazasByIdObject($catalogoPlazasM ->listarByAll(), $row->returnArrayById($catalogoPlazasM ->obtenerElemetoById($entity['id_cat_tipo_plazas'])));
    $contratacion = $catalogoTipoContratcionHraesC ->returnCatContratacionByIdObject($catalogoTipoContratacionM ->listarByAll(),$row->returnArrayById($catalogoTipoContratacionM ->obtenerElemetoById($entity['id_cat_tipo_subtipo_contratacion_hraes'])));
    $unidadResp = $catalogoUnidadResponsableC ->returnCatUnidadByIdObject($cataloUnidadResposableM->listarByAll(), $row->returnArrayById($cataloUnidadResposableM->obtenerElemetoById($entity['id_cat_unidad_responsable'])));
    $tabulares = $catalogoTabularesC->returnSelectByIdObject($catalogoTabularesM->listarByAll(),$row->returnArrayById($catalogoTabularesM->obtenerElemetoById($entity['id_cat_zonas_tabuladores_hraes'])));
    $unidadAdmin = $catSelectC->selectByEditCatalogo($catUnidadAdM->lisOfCatUnidad(), $row->returnArrayById($catUnidadAdM->editOfCatUnidad($entity['id_cat_unidad'])));
    $unidadCoor = $catSelectC->selectByEditCatalogo($catUnidadAdM->listOfCatCoordinacion(), $row->returnArrayById($catUnidadAdM->editOfCatCoordinacion($entity['id_cat_coordinacion'])));
    $isValueAux = $row->returnArrayById($catalogoPuestoM->getEditCatAux($entity['id_cat_aux_puesto']));
    $nomEspecifico = $catSelectC->selectByEditCatalogo($catalogoPuestoM->listOfSpecificName($isValueAux[1]), $row->returnArrayById($catalogoPuestoM->editSpecificName($isValueAux[2])));
    $puestoCategoria = $catSelectC->selectByEditCatalogo($catalogoPuestoM->listOfCategoName($isValueAux[1],$isValueAux[2]), $row->returnArrayById($catalogoPuestoM->editCatName($isValueAux[3])));
    $puesto = $catSelectC->selectByEditCatalogo($catalogoPuestoM->listarByAllPuesto(),$row->returnArrayById($catalogoPuestoM->editByAllPuesto($isValueAux[1])));
    $zona = $row->returnArrayById($catalogoPuestoM->getEntity($id_object));

    $raw = [
        'niveles' => $niveles[0],
        'puesto' => $puesto,
        'plazas' => $plazas,
        'entity' => $entity,
        'contratacion' => $contratacion,
        'unidadResp' => $unidadResp,
        'tabulares' => $tabulares,
        'unidadAdmin' => $unidadAdmin,
        'unidadCoor' => $unidadCoor,
        'nomEspecifico' => $nomEspecifico,
        'puestoCategoria' => $puestoCategoria,
        'zona' => $zona[0],
    ];
    echo json_encode($raw);

} else { ///Agregar
    $id_tbl_centro_trabajo_hraes = $_POST['id_tbl_centro_trabajo_hraes'];
    $plazas = $catalogoPlazasC -> returnCatPlazas($catalogoPlazasM->listarByAll());
    $contratacion = $catalogoTipoContratcionHraesC -> returnCatContratacion($catalogoTipoContratacionM->listarByAll());
    $entity = $modelPlazasHraes -> listarByNull();
    $unidadResp = $catalogoUnidadResponsableC ->returnCatUnidad($cataloUnidadResposableM ->listarByAll());
    $puesto = $catSelectC->selectByAllCatalogo($catalogoPuestoM->listarByAllPuesto());
    $tabulares = $catalogoTabularesC->returnSelect($catalogoTabularesM->listarByAll());
    $niveles = $catalogoNivelesC->returnSelect($catalogoNivelesM->listarByAll());
    $unidadAdmin = $catSelectC->selectByAllCatalogo($catUnidadAdM->lisOfCatUnidad());
    $unidadCoor = $catSelectC->selectByAllCatalogo($catUnidadAdM->listOfCatCoordinacion());
    $nomEspecifico = $catSelectC->selecStaticByNull();
    $zona = $row->returnArrayById($modelCentroTrabajoHraes->getEntityZona($id_tbl_centro_trabajo_hraes));
    $raw = [
        'niveles' => 'NIVEL',
        'puesto' => $puesto,
        'plazas' => $plazas,
        'entity' => $entity,
        'contratacion' => $contratacion,
        'unidadResp' => $unidadResp,
        'tabulares' => $tabulares,
        'unidadAdmin' => $unidadAdmin,
        'unidadCoor' => $unidadCoor,
        'nomEspecifico' => $nomEspecifico,
        'puestoCategoria' => $nomEspecifico,
        'zona' => $zona[0],

    ];
    echo json_encode($raw);
}

