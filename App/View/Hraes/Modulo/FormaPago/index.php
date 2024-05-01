<br>
<div class="form-inline">
    <button onclick="agregarEditarFormaPago(null)" class="btn btn-light"><i class="fas fa-plus"></i>
        <span class="hide-menu" style="font-weight: bold;">&nbsp;Agregar forma de pago</span>
    </button>
</div>
<p></p>
<input class="form-control mr-sm-2" type="search" placeholder="Buscar..." id="buscarFormaPagoText"
    onkeyup="buscarFormaPago();" aria-label="Search">
<p></p>

<table class="table table-striped" id="tabla_forma_pago" style="width:100%">
</table>

<?php include 'agregarEditar.php' ?>