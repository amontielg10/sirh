<?php

include ('../EmpleadosC/Listar.php');
include ('../ControlJuguetesC/Listar.php');
function pagoJuguetes($archivo,$id_cat_fecha_juguetes)
{
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
            /// SE AGREGA LA PRIMER CARGA MASIVA
            //echo $idCtrlCargaMasiva;
            foreach ($lineas as $linea) {
                $cantidad_registros = count($lineas);
                $cantidad_regist_agregados = ($cantidad_registros - 4);
                $lineaExel = $i + 1;

                if ($i != 0) {
                    $datos = explode(",", $linea);

                    $rfc = !empty($datos[0]) ? trim($datos[0]) : '';
                    $curp = !empty($datos[1]) ? trim($datos[1]) : '';
                    $noHijos = !empty($datos[2]) ? trim($datos[2]) : '';
                    $monto = !empty($datos[3]) ? trim($datos[3]) : '';

                    if (empty($rfc) || empty($curp) || empty($noHijos) || empty($monto)) {
                        //echo "No existen datos en linea $lineaExel";
                        $registroError++;
                    } else {
                        $idTblEmpleado = validacionEmpleado($curp, $rfc); ///id_tbl_empleado
                        
                        if (!empty($idTblEmpleado)) {
                            /// SE ENCUENTRAN LOS DATOS DEL EMPLEADO
                            if(listadoControlJuguetesByCount($idTblEmpleado,$id_cat_fecha_juguetes) == $noHijos) { 
                                ///SE ENCUENTRA LA CANTIDAD DE HIJOS IGUAL A LA DEL EXEL
                                if ($noHijos == 1){
                                    echo "$rfc - $curp - $noHijos - $monto - $lineaExel -id $idTblEmpleado - " ;
                                } else {
                                    echo "$rfc - $curp - $noHijos - ".($monto/$noHijos)." - $lineaExel -id $idTblEmpleado - " ;
                                }
                                
                            } else {
                                ///NO COINCIDEN 
                            }
                        } else {
                            ///NO SE ENCUENTRAN LOS DATOS DEL EMPEADO
                        }

                    }


                }
                echo "<br>";
                $i++;
            }

        }
    }
}