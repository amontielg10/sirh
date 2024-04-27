$(document).ready(function () {
    iniciarPlazas();
});

function iniciarPlazas(){
    let id_tbl_centro_trabajo_hraes = document.getElementById("id_tbl_centro_trabajo_hraes").value;
    if (id_tbl_centro_trabajo_hraes != 'ok'){
        ///INICIAR TABLA REFERENTE A LOS CENTROS DE TRABAJO
        iniciarTablaByIdCentroTrabajo(id_tbl_centro_trabajo_hraes);
    } else {
        //INICIAR TABLA SIN ID DE CENTRO DE TRABAJO
        iniciarTabla();
    }
}

function iniciarTabla() { ///INGRESA LA TABLA
    $.get("../../../../App/View/Hraes/Plazas/tabla.php", {}, function (data, status) {
        $("#t-table").html(data);
    });
}

function iniciarTablaByIdCentroTrabajo(id_object) { ///INGRESA LA TABLA
    $.ajax({
        type: 'POST',
        url: '../../../../App/View/Hraes/Plazas/tabla.php',
        data: { id_object: id_object },
        success: function (data) {
            $('#t-table').html(data);
        }
    });
}

function iniciarBusqueda(busqueda,id_object) { //BUSQUEDA
    $.ajax({
        type: 'POST',
        url: '../../../../App/View/Hraes/Plazas/tabla.php',
        data: { 
            busqueda: busqueda,
            id_object:id_object 
        },
        success: function (data) {
            $('#t-table').html(data);
        }
    });
}

function buscarInBd(){ //BUSQUEDA
    let buscar = document.getElementById("buscar").value.trim();
    let id_tbl_centro_trabajo_hraes = document.getElementById("id_tbl_centro_trabajo_hraes").value;
    buscar = buscar.trim().toUpperCase().normalize('NFD').replace(/[\u0300-\u036f]/g,"");
    buscarlenth = buscar.length;
    
    if (buscarlenth == 0){
        iniciarPlazas();
    } else {
        iniciarBusqueda(buscar,id_tbl_centro_trabajo_hraes);
    }
}


///DETALLES DE LA Entidad u hiustoria
function detallesEntity(id_object){

    iniciarTablaHistoria(id_object);

    let num_plaza = document.getElementById("num_plaza");
    let cve_centro_trabajo = document.getElementById("cve_centro_trabajo");
    let tipo_plaza = document.getElementById("tipo_plaza");
    let nombre_centro_trabajo = document.getElementById("nombre_centro_trabajo");
    let tipo_contratacion = document.getElementById("tipo_contratacion");
    let entidad = document.getElementById("entidad");
    let unidad_respo = document.getElementById("unidad_respo");
    let codigo_postal = document.getElementById("codigo_postal");

    $("#id_object").val(id_object);

    $.post("../../../../App/Controllers/Hrae/PlazasC/DetallesEntityC.php", {
        id_object: id_object
    },
        function (data, status) {
            var jsonData = JSON.parse(data);//se obtiene el json
            var entity = jsonData.response; //Se agrega a emtidad 

            num_plaza.textContent = entity[1];
            cve_centro_trabajo.textContent = entity[6];
            tipo_plaza.textContent = entity[2];
            nombre_centro_trabajo.textContent = entity[7];
            tipo_contratacion.textContent = entity[3];
            entidad.textContent = entity[8];
            unidad_respo.textContent = entity[4];
            codigo_postal.textContent = entity[9];
        }
    );

    $("#mostar_detalles_modal").modal("show");

}

function iniciarTablaHistoria(id_object) { ///INGRESA LA TABLA
    $.ajax({
        type: 'POST',
        url: '../../../../App/View/Hraes/Plazas/tablaHistoria.php',
        data: { id_object: id_object },
        success: function (data) {
            $('#t-table-historia').html(data);
        }
    });
}

function agregarEditarDetalles(id_object) { //SE OBTIENEN INFO DE ID SELECCIONADO
    let id_tbl_centro_trabajo_hraes = document.getElementById("id_tbl_centro_trabajo_hraes").value;
    $("#id_object").val(id_object);
    $("#id_tbl_centro_trabajo_hraes").val(id_tbl_centro_trabajo_hraes);
    

    if (id_object == null){
        $("#agregar_editar_modal").find("input,textarea,select").val("");
    }

    $.post("../../../../App/Controllers/Hrae/PlazasC/DetallesC.php", {
        id_object: id_object,
    },
        function (data, status) {
            console.log(data);
            var jsonData = JSON.parse(data);//se obtiene el json
            var entity = jsonData.entity; //Se agrega a emtidad 
            var plazas = jsonData.plazas;
            var contratacion = jsonData.contratacion;
            var unidadResp = jsonData.unidadResp;
            var puesto = jsonData.puesto;
            var tabulares = jsonData.tabulares;
            var niveles = jsonData.niveles;
            
            $('#id_cat_plazas').empty();
            $('#id_cat_plazas').html(plazas); 
            $('#id_cat_tipo_contratacion_hraes').empty();
            $('#id_cat_tipo_contratacion_hraes').html(contratacion);
            $('#id_cat_unidad_responsable').empty();
            $('#id_cat_unidad_responsable').html(unidadResp);
            $('#id_cat_puesto_hraes').empty();
            $('#id_cat_puesto_hraes').html(puesto);
            $('#id_cat_zonas_tabuladores_hraes').empty();
            $('#id_cat_zonas_tabuladores_hraes').html(tabulares);
            $('#id_cat_niveles_hraes').empty();
            $('#id_cat_niveles_hraes').html(niveles);
            
            $("#num_plaza").val(entity.num_plaza);
            $("#zona_pagadora").val(entity.zona_pagadora);
            $("#fecha_ingreso_inst").val(entity.fecha_ingreso_inst);
            $("#fecha_inicio_movimiento").val(entity.fecha_inicio_movimiento);
            $("#fecha_termino_movimiento").val(entity.fecha_termino_movimiento);
            $("#fecha_modificacion").val(entity.fecha_modificacion);

        }
    );

    $("#agregar_editar_modal").modal("show");
}

function agregarEditarByDb() {
    var id_cat_plazas = $("#id_cat_plazas").val();
    var id_cat_tipo_contratacion_hraes = $("#id_cat_tipo_contratacion_hraes").val();
    var id_cat_unidad_responsable = $("#id_cat_unidad_responsable").val();
    var id_cat_puesto_hraes = $("#id_cat_puesto_hraes").val();
    var id_cat_zonas_tabuladores_hraes = $("#id_cat_zonas_tabuladores_hraes").val();
    var id_cat_niveles_hraes = $("#id_cat_niveles_hraes").val();
    var num_plaza = $("#num_plaza").val();
    var zona_pagadora = $("#zona_pagadora").val();
    var fecha_ingreso_inst = $("#fecha_ingreso_inst").val();
    var fecha_inicio_movimiento = $("#fecha_inicio_movimiento").val();
    var fecha_termino_movimiento = $("#fecha_termino_movimiento").val();
    var fecha_modificacion = $("#fecha_modificacion").val();
    var id_object = $("#id_object").val();
    var id_tbl_centro_trabajo_hraes = $("#id_tbl_centro_trabajo_hraes").val();

    $.post("../../../../App/Controllers/Hrae/PlazasC/AgregarEditarC.php", {
        id_cat_plazas: id_cat_plazas,
        id_cat_tipo_contratacion_hraes: id_cat_tipo_contratacion_hraes,
        id_cat_unidad_responsable:id_cat_unidad_responsable,
        id_cat_puesto_hraes:id_cat_puesto_hraes,
        id_cat_zonas_tabuladores_hraes:id_cat_zonas_tabuladores_hraes,
        id_cat_niveles_hraes:id_cat_niveles_hraes,
        num_plaza:num_plaza,
        zona_pagadora:zona_pagadora,
        fecha_ingreso_inst:fecha_ingreso_inst,
        fecha_inicio_movimiento:fecha_inicio_movimiento,
        fecha_termino_movimiento:fecha_termino_movimiento,
        fecha_modificacion:fecha_modificacion,
        id_object:id_object,
        id_tbl_centro_trabajo_hraes:id_tbl_centro_trabajo_hraes,

    },
        function (data, status) {
            if (data == 'edit'){
                mensajeExito('Centro de trabajo modificado');
            } else if (data == 'add') {
                mensajeExito('Centro de trabajo agregado');  
            } else {
                mensajeError(data);
            }
            $("#agregar_editar_modal").modal("hide");
            iniciarPlazas();
        }
    );
}

function eliminarEntity(id_object) {//ELIMINAR USUARIO
    Swal.fire({
        title: "¿Está seguro?",
        text: "¡No podrás revertir esto!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, eliminar",
        cancelButtonText: "Cancelar"
      }).then((result) => {
        if (result.isConfirmed) {
        $.post("../../../../App/Controllers/Hrae/PlazasC/EliminarC.php", {
                id_object: id_object
            },
            function (data, status) {
                if (data == 'delete'){
                    mensajeExito('Centro de trabajo eliminado')
                } else {
                    mensajeError('No fue posible eliminar el elemento');
                }
                iniciarPlazas();
            }
        );
    }
    });
}