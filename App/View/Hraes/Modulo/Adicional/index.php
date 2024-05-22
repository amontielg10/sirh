
    <div class="card-body">
        <div class="form-row">

            <div class="form-group col-md-3">
                <label>Fecha de expedici&oacuten</label><label style="color:red"></label>
                <input type="date" class="form-control" id="fecha_expedicion" placeholder="">
            </div>

            <div class="form-group col-md-3">
                <label>Fecha de ingreso al gobierno federal</label><label style="color:red"></label>
                <input type="date" class="form-control" id="fecha_ingreso_gob_fed" placeholder="">
            </div>

            <div class="form-group col-md-3">
                <label>Vigencia del</label><label style="color:red"></label>
                <input type="date" class="form-control" id="vigencia_del" placeholder="">
            </div>

            <div class="form-group col-md-3">
                <label>Vigencia al</label><label style="color:red"></label>
                <input type="date" class="form-control" id="vigencia_al" placeholder="">
            </div>

            <div class="form-group col-md-2">
                <label>Antiguedad</label><label style="color:red"></label>
                <input maxlength="80" type="text" class="form-control" id="antiguedad" placeholder="Antiguedad">
            </div>

            <div class="form-group col-md-10">
                <label>Funciones</label><label style="color:red"></label>
                <input maxlength="300" type="text" class="form-control" id="funciones" placeholder="Funciones">
            </div>

        </div>

        <div class="modal-footer">
            <button type="button" style="background-color:  #235B4E; color: white" class="btn btn-primary"
                onclick="return validarAdicional();"><i class="fa fa-save"></i> Guardar</button>
            <input type="hidden" id="id_ctrl_adic_emp_hraes">
        </div>


    </div>