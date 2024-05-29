<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_editar_usuario">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background:#235B4E">
                <h5 class="modal-title" style="font-weight: bold;color:white"><label id="titulo_usuario"
                        style="font-weight: bold;color:white"></label> usuario</h5>
            </div>

            <div class="linea-horizontal"></div>
            <div class="container">
                <div class="card-body">

                    <div class="row">
                        <div class="col-6">
                            <label>Nick</label><label style="color:red">*</label>
                            <input maxlength="15" type="text" class="form-control" id="nick" name="nombre"
                                placeholder="Nick" required>
                        </div>
                        <div class="col-6">
                            <label>Nombre</label><label style="color:red">*</label>
                            <input maxlength="60" type="text" class="form-control" id="nombre" name="nombre"
                                placeholder="Nombre">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6"></div>
                        <div class="col-6"></div>
                    </div>

                    <div class="row">
                        <div class="col-6"></div>
                        <div class="col-6"></div>
                    </div>

                    <div class="row">
                        <div class="col-6"></div>
                        <div class="col-6"></div>
                    </div>

                    <div class="row">
                        <div class="col-6"></div>
                        <div class="col-6"></div>
                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-6">

                        </div>

                        <div class="form-group col-md-6">

                        </div>

                        <div class="form-group col-md-6">
                            <label>Contraseña</label><label style="color:red">*</label>
                            <input maxlength="15" type="password" class="form-control" id="password" name="password"
                                placeholder="Contraseña">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Confirmar contraseña</label><label style="color:red">*</label>
                            <input maxlength="15" type="password" class="form-control" id="passwordConfirm"
                                name="passwordConfirm" placeholder="Confirmar contraseña">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Rol</label><label style="color:red">*</label>
                            <select class="form-control" aria-label="Default select example" id="id_rol" required>
                            </select>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" style="background-color:  #235B4E; color: white" class="btn btn-primary"
                        onclick="return validarUsuario();">Guardar</button>
                    <input type="hidden" id="id_object">
                </div>
            </div>


        </div>
    </div>
</div>