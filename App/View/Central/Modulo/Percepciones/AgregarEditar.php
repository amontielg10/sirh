<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_editar_percepcion">
    <div class="modal-dialog modal-lg modal-dialog-centered" style="max-width: 700px;">
        <div class="modal-content">
            <div class="modal-header background-modal">
                <div class="container">
                    <div class="row">
                        <div class="col-2">
                            <img src="../../../../assets/sirh/logo_monedas.png"
                                style="max-width: 350%;margin-top: 20px;">
                        </div>
                        <div class="col-10">
                            <h1 class="text-tittle-card"><label id="titulo_percepcion"></label>
                                percepci&oacuten.
                            </h1>
                            <p class="color-text-white">Este espacio está destinado para agregar o modificar el idioma
                                del empleado.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="div-spacing"></div>
            <div class="card-body">
                <div class="container">
                    <div class="row mx-1">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="campo" class="form-label input-text-form text-input-rem">Seleccione
                                        una concepto</label>
                                    <label class="text-required">*</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <select class="form-control custom-select selectpicker"
                                        data-style="input-select-selectpicker" aria-label="Default select example"
                                        data-live-search="true" id="id_cat_concepto"
                                        data-none-results-text="Sin resultados">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="campo" class="form-label input-text-form text-input-rem">Seleccione
                                        una valor</label>
                                    <label class="text-required">*</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <select class="form-control custom-select selectpicker"
                                        data-style="input-select-selectpicker" aria-label="Default select example"
                                        data-live-search="true" id="id_cat_valores"
                                        data-none-results-text="Sin resultados">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="div-spacing"></div>
            <div class="modal-footer">
                <button onclick="salirAgregarEditarPercepciones();" type="button" class="btn btn-secondary"
                    data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                <button type="button" class="btn btn-success save-botton-modal" onclick="return validarPercepcion();"><i
                        class="fas fa-save"></i> Guardar</button>
                <input type="hidden" id="id_object">
            </div>
        </div>
    </div>
</div>

<!--
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_editar_percepcion">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header background-modal">
                <h5 class="modal-title text-modal-tittle"><label id="titulo_percepcion"
                        class="text-modal-tittle"></label> percepci&oacuten</h5>
            </div>

            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <label class="text-input-form div-spacing text-input-rem">Seleccione un
                                concepto</label><label class="text-required">*</label>
                            <div class="custom-select-wrapper">
                                <select class="form-control" aria-label="Default select example" id="id_cat_concepto"
                                    required onchange="handleChange(event)">
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="text-input-form div-spacing text-input-rem">Seleccione un valor</label><label
                                class="text-required">*</label>
                            <div class="custom-select-wrapper">
                                <select class="form-control" aria-label="Default select example" id="id_cat_valores">
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="div-spacing"></div>
            <div class="modal-footer">
                <button onclick="salirAgregarEditarPercepciones();" type="button" class="btn btn-secondary"
                    data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                <button type="button" class="btn btn-success save-botton-modal" onclick="return validarPercepcion();"><i
                        class="fas fa-save"></i> Guardar</button>
                <input type="hidden" id="id_object">
            </div>

            <!--
            <div class="card-body">
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label>Seleccione un concepto</label><label style="color:red">*</label>
                        <select class="form-control" aria-label="Default select example" id="id_cat_concepto" required
                            onchange="handleChange(event)">
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Seleccione un valor</label><label style="color:red">*</label>
                        <select class="form-control" aria-label="Default select example" id="id_cat_valores">
                        </select>
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" data-dismiss="modal" onclick="salirAgregarEditarPercepciones();"
                    class="btn btn-light boton-con-imagen_table"><img src="../../../../assets/icons/cancelar.png"
                        alt="Imagen del botón">Cancelar</button>
                <button type="button" onclick="return validarPercepcion();"
                    class="btn btn-light boton-con-imagen_table color-butto-modulo"><img
                        src="../../../../assets/icons/guardar.png" alt="Imagen del botón">Guardar</button>
                <input type="hidden" id="id_object">
            </div>


        </div>
    </div>
</div>
-->