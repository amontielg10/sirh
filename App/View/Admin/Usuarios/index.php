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
                    <button onclick="agregarEditarUsuarios(null)" class="btn btn-light"><i class="fa fa-user-plus"></i>
                        <span class="hide-menu" style="font-weight: bold;">&nbsp;Agregar usuario</span>
                    </button>
                </div>
                <p></p>
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar..." id="buscarUsuario"
                    onkeyup="buscarUsuario();" aria-label="Search">
                <p></p>

                <table class="table table-striped" id="tabla_usuarios" style="width:100%">
                </table>

                <div class="position-absolute top-50 start-50">
                <button onclick="anteriorValor()" class="btn btn-light"><i class="fa fa-angle-double-left"></i>
                        <span class="hide-menu" style="font-weight: bold;"></span>
                </button>
                <label id="idUsertable">1</label>
                <button onclick="siguienteValor()" class="btn btn-light"><i class="fa fa-angle-double-right"></i>
                        <span class="hide-menu" style="font-weight: bold;"></span>
                </button>
                </div>
                <br>

                <?php include 'AgregarEditar.php' ?>

            </div>
        </div>
    </div>

    <script src="../../../../js/Admin/Usuarios/Usuarios.js"></script>
    <script src="../../../../js/Admin/Usuarios/validar.js"></script>
    <?php include ('../../footer-librerias.php') ?>
</body>
