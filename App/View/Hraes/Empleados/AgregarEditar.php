<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_editar_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background:#235B4E">
                <h5 class="modal-title" style="font-weight: bold;color:white"><label id="titulo"
                        style="font-weight: bold;color:white"></label> empleado.</h5>
                <button style="color:white" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="card-body">
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label>Nombre (s)</label><label style="color:red">*</label>
                        <input maxlength="40" type="text" class="form-control" id="nombre" placeholder="Nombre" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Apellido paterno</label><label style="color:red">*</label>
                        <input maxlength="40" type="text" class="form-control" id="primer_apellido" placeholder="Apellido paterno">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Apelldio materno</label><label style="color:red"></label>
                        <input maxlength="40" type="text" class="form-control" id="segundo_apellido" placeholder="Apellido materno">
                    </div>

                    <div class="form-group col-md-6">
                        <label>N&uacutem. de empleado</label><label style="color:red">*</label>
                        <input type="number" class="form-control" id="num_empleado" placeholder="Núm de empleado">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Rfc</label><label style="color:red">*</label>
                        <input maxlength="13" type="text" class="form-control" id="rfc" placeholder="Rfc">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Curp</label><label style="color:red">*</label>
                        <input maxlength="18" type="text" class="form-control" id="curp" placeholder="Curp">
                    </div>

                    <div class="form-group col-md-6">
                        <label>N&uacutemero de seguro social</label><label style="color:red"></label>
                        <input type="number" class="form-control" id="nss" placeholder="Número de seguro social">
                    </div>

                    <div class="form-group col-md-6">
                        <label>Pa&iacutes de nacimiento</label><label style="color:red">*</label>
                        <input maxlength="20" type="text" class="form-control" id="pais_nacimiento" placeholder="País de nacimiento">
                    </div>

                    <div class="form-group col-md-6">
                        <label>G&eacutenero</label><label style="color:red">*</label>
                        <select class="form-control" aria-label="Default select example" id="id_cat_genero" required>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Estado civil</label><label style="color:red">*</label>
                        <select class="form-control" aria-label="Default select example" id="id_cat_estado_civil" required>
                        </select>
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" style="background-color:  #235B4E; color: white" class="btn btn-primary"
                    onclick="return validar();">Guardar</button>
                <input type="hidden" id="id_object">
            </div>

        </div>
    </div>
</div>