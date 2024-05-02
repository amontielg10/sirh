<br>
<div class="form-inline">
    <button onclick="agregarEditarDependiente(null)" class="btn btn-light"><i class="fas fa-plus"></i>
        <span class="hide-menu" style="font-weight: bold;">&nbsp;Agregar dependiente econ&oacutemico</span>
    </button>
    <!--
    <a type="button" href="../Empleados/index.php" class="btn btn-light" style="color:#235B4E"
                    aria-haspopup="true" aria-expanded="false"><i class="fas fa-info-circle"></i></a>
-->
</div>
<p></p>
<input class="form-control mr-sm-2" type="search" placeholder="Buscar..." id="buscarDependiente"
    onkeyup="buscarDependiente();" aria-label="Search">
<p></p>
<table class="table table-striped" id="modulo_dependientes_economicos" style="width:100%">
</table>

<?php include 'agregarEditar.php' ?>