<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="modal_numero_telefonico">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-weight: bold;color:#235B4E"><label id="titulo"
                        style="font-weight: bold;color:#235B4E"></label> N&uacuteumero telef&oacutenico.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="card-body">
                <div class="form-inline">
                    <button onclick="agregarEditarTelefono(null)" class="btn btn-light"><i class="fas fa-plus"></i>
                        <span class="hide-menu" style="font-weight: bold;">&nbsp;Agregar n&uacutem. telefonico</span>
                    </button>
                </div>

                <div id="agregar_editar_telefono" style="display: none">
                <br>
                    <?php include 'agregarEditar.php' ?>
                </div>

                <p></p>
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar..." id="buscar"
                    onkeyup="buscarInBd();" aria-label="Search">
                <p></p>

                <table id="example" class="table table-striped" style="width:100%">

                </table>



            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div>