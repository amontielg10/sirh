<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_editar_dependiente">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-weight: bold;color:#235B4E"><label id="titulo_dependiete"
                        style="font-weight: bold;color:#235B4E"></label> dependiente econ&oacutemico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    onclick="salirAgregarEditarDependiente();">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="card-body">
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label>Nombre</label><label style="color:red">*</label>
                        <input type="text" class="form-control" id="nombre_d" placeholder="Nombre"
                            maxlength="20">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Curp</label><label style="color:red">*</label>
                        <input type="text" class="form-control" id="curp_d" placeholder="Curp"
                            maxlength="28">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Apellido paterno</label><label style="color:red">*</label>
                        <input type="text" class="form-control" id="apellido_paterno_d" placeholder="Apellido paterno"
                            maxlength="20">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Tipo dependiente</label><label style="color:red">*</label>
                        <select class="form-control" aria-label="Default select example" id="id_cat_dependientes_economicos_d" required>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Apellido materno</label><label style="color:red">*</label>
                        <input type="text" class="form-control" id="apellido_materno_d" placeholder="Apellido materno"
                            maxlength="20">
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                    onclick="salirAgregarEditarDependiente();">Cancelar</button>
                <button type="button" style="background-color:  #235B4E; color: white" class="btn btn-primary"
                    onclick="return validarDependiente();">Guardar</button>
                <input type="hidden" id="id_object">
            </div>

        </div>
    </div>
</div>