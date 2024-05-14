var id_tbl_empleados_hraes_init = document.getElementById("id_tbl_empleados_hraes");

$(document).ready(function () {
    //buscarInfoEmpleado();
});

function buscarInfoEmpleado(){
    $.post("../../../App/Controllers/Hrae/EmpleadoC/InformacionC.php", {
        id_tbl_empleados_hraes: id_tbl_empleados_hraes_init
    },
        function (data) {
            console.log(data);
        }
    );
}