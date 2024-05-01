<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_editar_cedula">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-weight: bold;color:#235B4E"><label id="tituloCedula"
                        style="font-weight: bold;color:#235B4E"></label> c&eacutedula profesional</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="salirAgregarEditarCedula();">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="card-body">
                <div class="form-row">

                    <div class="form-group col-md-12">
                        <label>C&eacutedula profesional</label><label style="color:red">*</label>
                        <input type="number" class="form-control" id="cedula_profesional" placeholder="Cédula profesional" maxlength="25">
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="salirAgregarEditarCedula();">Cancelar</button>
                <button type="button" style="background-color:  #235B4E; color: white" class="btn btn-primary"
                    onclick="return validarCedula();">Guardar</button>
                <input type="hidden" id="id_object">
            </div>

        </div>
    </div>
</div>