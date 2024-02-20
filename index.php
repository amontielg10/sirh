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

                        <h1>Hola <?php echo $nombre ?> <span style="color: #2c94ea;"> @Titulo</span></h1>

                    </div>

                    <div class="col-lg-12 col-md-10 col-sm-12 text-center">

                        <h2><?php echo $nombre ?></h2>

                        

                    </div>

                    <div class="col-lg-12 col-md-10 col-sm-12 text-center"><br><br>

                        

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
            <!--
<span class="db"><img src="assets/logo/footerimss.png" alt="logo" width="100%" /></span>
-->
            <?php include('footer-librerias.php') ?>
            <?php include('footer.php') ?>


</body>



</html>