<?php
include '../../../../conexion.php';
include '../../../Model/Hraes/EmpleadosM/EmpleadosM.php';

$listado = new modelEmpleadosHraes();
$paginador = $_POST['paginador'];

$query = $listado->listarByAll($paginador);

if (isset($_POST['busqueda'])) {
    $busqueda = $_POST['busqueda'];
    $query = $listado->listarByLike($busqueda,$paginador);
}

$data =
    '<table class="table table-striped table-small-rows" id="t-table" style="width:100%">
    <thead>
        <tr style="background-color:#235B4E;">
            <th class="custom-text-table-tittle">Acciones</th>
            <th class="custom-text-table-tittle">Nombre</th>
            <th class="custom-text-table-tittle">Curp</th>
            <th class="custom-text-table-tittle">Rfc</th>
            <th class="custom-text-table-tittle">N&uacutem. empleado</th>
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
                            <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-sucess dropdown-toggle table-button-style" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-edit"></i></button>
                            <div class="dropdown-menu">
                                <button onclick="agregarEditarDetalles(' . $row['id_tbl_empleados_hraes'] . ')" class="dropdown-item btn btn-light"><i class="fas fa-edit button-table-other"></i> Editar</button>
                                <form action="../Modulo/index.php" method="POST">
                                        <input type="hidden" id="postId" name="id_tbl_empleados_hraes" value="' . $row['id_tbl_empleados_hraes'] . '" />
                                        <button onclick="datosEmpleadosGetDetails(' . $row['id_tbl_empleados_hraes'] . ')" class="dropdown-item btn btn-light"><i class="fa fa-folder-open button-table-other"></i> Datos complementarios</button>
                                </form>
                                <button onclick="eliminarEntity(' . $row['id_tbl_empleados_hraes'] . ')" class="dropdown-item btn btn-light"><i class="far fa-trash-alt button-table-on-delete"></i> Eliminar</button>  
                            </div>
                          </div>
                                </td>
                            <td>
                                ' . $row['nombre'] . ' ' . $row['primer_apellido'] . ' ' . $row['segundo_apellido'] . '
                            </td>
                            <td>
                                ' . $row['curp'] . '
                            </td>
                            <td>
                                ' . $row['rfc'] . '
                            </td>
                            <td>
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


