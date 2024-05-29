<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_editar_modal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header background-modal">
                <h5 class="modal-title text-modal-tittle"><label id="titulo_centro_trabajo"
                        class="text-modal-tittle"></label> centro de trabajo.</h5>
            </div>

            <div class="div-spacing"></div>
            <div class="card-body">
                <div class="container">

                    <div class="row">
                        <div class="col-8">
                            <label class="text-input-form div-spacing">Nombre</label><label
                                class="text-required">*</label>
                            <input maxlength="30" type="text" class="form-control div-spacing" id="nombre" name="nombre"
                                placeholder="Nombre" required>
                        </div>
                        <div class="col-4">
                            <label class="text-input-form div-spacing">Clave centro de trabajo</label><label
                                class="text-required">*</label>
                            <input maxlength="10" type="text" class="form-control div-spacing" id="clave_centro_trabajo"
                                name="clave_centro_trabajo" placeholder="Clave centro de trabajo">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <label class="text-input-form div-spacing">Colonia</label><label
                                class="text-required"></label>
                            <input maxlength="30" type="text" class="form-control div-spacing" id="colonia"
                                name="colonia" placeholder="Colonia">
                        </div>
                        <div class="col-4">
                            <label class="text-input-form div-spacing">Regi&oacuten</label><label
                                class="text-required">*</label>
                            <select class="form-control div-spacing" aria-label="Default select example"
                                id="id_cat_region" required>
                            </select>
                        </div>
                        <div class="col-4">
                            <label class="text-input-form div-spacing">Estatus</label><label
                                class="text-required">*</label>
                            <select class="form-control div-spacing" aria-label="Default select example"
                                id="id_estatus_centro" required>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <label class="text-input-form div-spacing">Entidad</label><label
                                class="text-required">*</label>
                            <select class="form-control div-spacing" aria-label="Default select example"
                                id="id_cat_entidad" required>
                            </select>
                        </div>
                        <div class="col-4">
                            <label class="text-input-form div-spacing">N&uacutem. exterior</label><label
                                class="text-required"></label>
                            <input type="text" class="form-control div-spacing" id="num_exterior" name="num_exterior"
                                placeholder="Núm. exterior" maxlength="10">
                        </div>
                        <div class="col-4">
                            <label class="text-input-form div-spacing">N&uacutem. interior</label><label
                                class="text-required"></label>
                            <input type="text" class="form-control div-spacing" id="num_interior" name="num_interior"
                                placeholder="Núm. interior" maxlength="10">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <label class="text-input-form div-spacing">Latitud</label><label
                                class="text-required">*</label>
                            <input maxlength="10" type="text" class="form-control div-spacing" id="latitud"
                                name="latitud" placeholder="Latitud">
                        </div>
                        <div class="col-4">
                            <label class="text-input-form div-spacing">Longitud</label><label
                                class="text-required">*</label>
                            <input maxlength="10" type="text" class="form-control div-spacing" id="longitud"
                                name="longitud" placeholder="Longitud">
                        </div>
                        <div class="col-4">
                            <label class="text-input-form div-spacing">C&oacutedigo postal</label><label
                                class="text-required">*</label>
                            <input type="number" class="form-control div-spacing" id="codigo_postal"
                                name="codigo_postal" placeholder="Código postal">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <label class="text-input-form div-spacing">Pa&iacutes</label><label
                                class="text-required"></label>
                            <input maxlength="10" type="text" class="form-control div-spacing" id="pais" name="País"
                                placeholder="País">
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
            </div>

        </div>
    </div>
</div>