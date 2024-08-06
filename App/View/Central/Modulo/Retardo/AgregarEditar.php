<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_editar_retardo">
    <div class="modal-dialog modal-lg modal-dialog-centered" style="max-width: 700px;">
        <div class="modal-content">
            <div class="modal-header background-modal">
                <div class="container">
                    <div class="row">
                        <div class="col-2">
                            <img src="../../../../assets/sirh/logo_retardo.png" style="max-width: 150%;margin-top: 0px;">
                        </div>
                        <div class="col-10">
                            <h1 class="text-tittle-card"><label id="titulo_retardo"></label>
                                retardo.
                            </h1>
                            <p class="color-text-white">Área para registrar los tiempos de retrasos del empleado.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="div-spacing"></div>
            <div class="card-body">
                <div class="container">
                    <div class="row mx-1">
                        <div class="col-4">
                            <label for="campo" class="form-label input-text-form text-input-rem">Fecha</label><label
                                class="text-required">*</label>
                            <input type="date" class="form-control custom-input" id="fecha_retardo">
                            <div class="line"></div>
                        </div>

                        <div class="col-4">
                            <label for="campo" class="form-label input-text-form text-input-rem">Hora
                                entrada</label><label class="text-required">*</label>
                            <input type="time" class="form-control custom-input" id="hora_entrada">
                            <div class="line"></div>
                        </div>

                        <div class="col-4">
                            <label for="campo" class="form-label input-text-form text-input-rem">Hora
                                salida</label><label class="text-required">*</label>
                            <input type="time" class="form-control custom-input" id="hora_salida">
                            <div class="line"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="div-spacing"></div>
            <div class="modal-footer">
                <button onclick="salirAgregarEditarRetardo_();" type="button" class="btn btn-secondary"
                    data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                <button type="button" class="btn btn-success save-botton-modal"
                    onclick="return validarDependiente_();"><i class="fas fa-save"></i> Guardar</button>
                <input type="hidden" id="id_object">
            </div>
        </div>
    </div>
</div>