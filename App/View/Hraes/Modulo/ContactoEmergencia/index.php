<div class="container-fluid">
    <br>
    <div class="form-inline">
        <button onclick="agregarEditarEmergencia(null)" class="btn btn-light"><i class="fas fa-plus"></i>
            <span class="hide-menu" style="font-weight: bold;">&nbsp;Agregar contacto de emergencia</span>
        </button>
        <!--
    <a type="button" href="../Empleados/index.php" class="btn btn-light" style="color:#235B4E"
                    aria-haspopup="true" aria-expanded="false"><i class="fas fa-info-circle"></i></a>
-->
    </div>
    <p></p>
    <input class="form-control mr-sm-2" type="search" placeholder="Buscar..." id="buscar_e"
        onkeyup="buscarEmergencia();" aria-label="Search">
    <p></p>
    <table class="table table-striped" id="modulo_contacto_emergencia" style="width:100%">
    </table>

    <div class="position-absolute top-50 start-50">
        <button onclick="anteriorValor_e()" class="btn btn-light"><i class="fa fa-angle-double-left"></i>
            <span class="hide-menu" style="font-weight: bold;"></span>
        </button>
        <label id="idtable_e">1</label>
        <button onclick="siguienteValor_e()" class="btn btn-light"><i class="fa fa-angle-double-right"></i>
            <span class="hide-menu" style="font-weight: bold;"></span>
        </button>
    </div>
    <br>
    <br>
    <br>

    <?php include 'agregarEditar.php' ?>
</div>