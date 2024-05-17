<?php
include '../../../../conexion.php';
include '../../../Model/Hraes/PlazasM/PlazasM.php';

$listado = new modelPlazasHraes();

$id_tbl_plazas_empleados_hraes = $_POST['id_object'];
$query = $listado->listarHistoria($id_tbl_plazas_empleados_hraes); //INICIO DE LA TABLA CON LA INFORMACION

$data =
    '<table class="table table-striped" id="t-table-historia" style="width:100%">
    <thead>
        <tr style="background-color:#235B4E;">
            <th style="color: white;">Rfc de empleado</th>
            <th style="color: white;">Movimiento</th>
            <th style="color: white;">Fecha inicio</th>
            <th style="color: white;">Fecha termino</th>
            <th style="color: white;">Fecha movimiento</th>
        </tr>
    </thead>';

if (!$result = pg_query($connectionDBsPro, $query)) {
    exit(pg_result_error($connectionDBsPro));
}
if (pg_num_rows($result) > 0) {
    while ($row = pg_fetch_row($result)) {
        $data .=
            '<tbody>
                        <tr>
                            <td>
                                ' . $row[0] . '
                            </td>
                            <td>
                                ' . $row[1] . '
                            </td>
                            <td>
                                ' . $row[2] . '
                            </td>
                            <td>
                                ' . $row[3] . '
                            </td>
                            <td>
                                ' . $row[4] . '
                            </td>
                        </tr>
                    </tbody>
                </table>';
    }
}

echo $data;


