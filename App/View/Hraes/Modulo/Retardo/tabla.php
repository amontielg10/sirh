<?php
include '../../../../../conexion.php';
include '../../../../Model/Hraes/RetardoM/RetardoM.php';

$id_tbl_empleados_hraes = $_POST['id_tbl_empleados_hraes'];
$modelRetardoM = new ModelRetardoM();
$listado = $modelRetardoM ->listarById($id_tbl_empleados_hraes);
if(isset($_POST['buscar'])){
    //$listado = $modelDependientesM->listarByBusqueda($id_tbl_empleados_hraes,$_POST['buscar']);
}

$data =
    '<table class="table table-striped" id="modulo_dependientes_economicos" style="width:100%">
    <thead>
        <tr style="background-color:#235B4E;">
            <th style="color: white; width: 50px">Acciones</th>
            <th style="color: white;">Fecha</th>
            <th style="color: white;">Hora entrada</th>
            <th style="color: white;">Hora salida</th>
        </tr>
    </thead>';

if (pg_num_rows($listado) > 0) {
    while ($row = pg_fetch_row($listado)) {
        $data .=
            '<tbody>
                        <tr>
                            <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-edit"></i></button>
                            <div class="dropdown-menu">
                                <button onclick="agregarEditarRetardo(' . $row[0] . ')" class="dropdown-item btn btn-light"><i class="fas fa-edit"></i> Modificar</button>
                                <button onclick="eliminarDependiente(' . $row[0] . ')" class="dropdown-item btn btn-light"><i class="far fa-trash-alt"></i> Eliminar</button>   
                            </div>
                          </div>
                                </td>
                            <td>
                                ' . $row[1] . '
                            </td>
                            <td>
                                ' . concatFecha($row[2],$row[3]) . '
                            </td>
                            <td>
                                ' . concatFecha($row[4],$row[5]) . '
                            </td>
                        </tr>
                    </tbody>
                </table>';
    }
} 

echo $data;

function concatFecha($fecha1, $fecha2){
    $fecha = "";
    if (isset($fecha1)){
        $fecha = $fecha1 . ':' .$fecha2;
    }
    return $fecha;
}
