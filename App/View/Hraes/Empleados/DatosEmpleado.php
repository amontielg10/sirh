<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="Datos-empleado-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-weight: bold;color:#235B4E"><label id="titulo"
                        style="font-weight: bold;color:#235B4E"></label>M&aacutes datos de empleado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="card-body">
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label>Pa&iacutes de nacimiento</label><label style="color:red">*</label>
                        <input type="text" class="form-control" id="pais_nacimiento" placeholder="País de nacimiemto" maxlength="20">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Genero</label><label style="color:red">*</label>
                        <select class="form-control" aria-label="Default select example"
                            id="id_cat_genero_hraes" required>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Estado Civil</label><label style="color:red">*</label>
                        <select class="form-control" aria-label="Default select example"
                            id="id_cat_estado_civil_hraes" required>
                        </select>
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" style="background-color:  #235B4E; color: white" class="btn btn-primary"
                    onclick="return validarDatosEmpleado();">Guardar</button>
                <input type="hidden" id="id_tbl_empleados_hraes">
                <input type="hidden" id="id_tbl_datos_empleado_hraes">
            </div>

        </div>
    </div>
</div>