<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_editar_modal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header background-modal">
                <h5 class="modal-title text-modal-tittle"><label id="titulo" class="text-modal-tittle"></label>
                    empleado.</h5>
            </div>

            <div class="div-spacing"></div>
            <div class="card-body">
                <div class="container">

                    <div class="row">
                        <div class="col-6">
                            <label class="text-input-form div-spacing">Nombre</label><label
                                class="text-required">*</label>
                            <input maxlength="40" type="text" class="form-control" id="nombre" placeholder="Nombre"
                                required>
                        </div>
                        <div class="col-6">
                            <label class="text-input-form div-spacing">Apellido paterno</label><label
                                class="text-required">*</label>
                            <input maxlength="40" type="text" class="form-control" id="primer_apellido"
                                placeholder="Apellido paterno">
                        </div>
                    </div>

                    <div class="div-spacing"></div>
                    <div class="row">
                        <div class="col-6">
                            <label class="text-input-form div-spacing">Apelldio materno</label><label
                                class="text-required">*</label>
                            <input maxlength="40" type="text" class="form-control" id="segundo_apellido"
                                placeholder="Apellido materno">
                        </div>
                        <div class="col-6">
                            <label class="text-input-form div-spacing">Rfc</label><label class="text-required">*</label>
                            <input maxlength="13" type="text" class="form-control" id="rfc" placeholder="Rfc">
                        </div>
                    </div>

                    <div class="div-spacing"></div>
                    <div class="row">
                        <div class="col-6">
                            <label class="text-input-form div-spacing">Curp</label><label
                                class="text-required">*</label>
                            <input maxlength="18" type="text" class="form-control" id="curp" placeholder="Curp">
                        </div>

                        <div class="col-6">
                            <label class="text-input-form div-spacing">N&uacutem. de empleado</label><label
                                class="text-required">*</label>
                            <input type="text" class="form-control" id="num_empleado" placeholder="Núm de empleado">
                        </div>
                    </div>

                    <div class="div-spacing"></div>
                    <div class="row">
                        <div class="col-4">
                            <label class="text-input-form div-spacing">G&eacutenero</label><label
                                class="text-required">*</label>
                            <div class="custom-select-wrapper">
                                <select class="form-control" aria-label="Default select example" id="id_cat_genero"
                                    required>
                                </select>
                            </div>
                        </div>

                        <div class="col-4">
                            <label class="text-input-form div-spacing">Estado civil</label><label
                                class="text-required">*</label>
                            <div class="custom-select-wrapper">
                                <select class="form-control" aria-label="Default select example"
                                    id="id_cat_estado_civil" required>
                                </select>
                            </div>
                        </div>

                        <div class="col-4">
                            <label class="text-input-form div-spacing">Pa&iacutes de nacimiento</label><label
                                class="text-required">*</label>
                            <input maxlength="20" type="text" class="form-control" id="pais_nacimiento"
                                placeholder="País de nacimiento">
                        </div>
                    </div>

                    <div class="div-spacing"></div>
                    <div class="row">
                        <div class="col-6">
                            <label class="text-input-form div-spacing">N&uacutemero de seguro social</label><label
                                class="text-required"></label>
                            <input type="number" class="form-control" id="nss" placeholder="Número de seguro social">
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