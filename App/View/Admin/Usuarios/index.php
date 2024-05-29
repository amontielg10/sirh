<?php
include '../../nav-menu.php';
?>


<div class="container-fluid bg-image nav-padding">
    <br>
    <div class="card border-light">
        <div class="card-body">
            <h6><span><i class="fas fa-home"></i></span> Inicio > Usuarios</h6>
        </div>
    </div>
    <br>

    <div class="card border-light">
        <div class="card-body">
            <h3 class="card-title tittle-card-index">Usuarios del sistema</h3>
            <div class="linea-horizontal"></div>
            <hr>

            <div class="row">
                <div class="col-9">
                    <div class="form-inline">
                        <button onclick="agregarEditarUsuarios(null)" class="btn btn-light"><i
                                class="fa fa-user-plus"></i>
                            <span class="hide-menu" style="font-weight: bold;">&nbsp;Agregar usuario</span>
                        </button>
                    </div>
                </div>
                <div class="col-3 search-container">
                    <input onkeyup="buscarUsuario();" id="buscarUsuario" type="text" placeholder="Buscar..."
                        class="form-control mr-sm-2 search-input">
                    <span class="search-icon"><i class="fas fa-search"></i></span>
                </div>
            </div>


            <div class="row">
                <div class="col">
                    <div class="text-center">
                        <table class="table" id="tabla_usuarios" style="width:100%">
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="" style=" float: right;">
                        <button onclick="anteriorValor()" class="btn btn-light"><i class="fa fa-angle-double-left"></i>
                            <span class="hide-menu" style="font-weight: bold;"></span>
                        </button>
                        <label id="idUsertable">1</label>
                        <button onclick="siguienteValor()" class="btn btn-light"><i
                                class="fa fa-angle-double-right"></i>
                            <span class="hide-menu" style="font-weight: bold;"></span>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include 'AgregarEditar.php' ?>
<script src="../../../../js/Admin/Usuarios/Usuarios.js"></script>
<script src="../../../../js/Admin/Usuarios/validar.js"></script>



<script src="../../../../js/Mensajes/mensajes.js"></script> 
<script src="../../../../js/Global/Curp/ValidarCurp.js"></script> 
<script src="../../../../js/Global/Mensajes/Mensajes.js"></script> 
<script src="../../../../js/Global/Seguridad/Confirmacion.js"></script> 

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../../../.././assets/libs/jquery/dist/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Bootstrap tether Core JavaScript 

<script src="../../../../assets/js/bootstrap.js"></script>
<script src="../../../../assets/js/bootstrap.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

-->
<script src="../../../.././assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="../../../.././assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- apps -->
<script src="../../../.././dist/js/app.min.js"></script>
<script src="../../../.././dist/js/app.init.light-sidebar.js"></script>
<script src="../../../.././dist/js/app-style-switcher.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="../../../.././assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="../../../.././assets/extra-libs/sparkline/sparkline.js"></script>
<!--Wave Effects -->
<script src="../../../.././dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="../../../.././dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="../../../.././dist/js/custom.min.js"></script>
<!--This page JavaScript -->
<!--chartis chart-->
<script src="../../../.././assets/libs/chartist/dist/chartist.min.js"></script>
<script src="../../../.././assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
<!--c3 charts -->
<script src="../../../.././assets/extra-libs/c3/d3.min.js"></script>
<script src="../../../.././assets/extra-libs/c3/c3.min.js"></script>
<!--chartjs -->
<script src="../../../.././assets/libs/raphael/raphael.min.js"></script>
<script src="../../../.././assets/libs/morris.js/morris.min.js"></script>

<script src="../../../.././dist/js/pages/dashboards/dashboard1.js"></script>
<script type="text/javascript" src="../../../.././assets/DataTables/datatables.min.js"></script>
<!---->
<script type="text/javascript" src="../../../.././dist/js/html2canvas.js"></script>
<script type="text/javascript" src="../../../.././dist/js/html2canvas.min.js"></script>
<!-- <script src="./dist/js/sweetalert2.all.min.js"></script> -->


<script src="../../../.././assets/libs/sweetalert2/sweet-alert.init.js"></script>


<script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>