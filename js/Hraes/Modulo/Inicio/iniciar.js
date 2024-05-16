function buscarInfoEmpleado(id_tbl_empleados_hraes){
    $.post('../../../../App/Controllers/Hrae/EmpleadoC/InformacionC.php', {
        id_tbl_empleados_hraes:id_tbl_empleados_hraes
    },
        function (data) {
            console.log(data);
        }
    );
}