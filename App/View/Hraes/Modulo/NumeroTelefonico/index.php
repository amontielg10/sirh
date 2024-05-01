<br>
<div class="form-inline">
    <button onclick="agregarEditarTelefono(null)" class="btn btn-light"><i class="fas fa-plus"></i>
        <span class="hide-menu" style="font-weight: bold;">&nbsp;Agregar n&uacutemero telefonico</span>
    </button>
</div>
<p></p>
<input class="form-control mr-sm-2" type="search" placeholder="Buscar..." id="buscarTelefono" onkeyup="buscarTelefono();"
    aria-label="Search">
<p></p>
<table class="table table-striped" id="modulo_telefono" style="width:100%">
</table>

<?php include 'agregarEditar.php' ?>