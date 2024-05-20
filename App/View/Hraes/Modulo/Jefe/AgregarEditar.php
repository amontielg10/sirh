<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_editar_jefe">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background:#235B4E">
                <h5 class="modal-title" style="font-weight: bold;color:white"><label id="tituloJefe"
                        style="font-weight: bold;color:white"></label> jefe inmediato.</h5>
                <button style="color:white" type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="salirAgregarEditarCedula();">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="card-body">
                <div class="form-row">

                    <div class="form-group col-md-12">
                        <label>Nombre del jefe inmediato</label><label style="color:red">*</label>
                        <input type="text" class="form-control" id="jefe_inmediato" placeholder="Jefe inmediato"  maxlength="60">
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="salirAgregarEditarCedula();"><i class="fa fa-times"></i> Cancelar</button>
                <button type="button" style="background-color:  #235B4E; color: white" class="btn btn-primary"
                    onclick="return validarJefe();"><i class="fa fa-save"></i> Guardar</button>
                <input type="hidden" id="id_object">
            </div>

        </div>
    </div>
</div>