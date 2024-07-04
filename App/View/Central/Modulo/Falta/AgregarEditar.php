<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_editar_falta">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header background-modal">
                <h5 class="modal-title text-modal-tittle"><label id="titulo_falta" class="text-modal-tittle"></label>
                    falta.</h5>
            </div>

            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            <label class="text-input-form text-input-rem">Fecha (Desde)</label><label
                                class="text-required">*</label>
                            <input type="date" class="form-control" id="fecha_retardo" placeholder="Nombre"
                                maxlength="20">
                        </div>
                        <div class="col-4">
                            <label class="text-input-form text-input-rem">Fecha (Hasta)</label><label
                                class="text-required">*</label>
                            <input type="date" class="form-control" id="fecha_retardo" placeholder="Nombre"
                                maxlength="20">
                        </div>
                        <div class="col-4">
                            <label class="text-input-form text-input-rem">Fecha (Registro)</label><label
                                class="text-required">*</label>
                            <input type="date" class="form-control" id="fecha_retardo" placeholder="Nombre"
                                maxlength="20">
                        </div>
                    </div>

                    <div class="div-spacing"></div>
                    <diw class="row">
                        <div class="col-4">
                            <label class="text-input-form div-spacing text-input-rem">Código certificación</label><label
                                class="text-required">*</label>
                            <input onkeyup="convertirAMayusculas(event,'jefe_inmediato')" type="text" class="form-control" id="jefe_inmediato" placeholder="Código certificación"
                                maxlength="60">
                        </div>

                        <div class="col-8">
                            <label class="text-input-form div-spacing text-input-rem">Observaciones</label><label
                                class="text-required">*</label>
                            <input onkeyup="convertirAMayusculas(event,'jefe_inmediato')" type="text" class="form-control" id="jefe_inmediato" placeholder="Observaciones"
                                maxlength="60">
                        </div>
                    </diw>
                </div>
            </div>

            <div class="div-spacing"></div>
            <div class="modal-footer">
                <button onclick="salirAgregarEditarRetardo();" type="button" class="btn btn-secondary"
                    data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                <button type="button" class="btn btn-success save-botton-modal" onclick="return validarDependiente();"><i
                        class="fas fa-save"></i> Guardar</button>
                <input type="hidden" id="id_object">
            </div>
        </div>
    </div>
</div>