<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="mostar_detalles_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-weight: bold;color:#235B4E"></label>Informaci&oacuten de la plaza
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="card-body">

                <ul class="nav nav-tabs" id="tabContent">
                    <li class="nav-item">
                        <a href="#menu_plazas-1" data-toggle="tab" style="color: black"><label
                                class="control-label">Informaci&oacuten adicional de la plaza</label></a>
                    </li>
                    <li class="nav-item">
                        <a href="#menu_plazas-2" data-toggle="tab" style="color: black"><label
                                class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Historia</label></a>
                    </li>
                </ul>
                <br>

                <!-- INICIO -->
                <div class="tab-content">
                    <div class="tab-pane active" id="menu_plazas-1">
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label style="font-weight: bold">N&uacutemero de plaza:&nbsp;&nbsp;</label><label
                                    id="num_plaza">
                                </label>
                            </div>

                            <div class="form-group col-md-6">
                                <label style="font-weight: bold">Clave centro de trabajo:&nbsp;&nbsp;</label><label
                                    id="cve_centro_trabajo">
                                </label>
                            </div>

                            <div class="form-group col-md-6">
                                <label style="font-weight: bold">Tipo de plaza:&nbsp;&nbsp;</label><label
                                    id="tipo_plaza">
                                </label>
                            </div>

                            <div class="form-group col-md-6">
                                <label style="font-weight: bold">Tipo de contrataci&oacuten:&nbsp;&nbsp;</label><label
                                    id="tipo_contratacion">
                                </label>
                            </div>

                            <div class="form-group col-md-6">
                                <label style="font-weight: bold">Entidad de centro de trabajo:&nbsp;&nbsp;</label><label
                                    id="entidad">
                                </label>
                            </div>

                            <div class="form-group col-md-6">
                                <label style="font-weight: bold">C&oacutedigo postal de centro de
                                    trabajo:&nbsp;&nbsp;</label><label id="codigo_postal">
                                </label>
                            </div>

                            <div class="form-group col-md-6">
                                <label style="font-weight: bold">Curp de empleado:&nbsp;&nbsp;</label><label id="">
                                </label>
                            </div>

                            <div class="form-group col-md-6">
                                <label style="font-weight: bold">Rfc de empleado:&nbsp;&nbsp;</label><label id="">
                                </label>
                            </div>

                            <div class="form-group col-md-8">
                                <label style="font-weight: bold">Unidad responsable de centro de
                                    trabajo:&nbsp;&nbsp;</label><label id="unidad_respo">
                                </label>
                            </div>

                            <div class="form-group col-md-8">
                                <label style="font-weight: bold">Nombre de centro de trabajo:&nbsp;&nbsp;</label><label
                                    id="nombre_centro_trabajo">
                                </label>
                            </div>

                            <div class="form-group col-md-8">
                                <label style="font-weight: bold">Nombre de empleado:&nbsp;&nbsp;</label><label id="">
                                </label>
                            </div>

                        </div>
                    </div>
                    <!-- FIN -->

                    <!-- INICIO -->
                    <div class="tab-pane" id="menu_plazas-2">
                        <h6>Historia de la plaza seleccionada</h6>
                        <table class="table table-striped" id="t-table-historia" style="width:100%">
                        </table>
                    </div>
                    <!-- FIN -->

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" style="background-color:  #235B4E; color: white" class="btn btn-primary"
                    data-dismiss="modal">Aceptar</button>
            </div>

        </div>
    </div>
</div>

<!--
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="agregar_editar_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-weight: bold;color:#235B4E"></label>Modificar usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="card-body">
                <form action="">
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label>Nombre</label><label style="color:red">*</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Rfc</label><label style="color:red">*</label>
                            <input type="text" class="form-control" id="rfc" name="rfc" placeholder="Rfc">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Apellido paterno</label><label style="color:red">*</label>
                            <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" placeholder="Apellido paterno">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Curp</label><label style="color:red">*</label>
                            <input type="text" class="form-control" id="curp" name="curp" placeholder="Curp">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Apellido materno</label><label style="color:red">*</label>
                            <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido" placeholder="Apellido materno">
                        </div>

                        <div class="form-group col-md-6">
                            <label>N&uacutemero de seguro social</label><label style="color:red">*</label>
                            <input type="text" class="form-control" id="nss" name="nss" placeholder="Número de seguro social">
                        </div>

                    </div>
                </form>
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
-->