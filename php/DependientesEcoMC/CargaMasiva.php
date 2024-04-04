<?php
include ('../../conexion.php');

$fechaLimit = "2023-01-06"; ///FECHA LIMITE PARA LA ADQUISION DE PROCUTO
$edadLimit = 12;/// EDAD LIMITE DEL MENOR
$idTipoContratacion = 3; /// ID TIPO DE CONTRATACION
$messageErrorEmpleado = "El empleado no cumple con los criterios para ser candidato";
$messageErrorMenor = "El menor no cumple con los criterios para ser candidato";
$messgeEstatusError = "Error al agregar";
$registroExito = 0;
$registroError = 0;

///Ejecutar funcion de limpieza de tabla
trucateErrorDependienteEconomico();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["archivo"])) {
    $archivo_temporal = $_FILES["archivo"]["tmp_name"];
    $nombre_archivo = basename($_FILES["archivo"]["name"]);
    $extension = pathinfo($nombre_archivo, PATHINFO_EXTENSION);
    $lineas = file($archivo_temporal);
    $permitidos = array("csv");
    if (!in_array($extension, $permitidos)) {
        echo "Solo se permiten archivos CSV";
    } else {
        $i = 0;

        foreach ($lineas as $linea) {
            $cantidad_registros = count($lineas);
            $cantidad_regist_agregados = ($cantidad_registros - 4);

            if ($i != 0) {
                $datos = explode(",", $linea);
                $rfc = !empty($datos[0]) ? ($datos[0]) : '';
                $curp = !empty($datos[1]) ? ($datos[1]) : '';
                $curpConyuge = !empty($datos[2]) ? ($datos[2]) : '';
                $apellidoPaterno = !empty($datos[3]) ? ($datos[3]) : '';
                $apellidoMaterno = !empty($datos[4]) ? ($datos[4]) : '';
                $nombre = !empty($datos[5]) ? ($datos[5]) : '';

                $idTblEmpleado = validacionEmpleado($curp, $rfc); ///id_tbl_empleado
                $dateCurp = obtenerFechaNacimiento($curpConyuge); ///OBTENER FECHA DE NACIMIENTO
                $edadMenor = validarFechaNecimiento($dateCurp, $fechaLimit); /// OBTENER LA FECHA DE NACIMIENTO DEL MENOR

                if (!empty($idTblEmpleado)) { ///VALIDACION DE RFC O CURP DE EMPLEADO
                    /// LOS RFC/CURP EMPATAN CON LAS CARACTERISTICAS PARA EL REGALO
                    if ($edadMenor < $edadLimit) { ///COMPARACION DE EDAD DE MENOR QUE SEA MENOR A 12
                        /// LA EDAD DEL MENOR ES CORRECTA, POR LO TANTO ES CANDIDATO
                        //echo "empleado $curp es verdadero - $idTblEmpleado - $dateCurp - $edadMenor";
                        //echo "<br>";
                        if(insertarDependienteEconomico($connectionDBsPro,$curpConyuge,$nombre,$apellidoPaterno,$apellidoMaterno,$idTipoContratacion,$idTblEmpleado)){
                            //echo "$curpConyuge agregado con exito";
                            //echo "<br>";
                            $registroExito++;
                        } 





                    } else { ///LA EDAD DEL MENOR ES MAYOR PARA EL PRODUCTO
                        insertarErrorDependieteEco($connectionDBsPro,$rfc,$curp,$curpConyuge,$nombre,$apellidoPaterno,$apellidoMaterno,$messgeEstatusError,$messageErrorMenor);
                        $registroError++;
                        // echo "$rfc / $curp empleado, $curpConyuge $edadMenor, El menor no cumple con la edad";
                        //echo "<br>";
                    }
                    //echo "empleado $curp es verdadero - $idTblEmpleado - $dateCurp - $fecha - $edad";






                } else {
                    //Empleados que No cumplen las caracteristicas para su regalo
                    insertarErrorDependieteEco($connectionDBsPro,$rfc,$curp,$curpConyuge,$nombre,$apellidoPaterno,$apellidoMaterno,$messgeEstatusError,$messageErrorEmpleado);
                    $registroError++;
                    //echo "$rfc / $curp empleado, $curpConyuge $edadMenor, El empleado no cumple con los criterios";
                    //echo "<br>";
                }





                //END
            }
            $i++;
        }
    }
}


//echo $registroExito;
$active = base64_encode ("true");
$registroExito = base64_encode($registroExito);
$registroError = base64_encode($registroError);
header("Location: ../../view/DependientesEconMas/Listar.php?Me=$active&Re=$registroExito&Rr=$registroError");
function validarFechaNecimiento($fechaNacimiento, $fechaDiferencia)
{
    $datetime1 = new DateTime($fechaNacimiento);
    $datetime2 = new DateTime($fechaDiferencia);
    $interval = $datetime1->diff($datetime2);
    $anio = $interval->y;
    $mes = $interval->m;
    $dia = $interval->d;
    return "$anio.$mes";
}

///OBTENER FECHA DE LA CURP
function obtenerFechaNacimiento($curp)
{
    // Extraer los primeros 10 caracteres de la CURP que corresponden a la fecha de nacimiento
    $fecha_nacimiento = substr($curp, 4, 6);

    // Separar la fecha en año, mes y día
    $anio = substr($fecha_nacimiento, 0, 2);
    $mes = substr($fecha_nacimiento, 2, 2);
    $dia = substr($fecha_nacimiento, 4, 2);

    // Combinar en un formato de fecha legible
    $fecha_legible = "20$anio-$mes-$dia"; // Se asume que la CURP tiene formato anterior a 2000, puedes ajustar esto según tus necesidades

    $fecha = new DateTime($fecha_legible);

    // Imprimir la fecha en el formato deseado
    //echo 'Fecha convertida: ' . $fecha->format('Y-m-d');
    return $fecha->format('Y-m-d');
}

function trucateErrorDependienteEconomico(){
    pg_query("TRUNCATE TABLE tmp_error_dependientes_economicos RESTART IDENTITY;");
}
/// LA FUNCION OBTIENE EL ID DE EMPLEADO DEPENDIENDO SI SU RFC O CURP SE ENCUENTRAN DENTRO DEL SISTEMA Y QUE EL TIPO DE CONTRATACION PERTENECE AL ID 3
function validacionEmpleado($curp, $rfc)
{
    $listado = pg_query("SELECT tbl_empleados.id_tbl_empleados, tbl_empleados.curp,
                                tbl_empleados.rfc, cat_tipo_contratacion.id_cat_tipo_contratacion
                        FROM tbl_empleados
                        INNER JOIN tbl_plazas_empleados
                        ON tbl_empleados.id_tbl_empleados = tbl_plazas_empleados.id_tbl_empleados
                        INNER JOIN tbl_control_plazas
                        ON tbl_plazas_empleados.id_tbl_control_plazas = tbl_control_plazas.id_tbl_control_plazas
                        INNER JOIN cat_tipo_contratacion
                        ON tbl_control_plazas.id_cat_tipo_contratacion = cat_tipo_contratacion.id_cat_tipo_contratacion
                        WHERE cat_tipo_contratacion.id_cat_tipo_contratacion = 3 
                        AND (tbl_empleados.curp = TRIM('$curp') 
                        OR tbl_empleados.rfc = TRIM('$rfc'))");
    $row = pg_fetch_array($listado);
    $res = $row[0];
    return $res;
}

function insertarDependienteEconomico($connectionDBsPro, $curp,$nombre,$apellido_paterno,$apellido_materno,$id_cat_dependientes_economicos,$id_tbl_empleados)
{
    $bool = false;
    $pgs_QRY = pg_insert($connectionDBsPro, 'tbl_dependientes_economicos', array(
        'curp' => $curp,
        'nombre' => utf8_encode($nombre),
        'apellido_paterno' => utf8_encode($apellido_paterno),
        'apellido_materno' => utf8_encode($apellido_materno),
        'id_cat_dependientes_economicos' => $id_cat_dependientes_economicos,
        'id_tbl_empleados' => $id_tbl_empleados
        )
    );
    if ($pgs_QRY){
        $bool = true;
    }
    return $bool;
}

function insertarErrorDependieteEco($connectionDBsPro, $rfc_empleado,$curp_empleado,$curp_menor,
                                    $nombre,$apellido_paterno,$apellido_materno,$estatus,$descripcion)
{
    $pgs_QRY = pg_insert($connectionDBsPro, 'tmp_error_dependientes_economicos', array(
        'rfc_empleado' => utf8_encode($rfc_empleado),
        'curp_empleado' => utf8_encode($curp_empleado),
        'curp_menor' => utf8_encode($curp_menor),
        'apellido_paterno' => utf8_encode($apellido_paterno),
        'apellido_materno' => utf8_encode($apellido_materno),
        'estatus' => utf8_encode($estatus),
        'nombre' => utf8_encode($nombre),
        'descripcion' => utf8_encode($descripcion),
        )
    );
}



/// VALIDAR CURP
function validate_curp($valor)
{
    if (strlen($valor) == 18) {
        $letras = substr($valor, 0, 4);
        $numeros = substr($valor, 4, 6);
        $sexo = substr($valor, 10, 1);
        $mxState = substr($valor, 11, 2);
        $letras2 = substr($valor, 13, 3);
        $homoclave = substr($valor, 16, 2);
        if (ctype_alpha($letras) && ctype_alpha($letras2) && ctype_digit($numeros) && ctype_digit($homoclave) && is_mx_state($mxState) && is_sexo_curp($sexo)) {
            return true;
        }
        return false;
    } else {
        return false;
    }
}

function is_mx_state($state)
{
    $mxStates = [
        'AS',
        'BS',
        'CL',
        'CS',
        'DF',
        'GT',
        'HG',
        'MC',
        'MS',
        'NL',
        'PL',
        'QR',
        'SL',
        'TC',
        'TL',
        'YN',
        'NE',
        'BC',
        'CC',
        'CM',
        'CH',
        'DG',
        'GR',
        'JC',
        'MN',
        'NT',
        'OC',
        'QT',
        'SP',
        'SR',
        'TS',
        'VZ',
        'ZS'
    ];
    if (in_array(strtoupper($state), $mxStates)) {
        return true;
    }
    return false;
}

function is_sexo_curp($sexo)
{
    $sexoCurp = ['H', 'M'];
    if (in_array(strtoupper($sexo), $sexoCurp)) {
        return true;
    }
    return false;
}


/*
if( !empty($celular) ){
$checkemail_duplicidad = ("SELECT celular FROM clientes WHERE celular='".($celular)."' ");
     $ca_dupli = mysqli_query($con, $checkemail_duplicidad);
     $cant_duplicidad = mysqli_num_rows($ca_dupli);
 }   

//No existe Registros Duplicados
if ( $cant_duplicidad == 0 ) { 

$insertarData = "INSERT INTO clientes( 
nombre,
correo,
celular
) VALUES(
'$nombre',
'$correo',
'$celular'
)";
mysqli_query($con, $insertarData);
 
} 

else{
$updateData =  ("UPDATE clientes SET 
 nombre='" .$nombre. "',
 correo='" .$correo. "',
 celular='" .$celular. "'  
 WHERE celular='".$celular."'
");
$result_update = mysqli_query($con, $updateData);
} */

