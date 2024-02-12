<!DOCTYPE html>

<html lang="es">

<head>

    <!-- Favicon icon -->

    <link rel="icon" type="image/png" href="assets/images/favicon.png">

</head>



<body>

    <?php include('nav-menu.php') ?>




    <div id="main-wrapper">



        <!-- ============================================================== -->

        <!-- Page wrapper  -->

        <!-- ============================================================== -->

        <div class="page-wrapper">

            <!-- ============================================================== -->

            <!-- Bread crumb and right sidebar toggle -->

            <!-- ============================================================== -->

            <div class="page-breadcrumb">

                <div class="row">

                    <div class="col-5 align-self-center">

                        <h5 class="page-title"></h5>

                        <div class="d-flex align-items-center">



                        </div>

                    </div>

                    <!-- <div class="col-7 align-self-center">

                        <div class="d-flex no-block justify-content-end align-items-center">

                            <nav aria-label="breadcrumb">

                                <ol class="breadcrumb">

                                    <li class="breadcrumb-item">

                                        <a href="index.php">Home</a>

                                    </li>

                                    <li class="breadcrumb-item active" aria-current="page">Library</li>

                                </ol>

                            </nav>

                        </div>

                    </div> -->

                </div>

            </div>

            <!-- ============================================================== -->

            <!-- End Bread crumb and right sidebar toggle -->

            <!-- ============================================================== -->

            <!-- ============================================================== -->

            <!-- Container fluid  -->

            <!-- ============================================================== -->

            <div class="container-fluid">

                <div class="row ">

                    <div class="col-lg-12 col-md-10 col-sm-12 text-center"><br><br><br>

                        <h1>BIENVENIDO AL <span style="color: #2c94ea;">PORTAL AEROPORTUARIO</span></h1>

                    </div>

                    <div class="col-lg-12 col-md-10 col-sm-12 text-center">

                        <h2><?php echo $nombre ?> <?php echo $app ?> <?php echo $apm ?></h2>

                        

                    </div>

                    <div class="col-lg-12 col-md-10 col-sm-12 text-center"><br><br>

                        <img src="assets/images/gafsa.bmp" width="75%" alt="">

                    </div>

                </div>

            </div>

            <!-- ============================================================== -->

            <!-- End Wrapper -->

            <!-- ============================================================== -->

            <!-- ============================================================== -->

            <!-- customizer Panel -->

            <!-- ============================================================== -->

            <?php include('ajuste-menu.php') ?>

            <!-- ============================================================== -->

            <!-- All Jquery -->

            <!-- ============================================================== -->

            <?php include('footer-librerias.php') ?>



</body>



</html>