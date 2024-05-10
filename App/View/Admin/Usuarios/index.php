<body>
    <?php include '../../nav-menu.php' ?>
    <div id="main-wrapper">
        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <h2 class="page-title">M&oacutedulo control de usuarios</h2>
                <div class="row">
                    <div class="col-5 align-self-center">

                        <div class="d-flex align-items-center">
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="../../../../index.php" style="color:#cb9f52;">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <p>Informaci&oacuten de los &uacuteltimos movimientos de usuarios.</p>
                <div class="form-inline">
                    <button onclick="agregarEditarUsuarios(null)" class="btn btn-light"><i class="fas fa-plus"></i>
                        <span class="hide-menu" style="font-weight: bold;">&nbsp;Agregar usuario</span>
                    </button>
                </div>
                <p></p>
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar..." id="buscarUsuario"
                    onkeyup="buscarUsuario();" aria-label="Search">
                <p></p>

                <table class="table table-striped" id="t-table" style="width:100%">
                </table>

                <button onclick="anteriorUsuarios()" class="btn btn-light"><i class="fa fa-angle-double-left"></i>
                        <span class="hide-menu" style="font-weight: bold;"></span>
                </button>
                <label id="idUsertable">1</label>
                <button onclick="siguienteUsuarios()" class="btn btn-light"><i class="fa fa-angle-double-right"></i>
                        <span class="hide-menu" style="font-weight: bold;"></span>
                </button>

                <?php include 'AgregarEditar.php' ?>

            </div>
        </div>
    </div>

    <script src="../../../../js/Admin/Usuarios/Usuarios.js"></script>
    <script src="../../../../js/Admin/Usuarios/validar.js"></script>
    <?php include ('../../footer-librerias.php') ?>
</body>

<script>

    var valorUsuario = 1;
    var idUsertable = document.getElementById('idUsertable');

    function siguienteUsuarios(){
        valorUsuario++;
        idUsertable.textContent = valorUsuario;
        iniciarBusqueda();
    }

    function anteriorUsuarios(){
        valorUsuario--;
        if(valorUsuario < 1){
            valorUsuario = 1;
        }
        idUsertable.textContent = valorUsuario;
        iniciarBusqueda();
    }

    function iniciarBusqueda(){
        let valorFinal = valorUsuario * 5;
        let valorAnterior = 1;
        if (valorUsuario != 0){
            valorAnterior = valorFinal - 5;
        }
        console.log(valorAnterior + ' - ' + valorFinal);
    }


</script>