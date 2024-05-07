<br>
<div class="form-inline">
    <button onclick="agregarEditarRetardo(null)" class="btn btn-light"><i class="fas fa-plus"></i>
        <span class="hide-menu" style="font-weight: bold;">&nbsp;Agregar retardo</span>
    </button>
    <!--
    <a type="button" href="../Empleados/index.php" class="btn btn-light" style="color:#235B4E"
                    aria-haspopup="true" aria-expanded="false"><i class="fas fa-info-circle"></i></a>
-->
</div>
<p></p>
<input class="form-control mr-sm-2" type="date" placeholder="Buscar..." id="campoFecha"
    onkeyup="buscarDependiente();" aria-label="Search">
<p></p>
<table class="table table-striped" id="tabla_retardo" style="width:100%">
</table>

<?php include 'agregarEditar.php' ?>