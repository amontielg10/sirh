<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_editar_modal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header background-modal">
                <h5 class="modal-title text-modal-tittle"><label id="titulo_plazas" claa="text-modal-tittle"></label>
                    Plaza.</h5>
            </div>

            <div class="div-spacing"></div>
            <div class="card-body">
                <div class="container">

                    <div class="row">
                        <div class="col-6">
                            <label class="text-input-form div-spacing">Tipo de plaza</label><label
                                class="text-required">*</label>
                            <div class="custom-select-wrapper">
                                <select class="form-control" aria-label="Default select example" id="id_cat_plazas"
                                    required>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="text-input-form div-spacing">Tipo de contrataci&oacuten</label><label
                                class="text-required">*</label>
                            <div class="custom-select-wrapper">
                                <select class="form-control" aria-label="Default select example"
                                    id="id_cat_tipo_contratacion_hraes" required>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="div-spacing"></div>
                    <div class="row">
                        <div class="col-6">
                            <label class="text-input-form div-spacing">Unidad responsable</label><label
                                class="text-required">*</label>
                            <div class="custom-select-wrapper">
                                <select class="form-control" aria-label="Default select example"
                                    id="id_cat_unidad_responsable" required>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="text-input-form div-spacing">Puesto</label><label
                                class="text-required">*</label>
                            <div class="custom-select-wrapper">
                                <select class="form-control" aria-label="Default select example"
                                    id="id_cat_puesto_hraes" required>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="div-spacing"></div>
                    <div class="row">
                        <div class="col-6">
                            <label class="text-input-form div-spacing">Zonas tabuladores</label><label
                                class="text-required">*</label>
                            <div class="custom-select-wrapper">
                                <select class="form-control" aria-label="Default select example"
                                    id="id_cat_zonas_tabuladores_hraes" required>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="text-input-form div-spacing">Niveles</label><label
                                class="text-required">*</label>
                            <div class="custom-select-wrapper">
                                <select class="form-control" aria-label="Default select example"
                                    id="id_cat_niveles_hraes" required>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="div-spacing"></div>
                    <div class="row">
                        <div class="col-4">
                            <label class="text-input-form div-spacing">N&uacutemero de plaza</label><label
                                class="text-required">*</label>
                            <input minlength="7" type="number" class="form-control" id="num_plaza"
                                placeholder="Número de plaza" oninput="validarNumero(this)">
                        </div>
                        <div class="col-4">
                            <label class="text-input-form div-spacing">Zona pagadora</label><label
                                class="text-required">*</label>
                            <div class="custom-select-wrapper">
                                <select class="form-control" aria-label="Default select example" id="id_tbl_zonas_pago"
                                    required>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <label class="text-input-form div-spacing">Fecha de ingreso</label><label
                                class="text-required">*</label>
                            <input type="date" class="form-control" id="fecha_ingreso_inst">
                        </div>
                    </div>

                    <div class="div-spacing"></div>
                    <div class="row">
                        <div class="col-4">
                            <label class="text-input-form div-spacing">Fecha termino de movimiento</label><label
                                class="text-required"></label>
                            <input type="date" class="form-control" id="fecha_termino_movimiento">
                        </div>
                        <div class="col-4">
                            <label class="text-input-form div-spacing">Fecha de modificaci&oacuten</label><label
                                class="text-required"></label>
                            <input type="date" class="form-control" id="fecha_modificacion">
                        </div>
                        <div class="col-4">
                            <label class="text-input-form div-spacing">Fecha inicio de movimiento</label><label
                                class="text-required"></label>
                            <input type="date" class="form-control" id="fecha_inicio_movimiento">
                        </div>
                    </div>
                </div>
            </div>

            <div class="div-spacing"></div>
            <div class="modal-footer">
                <button onclick="ocultarModal();" type="button" class="btn btn-secondary" data-dismiss="modal"><i
                        class="fas fa-times"></i> Cancelar</button>
                <button type="button" class="btn btn-success save-botton-modal" onclick="return validar();"><i
                        class="fas fa-save"></i> Guardar</button>
                <input type="hidden" id="id_object">
                <input type="hidden" id="id_tbl_centro_trabajo_hraes_aux">
            </div>

        </div>
    </div>
</div>