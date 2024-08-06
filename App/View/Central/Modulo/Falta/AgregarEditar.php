<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_editar_falta">
    <div class="modal-dialog modal-lg modal-dialog-centered" style="max-width: 700px;">
        <div class="modal-content">
            <div class="modal-header background-modal">
                <div class="container">
                    <div class="row">
                        <div class="col-2">
                            <img src="../../../../assets/sirh/logo_retardo.png"
                                style="max-width: 150%;margin-top: 0px;">
                        </div>
                        <div class="col-10">
                            <h1 class="text-tittle-card"><label id="titulo_falta"></label>
                                falta.
                            </h1>
                            <p class="color-text-white">Área para registrar los tiempos de faltas del empleado.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="div-spacing"></div>
            <div class="card-body">
                <div class="container">
                    <div class="row mx-1">
                        <div class="col-4">
                            <label for="campo" class="form-label input-text-form text-input-rem">Fecha
                                desde</label><label class="text-required">*</label>
                            <input type="date" class="form-control custom-input" id="fecha_desde" placeholder="Nombre"
                                maxlength="20">
                            <div class="line"></div>
                        </div>

                        <div class="col-4">
                            <label for="campo" class="form-label input-text-form text-input-rem">Fecha
                                hasta</label><label class="text-required">*</label>
                            <input type="date" class="form-control custom-input" id="fecha_hasta" placeholder="Nombre"
                                maxlength="20">
                            <div class="line"></div>
                        </div>

                        <div class="col-4">
                            <label for="campo" class="form-label input-text-form text-input-rem">Fecha
                                registro</label><label class="text-required">*</label>
                            <input type="date" class="form-control custom-input" id="fecha_registro"
                                placeholder="Nombre" maxlength="20">
                            <div class="line"></div>
                        </div>
                    </div>

                    <div class="div-spacing"></div>
                    <div class="row mx-1">
                        <div class="col-4">
                            <label for="campo" class="form-label input-text-form text-input-rem">C&oacutedigo
                                certificaci&oacuten</label><label class="text-required">*</label>
                            <input onkeyup="convertirAMayusculas(event,'codigo_certificacion')" type="text"
                                class="form-control custom-input" id="codigo_certificacion"
                                placeholder="Código certificación" maxlength="20">
                            <div class="line"></div>
                        </div>

                        <div class="col-8">
                            <label for="campo" class="form-label input-text-form text-input-rem">Observaciones</label><label class="text-required">*</label>
                            <input onkeyup="convertirAMayusculas(event,'Observaciones_falta')" type="text"
                                class="form-control custom-input" id="Observaciones_falta" placeholder="Observaciones"
                                maxlength="40">
                            <div class="line"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="div-spacing"></div>
            <div class="modal-footer">
                <button onclick="salirAgregarEditarFalta_();" type="button" class="btn btn-secondary"
                    data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                <button type="button" class="btn btn-success save-botton-modal"
                    onclick="return validarFalta_();"><i class="fas fa-save"></i> Guardar</button>
                <input type="hidden" id="id_object">
            </div>
        </div>
    </div>
</div>
















<!--
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
                            <input type="date" class="form-control" id="fecha_desde" placeholder="Nombre"
                                maxlength="20">
                        </div>
                        <div class="col-4">
                            <label class="text-input-form text-input-rem">Fecha (Hasta)</label><label
                                class="text-required">*</label>
                            <input type="date" class="form-control" id="fecha_hasta" placeholder="Nombre"
                                maxlength="20">
                        </div>
                        <div class="col-4">
                            <label class="text-input-form text-input-rem">Fecha (Registro)</label><label
                                class="text-required">*</label>
                            <input type="date" class="form-control" id="fecha_registro" placeholder="Nombre"
                                maxlength="20">
                        </div>
                    </div>

                    <div class="div-spacing"></div>
                    <diw class="row">
                        <div class="col-4">
                            <label class="text-input-form div-spacing text-input-rem">Código certificación</label><label
                                class="text-required">*</label>
                            <input onkeyup="convertirAMayusculas(event,'codigo_certificacion')" type="text" class="form-control" id="codigo_certificacion" placeholder="Código certificación"
                                maxlength="20">
                        </div>

                        <div class="col-8">
                            <label class="text-input-form div-spacing text-input-rem">Observaciones</label><label
                                class="text-required">*</label>
                            <input onkeyup="convertirAMayusculas(event,'Observaciones_falta')" type="text" class="form-control" id="Observaciones_falta" placeholder="Observaciones"
                                maxlength="40">
                        </div>
                    </diw>
                </div>
            </div>

            <div class="div-spacing"></div>
            <div class="modal-footer">
                <button onclick="salirAgregarEditarFalta_();" type="button" class="btn btn-secondary"
                    data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                <button type="button" class="btn btn-success save-botton-modal" onclick="return validarFalta_();"><i
                        class="fas fa-save"></i> Guardar</button>
                <input type="hidden" id="id_object">
            </div>
        </div>
    </div>
</div>
-->