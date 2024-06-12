<?php
include '../librerias.php';

$row = new Row();
$bitacoraM = new BitacoraM();
$modelMovimientosM = new ModelMovimientosM();
$catMovimientoM = new CatMovimientoM();
$modelEmpleadosHraes = new modelEmpleadosHraes();
$modelPlazasHraes = new modelPlazasHraes();

$nombreTabla = 'tbl_plazas_empleados_hraes';
$movimientoBaja = $_POST['movimientoBaja'];
$movimientoAlta = $_POST['movimientoAlta'];
$movimientoMov = $_POST['movimientoMov'];
$movimiento_general = $_POST['movimiento_general'];
$idMovimiento = $row->returnArrayById($catMovimientoM->listadoIdMovimiento($_POST['id_tbl_movimientos']));
$ultimoMovimientoCount = $row->returnArrayById($modelMovimientosM->countUltimoMovimiento($_POST['id_tbl_empleados_hraes']));

$idPlazaA = 0;
if ($ultimoMovimientoCount[0] != 0) {
    $ultimoIdPlaza = $row->returnArrayById($modelMovimientosM->idPlazaMovimiento($_POST['id_tbl_empleados_hraes']));
    $idPlazaA = $ultimoIdPlaza[0];
}

$id_tbl_control_plazas_hraes = $_POST['id_tbl_control_plazas_hraes'];
if ($movimiento_general == $movimientoBaja){
    $id_tbl_control_plazas_hraes = $idPlazaA;
}

if ($idMovimiento[0] != $movimientoBaja) {///MODIFICAR EL NUMERO DE EMPLEADO (Donde 3 = baja)
    $claveCentro = $row->returnArrayById($modelPlazasHraes->claveCentroTrabajo($_POST['id_tbl_control_plazas_hraes']));
    $numEmpleado = $row->returnArrayById($modelEmpleadosHraes->numEmpleado($_POST['id_tbl_empleados_hraes']));

    $condicion = [
        'id_tbl_empleados_hraes' => $_POST['id_tbl_empleados_hraes']
    ];

    $datos = [
        'num_empleado' => trim($numEmpleado[0]) . '-' . trim($claveCentro[0]),
    ];
    $modelEmpleadosHraes->editarByArray($connectionDBsPro, $datos, $condicion);
}

$condicion = [
    'id_tbl_plazas_empleados_hraes' => $_POST['id_object']
];

$datos = [
    'id_tbl_movimientos' => $_POST['id_tbl_movimientos'],
    'fecha_movimiento' => $_POST['fecha_movimiento'],
    'id_tbl_control_plazas_hraes' => $id_tbl_control_plazas_hraes,
    'fecha_inicio' => $_POST['fecha_inicio'],
    'fecha_termino' => $_POST['fecha_termino'],
    'id_cat_caracter_nom_hraes' => $_POST['id_cat_caracter_nom_hraes'],
    'motivo_estatus' => $_POST['motivo_estatus'],
    'observaciones' => $_POST['observaciones'],
    'id_tbl_empleados_hraes' => $_POST['id_tbl_empleados_hraes'],
];

$var = [
    'datos' => $datos,
    'condicion' => $condicion
];

modificarPlaza($connectionDBsPro, $movimientoBaja, $movimientoAlta, $movimientoMov, $movimiento_general, $_POST['id_tbl_control_plazas_hraes'], $idPlazaA,$_POST['id_tbl_empleados_hraes'],$_POST['fecha_movimiento']);
if ($_POST['id_object'] != null) { //Modificar
    if ($modelMovimientosM->editarByArray($connectionDBsPro, $datos, $condicion, $nombreTabla)) {    
        $dataBitacora = [
            'nombre_tabla' => 'tbl_plazas_empleados_hraes',
            'accion' => 'MODIFICAR',
            'valores' => json_encode($var),
            'fecha' => $timestamp,
            'id_users' => $_SESSION['id_user']
        ];
        $bitacoraM->agregarByArray($connectionDBsPro, $dataBitacora, 'bitacora_hraes');
        echo 'edit';
    }

} else { //Agregar
    if ($modelMovimientosM->agregarByArray($connectionDBsPro, $datos, $nombreTabla)) {
        $dataBitacora = [
            'nombre_tabla' => 'tbl_plazas_empleados_hraes',
            'accion' => 'AGREGAR',
            'valores' => json_encode($var),
            'fecha' => $timestamp,
            'id_users' => $_SESSION['id_user']
        ];
        $bitacoraM->agregarByArray($connectionDBsPro, $dataBitacora, 'bitacora_hraes');
        echo 'add';
    }
}



/////------------------------------- FUNCIONES AUXILIARES
function modificarPlaza($connectionDBsPro, $movimientoBaja, $movimientoAlta, $movimientoMov, $movimiento_general, $idPlaza, $idPlazaAnte,$idEmpleados,$fecha)
{
    ///VARIABLES DE CATALOGO CAT_PLAZAS -> CAMBIAR EN CASO DE CAMBIAR ID
    $vacante = 5;///CATALOGO
    $ocupada = 3;///CATALOGO
    $congelada = 6;
    $idMovimientoVal = null;
    if ($movimiento_general == $movimientoBaja) { ///MOVIMIENTO BAJA, SE PONE EN BACANTE LA PLAZA A LA QUE ESTABA ASIGNADO
        $idMovimientoVal = $congelada;
        $idPlaza = $idPlazaAnte;
    } else if ($movimiento_general == $movimientoAlta) { ///MOVIMIENTO ALTA, PONE EN OCUPADA LA NUEVA PLAZA
        $idMovimientoVal = $ocupada;
    } else if ($movimiento_general == $movimientoMov) {
        $idMovimientoVal = $congelada;
        //agregarMovimiento($connectionDBsPro,20,$idPlazaAnte,$idEmpleados,$fecha);
        actualizarPlaza($connectionDBsPro, $idMovimientoVal, $idPlazaAnte);
        $idMovimientoVal = $ocupada;
    }

    //UPDATE PLAZA
    actualizarPlaza($connectionDBsPro, $idMovimientoVal, $idPlaza);
}


function agregarMovimiento($connectionDBsPro,$idMovimiento,$idPlaza,$idEmpleados,$fecha){
    $modelMovimientosM = new ModelMovimientosM();
    $datos = [
        'id_tbl_movimientos' => $idMovimiento,
        'id_tbl_control_plazas_hraes' => $idPlaza,
        'id_tbl_empleados_hraes' => $idEmpleados,
        'fecha_movimiento' => $fecha,
    ];
    $modelMovimientosM->agregarByArray($connectionDBsPro, $datos, 'tbl_plazas_empleados_hraes');
}


///LA FUNCION ESPERA COMO PARAMETRO  LA CONEXION, EL ID DEL CATALOGO Y LA CONDICION PARA UPDATE
function actualizarPlaza($connectionDBsPro, $id_cat_plazas, $id_tbl_control_plazas_hraes)
{
    $model = new modelPlazasHraes(); ///CLASS
    $condicion = [
        'id_tbl_control_plazas_hraes' => $id_tbl_control_plazas_hraes, ///CONDICION DE PLAZA
    ];
    $datos = [
        'id_cat_plazas' => $id_cat_plazas,
    ];
    $model->editarByArray($connectionDBsPro, $datos, $condicion);
}







/*
$row = new Row();
$bitacoraM = new BitacoraM();
$catMovimientoM = new CatMovimientoM();
$modelEmpleadosHraes = new modelEmpleadosHraes();
$modelMovimientosM = new ModelMovimientosM();
$modelPlazasHraes = new modelPlazasHraes();
$nombreTabla = 'tbl_plazas_empleados_hraes';
$idMovimiento = $row->returnArrayById($catMovimientoM->listadoIdMovimiento($_POST['id_tbl_movimientos']));

if($idMovimiento[0] != 3){///MODIFICAR EL NUMERO DE EMPLEADO (Donde 3 = baja)
    $claveCentro = $row->returnArrayById($modelPlazasHraes->claveCentroTrabajo($_POST['id_tbl_control_plazas_hraes']));
    $numEmpleado = $row->returnArrayById($modelEmpleadosHraes->numEmpleado($_POST['id_tbl_empleados_hraes']));

    $condicion = [
        'id_tbl_empleados_hraes' => $_POST['id_tbl_empleados_hraes']
    ];

    $datos = [
        'num_empleado' => trim($numEmpleado[0]) . '-' . trim($claveCentro[0]),
    ];
    $modelEmpleadosHraes->editarByArray($connectionDBsPro, $datos, $condicion);
}

$condicion = [
    'id_tbl_plazas_empleados_hraes' => $_POST['id_object']
];

$datos = [
    'fecha_inicio' => $_POST['fecha_inicio'],
    'fecha_termino' => $_POST['fecha_termino'],
    'id_tbl_movimientos' => $_POST['id_tbl_movimientos'],
    'fecha_movimiento' => $_POST['fecha_movimiento'],
    'id_tbl_control_plazas_hraes' => $_POST['id_tbl_control_plazas_hraes'],
    'id_tbl_empleados_hraes' => $_POST['id_tbl_empleados_hraes']
];

$var = [
    'datos' => $datos,
    'condicion' => $condicion
];

if ($_POST['id_object'] != null) { //Modificar
    if ($modelMovimientosM->editarByArray($connectionDBsPro, $datos, $condicion, $nombreTabla)) {
        modificarPlaza($connectionDBsPro,$_POST['id_tbl_control_plazas_hraes'], $idMovimiento[0]);
        $dataBitacora = [
            'nombre_tabla' => 'tbl_plazas_empleados_hraes',
            'accion' => 'MODIFICAR',
            'valores' => json_encode($var),
            'fecha' => $timestamp,
            'id_users' => $_SESSION['id_user']
        ];
        $bitacoraM->agregarByArray($connectionDBsPro,$dataBitacora,'bitacora_hraes');
        echo 'edit';
    }

} else { //Agregar
    if ($modelMovimientosM->agregarByArray($connectionDBsPro, $datos, $nombreTabla)) {
        modificarPlaza($connectionDBsPro,$_POST['id_tbl_control_plazas_hraes'], $idMovimiento[0]);
        $dataBitacora = [
            'nombre_tabla' => 'tbl_plazas_empleados_hraes',
            'accion' => 'AGREGAR',
            'valores' => json_encode($var),
            'fecha' => $timestamp,
            'id_users' => $_SESSION['id_user']
        ];
        $bitacoraM->agregarByArray($connectionDBsPro,$dataBitacora,'bitacora_hraes');
        echo 'add';
    }
}



function modificarPlaza($connectionDBsPro,$idPlaza, $idMovimiento)
{
    $model = new modelPlazasHraes();

    $condicion = [
        'id_tbl_control_plazas_hraes' => $idPlaza
    ];
    ///VARIABLES
    $baja = 3; ///CATALOGO de movimientos
    $vacante = 5;///CATALOGO
    $ocupada = 3;///CATALOGO
    //$idMovimientoVal = null;
    if ($idMovimiento != $baja){
        $idMovimientoVal = $ocupada;
    } else {
        $idMovimientoVal = $vacante;
    }

    $datos = [
        'id_cat_plazas' => $idMovimientoVal,
    ];

    $model->editarByArray($connectionDBsPro, $datos, $condicion);
}
*/
