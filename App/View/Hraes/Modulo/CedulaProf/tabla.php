<?php
include '../../../../../conexion.php';
include '../../../../Model/Hraes/CedulaM/CedulaM.php';

$id_tbl_empleados_hraes = $_POST['id_tbl_empleados_hraes'];
$modelCedulaM = new ModelCedulaM();
$listado = $modelCedulaM -> listarById($id_tbl_empleados_hraes);
if(isset($_POST['buscar'])){
    $listado = $modelCedulaM->listarByBusqueda($id_tbl_empleados_hraes,$_POST['buscar']);
}

$data =
    '<table class="table table-striped" id="tabla_cedula" style="width:100%">
    <thead>
        <tr style="background-color:#235B4E;">
            <th style="color: white; width: 50px">Acciones</th>
            <th style="color: white;">C&eacutedula profesional</th>
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
                                <button onclick="agregarEditarCedula(' . $row[0] . ')" class="dropdown-item btn btn-light"><i class="fas fa-edit"></i> Modificar</button>
                                <button onclick="eliminarCedula(' . $row[0] . ')" class="dropdown-item btn btn-light"><i class="far fa-trash-alt"></i> Eliminar</button>   
                            </div>
                          </div>
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
