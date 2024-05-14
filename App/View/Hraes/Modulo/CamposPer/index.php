<br>
<div class="card">
    <div class="card-header" style="background:#235B4E">
        <h5 class="modal-title" style="font-weight: bold;color:"><label id="titulo"
                style="font-weight: bold;color:white">Campos personalizados</label></h5>
    </div>
    <div class="card-body">
        <div class="form-row">

            <div class="form-group col-md-3">
                <label>Porcentaje ahorro solidario</label><label style="color:red"></label>
                <input type="number" class="form-control" id="porcentaje_ahorro_s" placeholder="0">
            </div>

            <div class="form-group col-md-2">
                <label>D&iacuteas medio sueldo</label><label style="color:red"></label>
                <input type="number" class="form-control" id="dias_medio_sueldo" placeholder="0">
            </div>

            <div class="form-group col-md-2">
                <label>D&iacuteas sin sueldo</label><label style="color:red"></label>
                <input type="number" class="form-control" id="dias_sin_sueldo" placeholder="0">
            </div>

            <div class="form-group col-md-2">
                <label>Reintegro faltas y retardos</label><label style="color:red"></label>
                <input type="number" class="form-control" id="reintegro_faltas_retardos" placeholder="0">
            </div>

            <div class="form-group col-md-3">
                <label>Importa d&iacutea festivo</label><label style="color:red"></label>
                <input type="number" class="form-control" id="importe_festivo" placeholder="0">
            </div>

            <div class="form-group col-md-3">
                <label>Importe horas extra</label><label style="color:red"></label>
                <input type="number" class="form-control" id="importe_horas_ex" placeholder="0">
            </div>

            <div class="form-group col-md-3">
                <label>Importe prima dom&iacutenical</label><label style="color:red"></label>
                <input type="number" class="form-control" id="importe_prima_dominical"placeholder="0">
            </div>

            <div class="form-group col-md-3">
                <label>Importe descuentos indebidos</label><label style="color:red"></label>
                <input type="number" class="form-control" id="importe_descuentos_indebidos" placeholder="0">
            </div>

            <div class="form-group col-md-3">
                <label>R&eacutegimen pensionario</label><label style="color:red"></label>
                <input type="number" class="form-control" id="regimen_pen" placeholder="0">
            </div>

            <div class="form-group col-md-2">
                <label>Quinquenio</label><label style="color:red"></label>
                <input type="number" class="form-control" id="quinquenio" placeholder="0">
            </div>

            <div class="form-group col-md-2">
                <label>N&uacutem. hijos</label><label style="color:red"></label>
                <input type="number" class="form-control" id="num_hijos" placeholder="0">
            </div>

            <div class="form-group col-md-2">
                <label>Aplica juguetes</label><label style="color:red"></label>
                <input type="number" class="form-control" id="aplicar_juguetes" placeholder="0">
            </div>

            <div class="form-group col-md-2">
                <label>Apoyo a titulaci&oacuten</label><label style="color:red"></label>
                <input type="number" class="form-control" id="apoyo_titulacion" placeholder="0">
            </div>

            <div class="form-group col-md-4">
                <label>Licencia de manejo</label><label style="color:red"></label>
                <input type="number" class="form-control" id="licencia_manejo" placeholder="0">
            </div>

            <div class="form-group col-md-4">
                <label>Importe recuperaci&oacuten pagos indebidos</label><label style="color:red"></label>
                <input type="number" class="form-control" id="importe_recuperacion_pagos_indebidos" placeholder="0">
            </div>

            <div class="form-group col-md-4">
                <label>N&uacutem. d&iacuteas de jornada dominical</label><label style="color:red"></label>
                <input type="number" class="form-control" id="num_dias_jornada_dominical" placeholder="0">
            </div>

            <div class="form-group col-md-4">
                <label>N&uacutem. d&iacuteas de guardia festiva</label><label style="color:red"></label>
                <input type="number" class="form-control" id="num_dias_guardia_festiva" placeholder="0">
            </div>

            <div class="form-group col-md-4">
                <label>Porcentaje seguro de vida institucional</label><label style="color:red"></label>
                <input type="number" class="form-control" id="porcentaje_svi" placeholder="0">
            </div>

            <div class="form-group col-md-4">
                <label>D&iacuteas sanci&oacuten administrativa</label><label style="color:red"></label>
                <input type="number" class="form-control" id="dias_sansion_adma" placeholder="0">
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" style="background-color:  #235B4E; color: white" class="btn btn-primary"
                onclick="return validarCamposPers();">Guardar</button>
            <input type="hidden" id="id_ctrl_campos_pers_hraes">
        </div>


    </div>
</div>