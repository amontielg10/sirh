<?php
include ('../../conexion.php');
include ('../CatFechaJuguetesC/listar.php');

$id_cat_fecha_juguetes = $_POST['id_cat_fecha_juguetes'];
$anio = listadoFechaJuguetesByAnio($id_cat_fecha_juguetes);
$fechaLimit = listadoFechaJuguetesByFecha($id_cat_fecha_juguetes); ///FECHA LIMITE PARA LA ADQUISION DE PROCUTO
$idEstatusJuguete = 1;
$edadLimit = 12;/// EDAD LIMITE DEL MENOR
$idTipoContratacion = 3; /// ID TIPO DE CONTRATACION
$messageErrorEmpleado = "El empleado no cumple con los criterios para ser candidato";
$messageErrorMenor = "El menor no cumple con los criterios para ser candidato";
$messageErrorMenorDupli = "Ya existe un registro con la curp del menor en el modulo de juguetes";
$messageErrorMenorCurp = "CURP invalida del menor";
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

                    if (validateCurp($curpConyuge)) {///VALIDACION DE CURP
                        /// LA CURP ES VALIDA
                        if ($edadMenor < $edadLimit) { ///COMPARACION DE EDAD DE MENOR QUE SEA MENOR A 12
                            /// LA EDAD DEL MENOR ES CORRECTA, POR LO TANTO ES CANDIDATO
                            //echo "empleado $curp es verdadero - $idTblEmpleado - $curpConyuge- $dateCurp - $edadMenor";
                            //echo "<br>";

                            ///------------------------
                            //VALIDACION QUE EL MENOR NO ESTE REGISTRADO DOS VECES EN LA TABLA
                            $consultaCurpMenor = validacionCurpMenorExista($curpConyuge,$id_cat_fecha_juguetes);
                            if ($consultaCurpMenor == 0) { /// VALIDA QUE LA CURP DEL MENOR NO ESTE REGISTRADA EN LA BASE DE DARTOS
                                ///EL REGISTRO NO EXISTE ASI QUE SE AGREGA
                                /// SE INSERTA EN LA TABLA CTRL_DEPENDIENTES_ECONOMICOS
                                insertarDependienteEconomico($connectionDBsPro, $curpConyuge, $nombre, $apellidoPaterno, $apellidoMaterno, $idTipoContratacion, $idTblEmpleado);
                                //LA VARIABLE OBTIENE EL ID DEL DEPENDIENTE ECONOMICO
                                $idDependienreEconomico = idDependieEconomico($curpConyuge);

                                /// SE INGRESAN LOS REGISTROS AL SISTEMA  EN LA TABLA CTRL_JUGUETES
                                insertarCtrlJuguetes($connectionDBsPro, $id_cat_fecha_juguetes, $idEstatusJuguete, $idTblEmpleado, $idDependienreEconomico);
                                //echo "$curpConyuge agregado con exito";
                                //echo "<br>";
                                $registroExito++;

                            } else {
                                /// EL REGISTRO YA EXISTE, SE MANDA EL ERROR
                                insertarErrorDependieteEco($connectionDBsPro, $rfc, $curp, $curpConyuge, $nombre, $apellidoPaterno, $apellidoMaterno, $messgeEstatusError, $messageErrorMenorDupli);
                                $registroError++;
                            }




                        } else { ///LA EDAD DEL MENOR ES MAYOR PARA EL PRODUCTO
                            insertarErrorDependieteEco($connectionDBsPro, $rfc, $curp, $curpConyuge, $nombre, $apellidoPaterno, $apellidoMaterno, $messgeEstatusError, $messageErrorMenor);
                            $registroError++;

                            //echo "$rfc / $curp empleado, $curpConyuge $edadMenor, El menor no cumple con la edad";
                            //echo "<br>";
                        }
                    } else {///CURP DEL MENOR INVALIDA
                        insertarErrorDependieteEco($connectionDBsPro, $rfc, $curp, $curpConyuge, $nombre, $apellidoPaterno, $apellidoMaterno, $messgeEstatusError, $messageErrorMenorCurp);
                        $registroError++;
                        //echo "$rfc / $curp empleado, $curpConyuge $edadMenor, CURP invalida";
                        //echo "<br>";
                    }
                    //echo "empleado $curp es verdadero - $idTblEmpleado - $dateCurp - $fecha - $edad";






                } else {
                    //Empleados que No cumplen las caracteristicas para su regalo
                    insertarErrorDependieteEco($connectionDBsPro, $rfc, $curp, $curpConyuge, $nombre, $apellidoPaterno, $apellidoMaterno, $messgeEstatusError, $messageErrorEmpleado);
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
$active = base64_encode("true");
$registroExito = base64_encode($registroExito);
$registroError = base64_encode($registroError);
header("Location: ../../view/DependientesEconMas/Listar.php?Me=$active&Re=$registroExito&Rr=$registroError");

function idDependieEconomico($curp)
{
    $listado = pg_query("SELECT id_tbl_dependientes_economicos
                         FROM tbl_dependientes_economicos
                         WHERE curp = TRIM('$curp');");
    $row = pg_fetch_array($listado);
    $res = $row[0];
    return $res;
}

function validacionCurpMenorExista($curp, $id_fecha)
{
    $curpSn = trim($curp);
    $listado = pg_query("SELECT COUNT(ctrl_juguetes.id_ctrl_juguetes)
                         FROM ctrl_juguetes
                         INNER JOIN tbl_dependientes_economicos
                         ON ctrl_juguetes.id_tbl_dependientes_economicos = tbl_dependientes_economicos.id_tbl_dependientes_economicos
                         WHERE tbl_dependientes_economicos.curp = TRIM('$curpSn')
                         AND id_cat_fecha_juguetes = $id_fecha;");
    $row = pg_fetch_array($listado);
    $res = $row[0];
    return $res;
}

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

function trucateErrorDependienteEconomico()
{
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

function insertarCtrlJuguetes($connectionDBsPro, $id_cat_fecha_juguetes, $id_cat_estatus_juguetes, $id_tbl_empleados, $id_tbl_dependientes_economicos)
{
    $pgs_QRY = pg_insert(
        $connectionDBsPro,
        'ctrl_juguetes',
        array(
            'id_cat_fecha_juguetes' => $id_cat_fecha_juguetes,
            'id_cat_estatus_juguetes' => $id_cat_estatus_juguetes,
            'id_tbl_empleados' => $id_tbl_empleados,
            'id_tbl_dependientes_economicos' => $id_tbl_dependientes_economicos
        )
    );
}

function insertarDependienteEconomico($connectionDBsPro, $curp, $nombre, $apellido_paterno, $apellido_materno, $id_cat_dependientes_economicos, $id_tbl_empleados)
{
    $pgs_QRY = pg_insert(
        $connectionDBsPro,
        'tbl_dependientes_economicos',
        array(
            'curp' => utf8_encode($curp),
            'nombre' => utf8_encode($nombre),
            'apellido_paterno' => utf8_encode($apellido_paterno),
            'apellido_materno' => utf8_encode($apellido_materno),
            'id_cat_dependientes_economicos' => $id_cat_dependientes_economicos,
            'id_tbl_empleados' => $id_tbl_empleados
        )
    );
}

function insertarErrorDependieteEco(
    $connectionDBsPro,
    $rfc_empleado,
    $curp_empleado,
    $curp_menor,
    $nombre,
    $apellido_paterno,
    $apellido_materno,
    $estatus,
    $descripcion
) {
    $pgs_QRY = pg_insert(
        $connectionDBsPro,
        'tmp_error_dependientes_economicos',
        array(
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



function validateCurp($string = '')
{
    $string = trim($string);
    if (strlen($string) != 18) {
        return false;
    }

    // TRANSFORMARMOS EN STRING EN MAYÚSCULAS RESPETANDO LAS Ñ PARA EVITAR ERRORES
    $string = mb_strtoupper($string, "UTF-8");
    // EL REGEX POR @MARIANO
    $pattern = "/^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/";
    $validate = preg_match($pattern, $string, $match);
    if ($validate === false) {
        // SI EL STRING NO CUMPLE CON EL PATRÓN REQUERIDO RETORNA FALSE
        return false;
    }
    if (count($match) == 0) {
        return false;
    }
    // ASIGNAMOS VALOR DE 0 A 36 DIVIDIENDO EL STRING EN UN ARRAY
    $ind = preg_split('//u', '0123456789ABCDEFGHIJKLMNÑOPQRSTUVWXYZ', null, PREG_SPLIT_NO_EMPTY);
    // REVERTIMOS EL CURP Y LE COLOCAMOS UN DÍGITO EXTRA PARA QUE EL VALOR DEL PRIMER CARACTER SEA 0 Y EL DEL PRIMER DIGITO DE LA CURP (INVERSA) SEA 1
    $vals = str_split(strrev($match[0] . "?"));
    // ELIMINAMOS EL CARACTER ADICIONAL Y EL PRIMER DIGITO DE LA CURP (INVERSA)
    unset($vals[0]);
    unset($vals[1]);
    $tempSum = 0;
    foreach ($vals as $v => $d) {
        // SE BUSCA EL DÍGITO DE LA CURP EN EL INDICE DE LETRAS Y SU CLAVE(VALOR) SE MULTIPLICA POR LA CLAVE(VALOR) DEL DÍGITO. TODO ESTO SE SUMA EN $tempSum
        $tempSum = (array_search($d, $ind) * $v) + $tempSum;
    }
    // ESTO ES DE @MARIANO NO SUPE QUE ERA
    $digit = 10 - $tempSum % 10;
    // SI EL DIGITO CALCULADO ES 10 ENTONCES SE REASIGNA A 0
    $digit = $digit == 10 ? 0 : $digit;
    // SI EL DIGITO COINCIDE CON EL ÚLTIMO DÍGITO DE LA CURP RETORNA TRUE, DE LO CONTRARIO FALSE
    return $match[2] == $digit;
}