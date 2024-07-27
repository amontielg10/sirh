<?php
include '../../../Model/Central/Catalogos/CatPuestoM/CatPuestoM.php';
include '../librerias.php';

$row = new Row();
$catalogoPuestoM= new catalogoPuestoM();
$model = new modelPlazasHraes();
$bitacoraM = new BitacoraM();
$tablaPlazas = 'central.tbl_control_plazas_hraes';

$id_cat_puesto_hraes = $_POST['id_cat_puesto_hraes'];
$id_cat_aux_puesto = $_POST['id_cat_aux_puesto'];
$id_cat_categoria_puesto = $_POST['id_cat_categoria_puesto'];

$isValue = $row ->returnArrayById($catalogoPuestoM->getIdOfTableAux($id_cat_puesto_hraes,$id_cat_aux_puesto,$id_cat_categoria_puesto));

$condicion = [
    'id_tbl_control_plazas_hraes' => $_POST['id_object']
];

$datos = [
    'id_cat_tipo_plazas' => $_POST['id_cat_plazas'],
    'id_cat_tipo_subtipo_contratacion_hraes' => $_POST['id_cat_tipo_contratacion_hraes'],
    'id_cat_unidad_responsable' => $_POST['id_cat_unidad_responsable'],
    'id_cat_puesto_hraes' => $_POST['id_cat_puesto_hraes'],
    'id_cat_zonas_tabuladores_hraes' => $_POST['id_cat_zonas_tabuladores_hraes'],
    'id_cat_aux_puesto' => $isValue[0],
    'num_plaza' => $_POST['num_plaza'],
    'fecha_ingreso_inst' => $_POST['fecha_ingreso_inst'],
    'fecha_inicio_movimiento' => $_POST['fecha_inicio_movimiento'],
    'fecha_termino_movimiento' => $_POST['fecha_termino_movimiento'],
    'fecha_modificacion' => $_POST['fecha_modificacion'],
    'id_tbl_centro_trabajo_hraes' => $_POST['id_tbl_centro_trabajo_hraes'],
    'id_cat_situacion_plaza_hraes' => $_POST['id_cat_situacion_plaza_hraes'],

    'id_cat_unidad' => $_POST['id_cat_unidad'],
    'id_cat_coordinacion' => $_POST['id_cat_coordinacion'],
];

$var = [
    'datos' => $datos,
    'condicion' => $condicion
];

if ($_POST['id_object'] != null) { //Modificar
    if ($model->editarByArray($connectionDBsPro, $datos, $condicion)) {
        $dataBitacora = [
            'nombre_tabla' => $tablaPlazas,
            'accion' => 'MODIFICAR',
            'valores' => json_encode($var),
            'fecha' => $timestamp,
            'id_users' => $_SESSION['id_user']
        ];
        $bitacoraM->agregarByArray($connectionDBsPro,$dataBitacora,'central.bitacora_hraes');
        echo 'edit';
    }

} else { //Agregar
    if ($model->agregarByArray($connectionDBsPro, $datos)) {
        $dataBitacora = [
            'nombre_tabla' => $tablaPlazas,
            'accion' => 'AGREGAR',
            'valores' => json_encode($var),
            'fecha' => $timestamp,
            'id_users' => $_SESSION['id_user']
        ];
        $bitacoraM->agregarByArray($connectionDBsPro,$dataBitacora,'central.bitacora_hraes');
        echo 'add';
    }
}


