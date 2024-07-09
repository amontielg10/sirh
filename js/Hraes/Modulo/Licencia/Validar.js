function validarLicencia(){
    let id_cat_tipo_licencia = document.getElementById('id_cat_tipo_licencia').value;
    let id_cat_tipo_dias = document.getElementById('id_cat_tipo_dias').value;
    let horas_max_dia = document.getElementById('horas_max_dia').value;
    let fecha_desde_ = document.getElementById('fecha_desde_').value;
    let fecha_hasta_ = document.getElementById('fecha_hasta_').value;
    let fecha_inicio_nom = document.getElementById('fecha_inicio_nom').value;
    let fecha_fin_nomina = document.getElementById('fecha_fin_nomina').value;
    let fecha_registro_ = document.getElementById('fecha_registro_').value;
    let id_cat_estatus_incidencias = document.getElementById('id_cat_estatus_incidencias').value;

    if (validarData(id_cat_tipo_licencia,'Tipo de licencia') &&
    validarData(id_cat_tipo_dias,'Tipo de días') &&
    validarData(fecha_desde_,'Fecha inicio') &&
    validarData(fecha_hasta_,'Fecha fin') &&
    validarData(fecha_inicio_nom,'Fecha inicio nómina') &&
    validarData(fecha_fin_nomina,'Fecha fin nómina') &&
    validarData(fecha_registro_,'Fecha registro') &&
    validarData(id_cat_estatus_incidencias,'Estatus') 
    ){
        if(horas_max_dia.length < 3){
            guardarLicencia();
        } else {
            mensajeError('Campo Hora debe tener un máximo de 2 caracteres');
        }
    }
}
                            

