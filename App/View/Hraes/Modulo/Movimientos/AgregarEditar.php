<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_editar_movimiento">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header background-modal">
                <h5 class="modal-title text-modal-tittle"><label id="tituloMovimiento"
                        class="text-modal-tittle"></label> movimiento.</h5>
            </div>

            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-3">
                            <label class="text-input-form div-spacing text-input-rem">Movimiento general</label><label
                                class="text-required">*</label>
                            <div class="custom-select-wrapper">
                                <select class="form-control" aria-label="Default select example" id="movimiento_general"
                                    required>
                                </select>
                            </div>
                        </div>
                        <div class="col-5">
                            <label class="text-input-form div-spacing text-input-rem">Movimiento
                                espec&iacutefico</label><label class="text-required">*</label>
                            <div class="custom-select-wrapper">
                                <select class="form-control" aria-label="Default select example" id="id_tbl_movimientos"
                                    required>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <label class="text-input-form div-spacing text-input-rem">Fecha de movimiento</label><label
                                class="text-required">*</label>
                            <input type="date" type="number" class="form-control" id="fecha_movimiento"
                                placeholder="Cuenta clabe" maxlength="18">
                        </div>
                    </div>
                </div>
            </div>

            <div id="ocultar_model">
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-4">
                                <label class="text-input-form div-spacing text-input-rem">N&uacutem. Plaza</label><label
                                    class="text-required">*</label>
                                <select data-style="input-select-selectpicker form-control" class="selectpicker"
                                    aria-label="Default select example" data-live-search="true"
                                    id="id_tbl_control_plazas_hraes" data-none-results-text="Sin resultados">
                                </select>
                            </div>

                            <div class="col-4">
                                <label class="text-input-form div-spacing text-input-rem">Tipo de
                                    contrataci&oacuten</label><label class="text-required">*</label>
                                <fieldset disabled>
                                    <input type="text" class="form-control" id="tipo_contratacion_mx"
                                        placeholder="Tipo de contratación" maxlength="18" disable>
                                </fieldset>
                            </div>

                            <div class="col-4">
                                <label class="text-input-form div-spacing text-input-rem">Centro de
                                    trabajo</label><label class="text-required">*</label>
                                <fieldset disabled>
                                    <input type="text" class="form-control" id="centro_trabajo_mx"
                                        placeholder="Centro de trabajo" maxlength="18" disable>
                                </fieldset>
                            </div>

                        </div>

                        <div class="div-spacing"></div>
                        <div class="row">
                            <div class="col-4">
                                <label class="text-input-form div-spacing text-input-rem">Fecha de inicio</label><label
                                    class="text-required">*</label>
                                <input type="date" class="form-control" id="fecha_inicio" placeholder="" maxlength="18">
                            </div>
                            <div class="col-4">
                                <label class="text-input-form div-spacing text-input-rem">Fecha de termino</label><label
                                    class="text-required"></label>
                                <input type="date" type="number" class="form-control" id="fecha_termino"
                                    placeholder="Cuenta clabe" maxlength="18">
                            </div>
                            <div class="col-4">
                                <label class="text-input-form div-spacing text-input-rem">Caracter
                                    nombramiento</label><label class="text-required">*</label>
                                <div class="custom-select-wrapper">
                                    <select class="form-control" aria-label="Default select example"
                                        id="id_cat_caracter_nom_hraes" required>
                                    </select>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            <label class="text-input-form div-spacing text-input-rem">Motivo</label><label
                                class="text-required"></label>
                            <input type="text" class="form-control" id="motivo_estatus" placeholder="Motivo"
                                maxlength="20" disable>
                        </div>
                        <div class="col-8">
                            <label class="text-input-form div-spacing text-input-rem">Observaciones</label><label
                                class="text-required"></label>
                            <input type="text" class="form-control" id="observaciones" placeholder="Observaciones"
                                maxlength="50" disable>
                        </div>
                    </div>
                </div>
            </div>


            <div class="div-spacing"></div>
            <div class="modal-footer">
                <button onclick="salirAgregarEditarMovimiento();" type="button" class="btn btn-secondary"
                    data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                <button type="button" class="btn btn-success save-botton-modal" onclick="return validarMovimiento();"><i
                        class="fas fa-save"></i> Guardar</button>
                <input type="hidden" id="id_object">
            </div>

        </div>
    </div>
</div>