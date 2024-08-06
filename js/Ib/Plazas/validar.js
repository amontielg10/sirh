function validar(){
    let id_cat_plazas = document.getElementById('id_cat_plazas').value.trim();
    let id_cat_tipo_contratacion_hraes = document.getElementById('id_cat_tipo_contratacion_hraes').value.trim();
    let id_cat_unidad_responsable = document.getElementById('id_cat_unidad_responsable').value.trim();
    let id_cat_puesto_hraes = document.getElementById('id_cat_puesto_hraes').value.trim();
    let id_cat_zonas_tabuladores_hraes = document.getElementById('id_cat_zonas_tabuladores_hraes').value.trim();
    let num_plaza = document.getElementById('num_plaza').value.trim();
    let fecha_ingreso_inst = document.getElementById('fecha_ingreso_inst').value.trim();
    let id_object = document.getElementById('id_object').value.trim();
    let id_cat_aux_puesto = document.getElementById('id_cat_aux_puesto').value.trim();
    let id_cat_categoria_puesto = document.getElementById('id_cat_categoria_puesto').value.trim();
    let id_cat_unidad = document.getElementById('id_cat_unidad').value.trim();
    let id_cat_coordinacion = document.getElementById('id_cat_coordinacion').value.trim();

    if (validarData(id_cat_tipo_contratacion_hraes,'Tipo de contratación') &&
        validarData(num_plaza,'Número de plaza') &&
        validarData(id_cat_puesto_hraes,'Puesto') &&
        validarData(id_cat_aux_puesto,'Puesto especifico') &&
        validarData(id_cat_categoria_puesto,'Categoria de puesto') &&
        validarData(id_cat_plazas,'Tipo de plaza') &&
        validarData(id_cat_unidad_responsable,'Unidad responsable') &&
        validarData(id_cat_zonas_tabuladores_hraes,'Tabuladores') &&
        validarData(id_cat_unidad,'Unidad administrativa') &&
        validarData(id_cat_coordinacion,'Coordinación') &&
        validarData(fecha_ingreso_inst,'Fecha de ingreso OPD') &&
        caracteresCount('Número de plaza',8,num_plaza)
    ){
        if (id_object.length === 0){
            agregarEditarByDb();
        } else {
            validarEstatusPlaza(id_cat_plazas,id_object);
        }
    } 
}


function validarEstatusPlaza(id_cat_plazas,id_object){
    $.post("../../../../App/Controllers/Central/PlazasC/ValidarEstatusC.php", {
        id_cat_plazas: id_cat_plazas,
        id_object:id_object
    },
        function (data) {
            let jsonData = JSON.parse(data);
            let message = jsonData.message; 
            let bool = jsonData.bool;
        
            if (bool){
                notyf.error(message);
            } else {
                agregarEditarByDb();
            }
        }
    );
}

$(document).ready(function() {
    $('#id_cat_puesto_hraes').on('change', function() {
        let id_cat_puesto_hraes = $(this).val();
        $.post("../../../../App/Controllers/Central/PlazasC/GetNivel.php", {
            id_cat_puesto_hraes: id_cat_puesto_hraes,
        },
            function (data) {
                let jsonData = JSON.parse(data);
                let message = jsonData.message;
                let puestoEsp = jsonData.puestoEsp;
                let categoriaPuesto = jsonData.categoriaPuesto;

                $('#id_cat_niveles_hraes').val(message);

                $('#id_cat_aux_puesto').empty();
                $('#id_cat_aux_puesto').html(puestoEsp); 
                $('#id_cat_categoria_puesto').empty();
                $('#id_cat_categoria_puesto').html(categoriaPuesto); 

                $('#id_cat_categoria_puesto').selectpicker('refresh');
                $('#id_cat_aux_puesto').selectpicker('refresh');
                }
        );
    });
});


$(document).ready(function() {
    $('#id_cat_aux_puesto').on('change', function() {
        let id_cat_aux_puesto = $(this).val();
        let id_cat_puesto_hraes = document.getElementById('id_cat_puesto_hraes').value.trim();

        $.post("../../../../App/Controllers/Central/PlazasC/GetCatalogo.php", {
            id_cat_puesto_hraes: id_cat_puesto_hraes,
            id_cat_aux_puesto:id_cat_aux_puesto
        },
            function (data) {
                let jsonData = JSON.parse(data);
                let categoriaResp = jsonData.categoriaResp;

                $('#id_cat_categoria_puesto').empty();
                $('#id_cat_categoria_puesto').html(categoriaResp); 
                $('#id_cat_categoria_puesto').selectpicker('refresh');
                }
        );
    });
});


