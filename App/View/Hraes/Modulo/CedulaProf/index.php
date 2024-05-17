<br>
<div class="form-inline">
    <button onclick="agregarEditarCedula(null)" class="btn btn-light"><i class="fas fa-plus"></i>
        <span class="hide-menu" style="font-weight: bold;">&nbsp;Agregar c&eacutedula profesional</span>
    </button>
</div>
<p></p>
<input class="form-control mr-sm-2" type="search" placeholder="Buscar..." id="buscar_c"
    onkeyup="buscarCedula();" aria-label="Search">
<p></p>

<table class="table table-striped" id="tabla_cedula" style="width:100%">
</table>

<div class="position-absolute top-50 start-50">
    <button onclick="anteriorValor_c()" class="btn btn-light"><i class="fa fa-angle-double-left"></i>
        <span class="hide-menu" style="font-weight: bold;"></span>
    </button>
    <label id="idtable_c">1</label>
    <button onclick="siguienteValor_c()" class="btn btn-light"><i class="fa fa-angle-double-right"></i>
        <span class="hide-menu" style="font-weight: bold;"></span>
    </button>
</div>
<br>
<br>
<br>

<?php include 'AgregarEditar.php' ?>