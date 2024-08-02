<?php
include '../../../../conexion.php';
include '../../../Model/Central/EmpleadosM/EmpleadosM.php';

$listado = new modelEmpleadosHraes();
$paginador = $_POST['paginador'];

$query = $listado->listarByAll($paginador);

if (isset($_POST['busqueda'])) {
    $busqueda = $_POST['busqueda'];
    $query = $listado->listarByLike($busqueda,$paginador);
}

$data =
    '<table class="table table-bordered table-fixed" id="t-table">
    <thead>
        <tr>
            <th class="col-wide-action">Acciones</th>
            <th class="col-wide">Nombre</th>
            <th class="col-wide">Curp</th>
            <th class="col-wide">Rfc</th>
            <th class="col-wide">N&uacutem. empleado</th>
        </tr>
    </thead>';

if (!$result = pg_query($connectionDBsPro, $query)) {
    exit(pg_result_error($connectionDBsPro));
}
if (pg_num_rows($result) > 0) {
    while ($row = pg_fetch_assoc($result)) {
        $data .=
            '<tbody>
                        <tr>
                            <td class="col-wide-action">
                            <div class="btn-group">
                                <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-edit icono-grande-tabla"></i></button>
                            <div class="dropdown-menu">
                                <button onclick="agregarEditarDetalles(' . $row['id_tbl_empleados_hraes'] . ')" class="dropdown-item btn btn-light"><i class="fas fa-edit icon-edit-table"></i> Modificar</button>
                                <form action="../Modulo/index.php" method="POST">
                                        <input type="hidden" name="id_tbl_empleados_hraes" value="' . $row['id_tbl_empleados_hraes'] . '" />
                                        <button onclick="datosEmpleadosGetDetails(' . $row['id_tbl_empleados_hraes'] . ')" class="dropdown-item btn btn-light"><i class="fa fa-folder-open icon-edit-table"></i> Datos complementarios</button>  
                                </form>
                                <button onclick="eliminarEntity(' . $row['id_tbl_empleados_hraes'] . ')" class="dropdown-item btn btn-light"><i class="far fa-trash-alt icon-delete-table"></i> Eliminar</button>  
                            </div>
                          </div>
                                </td>
                            <td class="col-wide">
                                ' . $row['nombre'] . ' ' . $row['primer_apellido'] . ' ' . $row['segundo_apellido'] . '
                            </td>
                            <td class="col-wide">
                                ' . $row['curp'] . '
                            </td>
                            <td class="col-wide"> 
                                ' . $row['rfc'] . '
                            </td>
                            <td class="col-wide">
                                ' . $row['num_empleado'] . '
                            </td>
                        </tr>
                    </tbody>
                </table>';
    }
}else {
    $data .= '<h6>Sin resultados</h6>';
}

echo $data;


