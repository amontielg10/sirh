<div class="row">
    <div class="col-2">
        <div class="form-inline">
            <button onclick="agregarEditarMovimiento(null)" class="btn btn-light"><i class="fas fa-plus"></i>
                <span class="hide-menu" style="font-weight: bold;">&nbsp;Agregar</span>
            </button>
        </div>
    </div>
    <div class="col-10">
        <input class="form-control mr-sm-2" type="search" placeholder="Buscar..." id="buscar_mv_text"
            onkeyup="buscarFormaPago();" aria-label="Search">
    </div>
</div>
<p></p>


<table class="table table-sm" id="tabla_movimientos" style="width:100%">
</table>
<div class="position-absolute top-50 start-50">
    <button onclick="anteriorValor_mv()" class="btn btn-light"><i class="fa fa-angle-double-left"></i>
        <span class="hide-menu" style="font-weight: bold;"></span>
    </button>
    <label id="idtable_mv">1</label>
    <button onclick="siguienteValor_mv()" class="btn btn-light"><i class="fa fa-angle-double-right"></i>
        <span class="hide-menu" style="font-weight: bold;"></span>
    </button>
</div>
<br>

<?php include 'AgregarEditar.php' ?>