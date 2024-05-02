<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_editar_contacto_emergencia">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-weight: bold;color:#235B4E"><label id="titulo"
                        style="font-weight: bold;color:#235B4E"></label> contacto de emergencia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    onclick="salirAgregarEditarEmergencia();">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="card-body">
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label>Nombre</label><label style="color:red">*</label>
                        <input type="text" class="form-control" id="nombre" placeholder="Nombre"
                            maxlength="20">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Parentesco</label><label style="color:red">*</label>
                        <input type="text" class="form-control" id="parentesco" placeholder="Parentesco"
                            maxlength="20">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Apellido paterno</label><label style="color:red">*</label>
                        <input type="text" class="form-control" id="primer_apellido" placeholder="Apellido paterno"
                            maxlength="20">
                    </div>

                    <div class="form-group col-md-6">
                        <label>N&uacutem. Telef&oacutenico</label><label style="color:red">*</label>
                        <input type="number" class="form-control" id="movil_emergencia" placeholder="Número telefónico"
                            maxlength="10">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Apellido materno</label><label style="color:red"></label>
                        <input type="text" class="form-control" id="segundo_apellido" placeholder="Apellido materno"
                            maxlength="20">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Estatus</label><label style="color:red">*</label>
                        <select class="form-control" aria-label="Default select example" id="id_cat_estatus_emergencia" required>
                        </select>
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                    onclick="salirAgregarEditarEmergencia();">Cancelar</button>
                <button type="button" style="background-color:  #235B4E; color: white" class="btn btn-primary"
                    onclick="return validarEmergencia();">Guardar</button>
                <input type="hidden" id="id_object">
            </div>

        </div>
    </div>
</div>