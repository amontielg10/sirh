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
<input class="form-control mr-sm-2" type="search" placeholder="Buscar..." id="buscar_de"
    onkeyup="buscarDependiente();" aria-label="Search">
<p></p>
<table class="table table-striped" id="modulo_dependientes_economicos" style="width:100%">
</table>

<div class="position-absolute top-50 start-50">
    <button onclick="anteriorValor_de()" class="btn btn-light"><i class="fa fa-angle-double-left"></i>
        <span class="hide-menu" style="font-weight: bold;"></span>
    </button>
    <label id="idtable_de">1</label>
    <button onclick="siguienteValor_de()" class="btn btn-light"><i class="fa fa-angle-double-right"></i>
        <span class="hide-menu" style="font-weight: bold;"></span>
    </button>
</div>
<br>
<br>
<br>

<?php include 'AgregarEditar.php' ?>