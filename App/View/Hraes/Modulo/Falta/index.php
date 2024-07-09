<div class="row font-size-modulo">
    <div class="col-9">
        <div class="form-inline">
            <div class="btn-group">
                <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false"><i class="fa fa-plus icono-pequeno-tabla"></i>
                    <span class="hide-menu text-button-add">&nbsp;Ver más</span>
                </button>
                <div class="dropdown-menu">
                    <button onclick="agregarEditarFalta(null)" class="dropdown-item btn btn-light"><i
                            class="fa fa-plus icon-edit-table"></i>&nbsp;
                        Agregar falta</button>
                    <button onclick="" class="dropdown-item btn btn-light"><i
                            class="fa fa-upload icon-edit-table"></i>&nbsp;
                        Carga masiva</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-3 search-container">
        <input onkeyup="buscarFalta();" id="buscar_fa" type="text" placeholder="Buscar..."
            class="form-control mr-sm-2 search-input-small">
        <span class="search-icon"><i class="fas fa-search"></i></span>
    </div>
</div>

<br>
<div class="row">
    <div class="col">
        <div class="text-center">
            <table class="table table-bordered" id="tabla_falta" style="width:100%">
            </table>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="table-right">
            <button onclick="anteriorValor_fa()" class="btn btn-light"><i class="fa fa-angle-double-left"></i>
                <span class="hide-menu" style="font-weight: bold;"></span>
            </button>
            <label id="idtable_fa">1</label>
            <button onclick="siguienteValor_fa()" class="btn btn-light"><i class="fa fa-angle-double-right"></i>
                <span class="hide-menu" style="font-weight: bold;"></span>
            </button>
        </div>
    </div>
</div>

<?php include 'AgregarEditar.php' ?>