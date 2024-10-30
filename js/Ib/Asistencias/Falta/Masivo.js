function ocultarModalFaltas() {
    $("#modal_carga_masiva_faltas").modal("hide");
}

function mostrarModalFaltas() {
    $('.custom-file-name-faltas').text('');
    $('#customFileFaltas').val(null);
    $("#modal_carga_masiva_faltas").modal("show");
}