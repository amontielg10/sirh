<div class="card">
    <div class="card-header">
        <h5 class="modal-title" style="font-weight: bold;color:"><label id="titulo"
                style="font-weight: bold;color:#235B4E"></label> n&uacutemero telef&oacutenico.</h5>
    </div>
    <div class="card-body">
        <div class="form-row">

            <div class="form-group col-md-6">
                <label>N&uacutemero telefonico</label><label style="color:red">*</label>
                <input type="text" class="form-control" id="nombre" placeholder="Nombre" required>
            </div>

            <div class="form-group col-md-6">
                <label>Estatus</label><label style="color:red">*</label>
                <input type="text" class="form-control" id="rfc" placeholder="Rfc">
            </div>
        </div>
        <div class="modal-footer">
            <button onclick="agregarEditarTelefono()" type="button" class="btn btn-secondary">Cancelar</button>
            <button type="button" style="background-color:  #235B4E; color: white" class="btn btn-primary"
                onclick="return validar();">Guardar</button>
            <input type="hidden" id="id_object">
        </div>
    </div>
</div>