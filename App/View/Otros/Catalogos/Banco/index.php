<div class="card border-light">
    <div class="card-body">
        <div class="row div-spacing">
            <div class="col-9">
                <h2 class="card-title tittle-card-index">Bancos</h2>
            </div>
            <div class="col-3 search-container">
                <input onkeyup="buscarEmpleado();" id="buscar" type="text" placeholder="Buscar..."
                    class="form-control mr-sm-2 search-input">
                <span class="search-icon"><i class="fas fa-search"></i></span>
            </div>
        </div>

        <div class="row div-spacing">
            <div class="col-9">
                <div class="form-inline">
                    <button onclick="agregarEditarFalta(null)" class="btn btn-light"><i
                            class="fa fa-plus icon-size-add"></i>
                        <span class="hide-menu text-button-add font-size-modulo">&nbsp;Agregar falta</span>
                    </button>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col">
                <div class="text-center">
                    <table class="table table-bordered" id="tabla_empleados" style="width:100%">
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="table-right">
                    <button onclick="anteriorValor()" class="btn btn-light"><i class="fa fa-angle-double-left"></i>
                        <span class="hide-menu" style="font-weight: bold;"></span>
                    </button>
                    <label id="idEmpleadotable">1</label>
                    <button onclick="siguienteValor()" class="btn btn-light"><i class="fa fa-angle-double-right"></i>
                        <span class="hide-menu" style="font-weight: bold;"></span>
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>