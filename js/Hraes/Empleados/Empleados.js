$(document).ready(function () {
    iniciarTabla();
});


function iniciarTabla() { ///INGRESA LA TABLA
    $.get("../../../../App/View/Hraes/Empleados/tabla.php", {}, function (data, status) {
        $("#t-table").html(data);
    });
}

function iniciarBusqueda(busqueda) { //BUSQUEDA
    $.ajax({
        type: 'POST',
        url: '../../../../App/View/Hraes/Empleados/tabla.php',
        data: { busqueda: busqueda },
        success: function (data) {
            $('#t-table').html(data);
        }
    });
}

function buscarInBd(){ //BUSQUEDA
    let buscar = document.getElementById("buscar").value.trim();
    buscar = buscar.trim().toUpperCase().normalize('NFD').replace(/[\u0300-\u036f]/g,"");
    buscarlenth = buscar.length;
    
    if (buscarlenth == 0){
        iniciarTabla();
    } else {
        iniciarBusqueda(buscar);
    }
}

function agregarEditarDetalles(id_object) { //SE OBTIENEN INFO DE ID SELECCIONADO
    $("#id_object").val(id_object);
    if (id_object == null){
        $("#agregar_editar_modal").find("input,textarea,select").val("");
    }

    $.post("../../../../App/Controllers/Hrae/EmpleadoC/DetallesC.php", {
        id_object: id_object
    },
        function (data, status) {
            var jsonData = JSON.parse(data);//se obtiene el json
            var entity = jsonData.response; //Se agrega a emtidad 
            var entityCp = jsonData.responseCp; 

            //Empleado
            $("#nombre").val(entity.nombre);
            $("#rfc").val(entity.rfc);
            $("#primer_apellido").val(entity.primer_apellido);
            $("#curp").val(entity.curp);
            $("#segundo_apellido").val(entity.segundo_apellido);
            $("#nss").val(entity.nss);

            //Campos personalizados
            $("#porcentaje_ahorro_s").val(entityCp.porcentaje_ahorro_s);
            $("#dias_medio_sueldo").val(entityCp.dias_medio_sueldo);
            $("#dias_sin_sueldo").val(entityCp.dias_sin_sueldo);
            $("#reintegro_faltas_retardo").val(entityCp.reintegro_faltas_retardo);
            $("#importe_festivo").val(entityCp.importe_festivo);
            $("#importe_horas_ex").val(entityCp.importe_horas_ex);
            $("#importe_prima_dominical").val(entityCp.importe_prima_dominical);
            $("#importe_descuentos_indebidos").val(entityCp.importe_descuentos_indebidos);
            $("#regimen_pen").val(entityCp.regimen_pen);
            $("#quinquenio").val(entityCp.quinquenio);
            $("#num_hijos").val(entityCp.num_hijos);
            $("#aplicar_juguetes").val(entityCp.aplicar_juguetes);
            $("#apoyo_titulacion").val(entityCp.apoyo_titulacion);
            $("#licencia_manejo").val(entityCp.licencia_manejo);
            $("#importe_recuperacion_pagos_indebidos").val(entityCp.importe_recuperacion_pagos_indebidos);
            $("#num_dias_jornada_dominical").val(entityCp.num_dias_jornada_dominical);
            $("#num_dias_guardia_festiva").val(entityCp.num_dias_guardia_festiva);
            $("#porcentajes_svi").val(entityCp.porcentajes_svi);
            $("#dias_sancion_adma").val(entityCp.dias_sancion_adma);
        }
    );

    $("#agregar_editar_modal").modal("show");
}


function agregarEditarByDb() {
    var nombre = $("#nombre").val();
    var rfc = $("#rfc").val();
    var primer_apellido = $("#primer_apellido").val();
    var curp = $("#curp").val();
    var segundo_apellido = $("#segundo_apellido").val();
    var nss = $("#nss").val();
    var id_object = $("#id_object").val();

    ///Campos personalizados
    var porcentaje_ahorro_s = $("#porcentaje_ahorro_s").val();
    var dias_medio_sueldo = $("#dias_medio_sueldo").val();
    var dias_sin_sueldo = $("#dias_sin_sueldo").val();
    var reintegro_faltas_retardos = $("#reintegro_faltas_retardos").val();
    var importe_festivo = $("#importe_festivo").val();
    var importe_horas_ex = $("#importe_horas_ex").val();
    var importe_prima_dominical = $("#importe_prima_dominical").val();
    var importe_descuentos_indebidos = $("#importe_descuentos_indebidos").val();
    var regimen_pen = $("#regimen_pen").val();
    var quinquenio = $("#quinquenio").val();
    var num_hijos = $("#num_hijos").val();
    var aplicar_juguetes = $("#aplicar_juguetes").val();
    var apoyo_titulacion = $("#apoyo_titulacion").val();
    var licencia_manejo = $("#licencia_manejo").val();
    var importe_recuperacion_pagos_indebidos = $("#importe_recuperacion_pagos_indebidos").val();
    var num_dias_jornada_dominical = $("#num_dias_jornada_dominical").val();
    var num_dias_guardia_festiva = $("#num_dias_guardia_festiva").val();
    var porcentaje_svi = $("#porcentaje_svi").val();
    var dias_sansion_adma = $("#dias_sansion_adma").val();

    $.post("../../../../App/Controllers/Hrae/EmpleadoC/AgregarEditarC.php", {
        id_object: id_object,
        nombre: nombre,
        rfc:rfc,
        primer_apellido:primer_apellido,
        curp:curp,
        segundo_apellido:segundo_apellido,
        nss:nss,

        ///CAMPOS PERSONALIZADOS
        porcentaje_ahorro_s:porcentaje_ahorro_s,
        dias_medio_sueldo:dias_medio_sueldo,
        dias_sin_sueldo:dias_sin_sueldo,
        reintegro_faltas_retardos:reintegro_faltas_retardos,
        importe_festivo:importe_festivo,
        importe_horas_ex:importe_horas_ex,
        importe_prima_dominical:importe_prima_dominical,
        importe_descuentos_indebidos:importe_descuentos_indebidos,
        regimen_pen:regimen_pen,
        quinquenio:quinquenio,
        num_hijos:num_hijos,
        aplicar_juguetes:aplicar_juguetes,
        apoyo_titulacion:apoyo_titulacion,
        licencia_manejo:licencia_manejo,
        importe_recuperacion_pagos_indebidos:importe_recuperacion_pagos_indebidos,
        num_dias_jornada_dominical:num_dias_jornada_dominical,
        num_dias_guardia_festiva:num_dias_guardia_festiva,
        porcentaje_svi:porcentaje_svi,
        dias_sansion_adma:dias_sansion_adma,
    },
        function (data, status) {
            console.log(data);
            if (data == 'edit'){
                mensanjeExito('Empleado modificado con éxito');
            } else if (data == 'add') {
                mensanjeExito('Agregado con éxito');  
            } else {
                mensanjeError(data);
            }
            $("#agregar_editar_modal").modal("hide");
            iniciarTabla();
        }
    );
}
