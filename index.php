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


            <div class="container-fluid">

                <div class="row ">
                <div class="container">
                    <div class="col-lg-12 col-md-10 col-sm-12 text-left"><br><br><br>

                        <h1 style="font-size: 50px; font-family: arial;">Hola <?php echo $nombre ?> <span style="color: #2c94ea;"></span>
                        </h1>
                        <h2>
                            <p>Bienvenido al sistema</p>
                        </h2>
                    </div>
                </div>
                    <div class="col-lg-12 col-md-10 col-sm-12 text-center">

                        

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