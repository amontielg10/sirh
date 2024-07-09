<?php
include '../librerias.php';

$modelLicenciasM = new ModelLicenciasM();
$bitacoraM = new BitacoraM();

$condicion = [
    'id_ctrl_incidencias_licencias_hraes' => $_POST['id_object']
];

$datos = [
    'id_tbl_empleados_hraes' => $_POST['id_tbl_empleados_hraes'],
    'fecha_desde' => $_POST['fecha_desde'],
    'fecha_hasta' => $_POST['fecha_hasta'],
    'fecha_registro' => $_POST['fecha_registro'],
    'fecha_inicio_nom' => $_POST['fecha_inicio_nom'],
    'fecha_fin_nomina' => $_POST['fecha_fin_nomina'],
    'horas_max_dia' => $_POST['horas_max_dia'],
    'observaciones' => $_POST['observaciones'],
    'id_cat_tipo_dias' => $_POST['id_cat_tipo_dias'],
    'id_cat_tipo_licencia' => $_POST['id_cat_tipo_licencia'],
    'id_cat_estatus_incidencias' => $_POST['id_cat_estatus_incidencias'],
];

$var = [
    'datos' => $datos,
    'condicion' => $condicion
];

if ($_POST['id_object'] != null) { //Modificar
    if ($modelLicenciasM->editarByArray($connectionDBsPro, $datos, $condicion)) {
        $dataBitacora = [
            'nombre_tabla' => 'public.ctrl_incidencias_licencias_hraes',
            'accion' => 'MODIFICAR',
            'valores' => json_encode($var),
            'fecha' => $timestamp,
            'id_users' => $_SESSION['id_user']
        ];
        $bitacoraM->agregarByArray($connectionDBsPro,$dataBitacora,'public.bitacora_hraes');
        echo 'edit';
    }

} else { //Agregar
    if ($modelLicenciasM->agregarByArray($connectionDBsPro, $datos)) {
        $dataBitacora = [
            'nombre_tabla' => 'public.ctrl_incidencias_licencias_hraes',
            'accion' => 'AGREGAR',
            'valores' => json_encode($var),
            'fecha' => $timestamp,
            'id_users' => $_SESSION['id_user']
        ];
        $bitacoraM->agregarByArray($connectionDBsPro,$dataBitacora,'public.bitacora_hraes');
        echo 'add';
    }
}

