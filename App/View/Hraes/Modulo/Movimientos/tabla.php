<?php
include '../../../../../conexion.php';
include '../../../../Model/Hraes/MovimientosM/MovimientosM.php';

$id_tbl_empleados_hraes = $_POST['id_tbl_empleados_hraes'];
$modelMovimientosM = new ModelMovimientosM();
$listado = $modelMovimientosM -> listarByIdEmpleado($id_tbl_empleados_hraes);
if(isset($_POST['buscar'])){
    $listado = $modelFormaPagoM->listarByBusqueda($id_tbl_empleados_hraes,$_POST['buscar']);
}

$data =
    '<table class="table table-striped" id="tabla_movimientos" style="width:100%">
    <thead>
        <tr style="background-color:#235B4E;">
            <th style="color: white; width: 50px">Acciones</th>
            <th style="color: white;">N&uacutemero de plaza</th>
            <th style="color: white;">Movimiento general</th>
            <th style="color: white;">Movimiento especifico</th>
            <th style="color: white;">Fecha movimiento</th>
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
                                <button onclick="agregarEditarMovimiento(' . $row[0] . ')" class="dropdown-item btn btn-light"><i class="fas fa-edit"></i> Modificar</button>
                                <button onclick="eliminarMovimiento(' . $row[0] . ')" class="dropdown-item btn btn-light"><i class="far fa-trash-alt"></i> Eliminar</button>   
                            </div>
                          </div>
                                </td>
                            <td>
                                ' . $row[8] . '
                            </td>
                            <td>
                                ' . $row[7] . '
                            </td>
                            <td>
                                ' . $row[6] . '
                            </td>
                            <td>
                                ' . $row[2] . '
                            </td>
                        </tr>
                    </tbody>
                </table>';
    }
} 

echo $data;
