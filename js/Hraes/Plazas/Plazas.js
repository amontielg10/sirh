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
    $("#id_object").val(id_object);
    if (id_object == null){
        $("#agregar_editar_modal").find("input,textarea,select").val("");
    }

    $.post("../../../../App/Controllers/Hrae/PlazasC/DetallesC.php", {
        id_object: id_object
    },
        function (data, status) {
            var jsonData = JSON.parse(data);//se obtiene el json
            var entidad = jsonData.entidad;
            var entity = jsonData.response; //Se agrega a emtidad 
            var region = jsonData.region;
            var estatus = jsonData.estatus;

            //Catalogos
            $('#id_cat_entidad').empty();
            $('#id_cat_region').empty();
            $('#id_estatus_centro').empty();
            $('#id_cat_entidad').html(entidad); 
            $('#id_cat_region').html(region); 
            $('#id_estatus_centro').html(estatus); 

            $("#nombre").val(entity.nombre);
            $("#clave_centro_trabajo").val(entity.clave_centro_trabajo);
            $("#colonia").val(entity.colonia);
            $("#codigo_postal").val(entity.codigo_postal);
            $("#num_exterior").val(entity.num_exterior);
            $("#num_interior").val(entity.num_interior);
            $("#latitud").val(entity.latitud);
            $("#longitud").val(entity.longitud);
        }
    );

    $("#agregar_editar_modal").modal("show");
}