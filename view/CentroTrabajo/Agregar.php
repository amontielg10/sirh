<?php include("../../php/RegimenFiscalC/listar.php") ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <?php  include("libHeader.php"); ?>
</head>

<body>
    <?php include('../nav-menu.php') ?>
    <?php include("../../php/CatRegionC/Listar.php") //Se incluye la libreria para generar las sql para el catalogo de region?> 
    <?php include("../../php/CatEstatusC/Listar.php") //Se incluye la libreria para generar las sql para el catalogo de estatus?> 

    <div id="main-wrapper">

        <div class="page-wrapper">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h2 class="page-title">Agregar Centro de Trabajo</h2>
                        <div class="d-flex align-items-center">
                            <br>
                        </div>
                    </div>


                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="Listar.php" style="color:#cb9f52;">Centro de Trabajo</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Agregar</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <h5 class="card-header">Ingresa los siguientes campos</h5>
                    <div class="card-body">
                        <form method="POST" action="../../php/CentroTrabajoC/Agregar.php">
                            <div class="form-row">
                                
                                <div class="form-group col-md-6">
                                    <label >Clave de Centro de Trabajo</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        id="clave_centro_trabajo" name="clave_centro_trabajo" placeholder="Clave de centro de trabajo" required maxlength="3">
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label >Nombre</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        id="nombre" name="nombre" placeholder="Nombre">
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label >Pais</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        id="pais" name="pais" placeholder="Mexico">
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Colonia</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        id="colonia_origen" name="colonia_origen" placeholder="Codigo Postal">
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Codigo Postal Origen</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        id="codigo_postal" name="codigo_postal" placeholder="Codigo Postal">
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Numero Exterior</label><label style="color:red">*</label>
                                    <input type="number" class="form-control"
                                        id="num_exterior" name="num_exterior" placeholder="Numero Exterior">
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Numero Interior</label><label style="color:red">*</label>
                                    <input type="number" class="form-control"
                                        id="num_interior" name="num_interior" placeholder="Numero Interior">
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Latitud</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        id="latitud" name="latitud" placeholder="Latitud">
                                </div>

                                <div class="form-group col-md-6">
                                    <label >Longitud</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        id="longitud" name="longitud" placeholder="Longitud">
                                </div>

                                <div class="form-group col-md-6">
                                    <label >id_cat_sepomex</label><label style="color:red">*</label>
                                    <input type="text" class="form-control"
                                        id="id_cat_sepomex" name="id_cat_sepomex" placeholder="Longitud">
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label for="inputCity">Region</label><label style="color:red">*</label>
                                    <select class="form-select" aria-label="Default select example" id="id_cat_region"
                                        name="id_cat_region">
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                        if ($listadoCR) {
                                            if (pg_num_rows($listadoCR) > 0) {
                                                while ($rowCR = pg_fetch_object($listadoCR)) {
                                                    echo '<option value="' . $rowCR->id_cat_region . '">' . $rowCR->clave_region .  " - "  . $rowCR->region . '</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputCity">Estatus</label><label style="color:red">*</label>
                                    <select class="form-select" aria-label="Default select example" id="id_estatus_centro"
                                        name="id_estatus_centro">
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                        if ($listadoCE) {
                                            if (pg_num_rows($listadoCE) > 0) {
                                                while ($rowCE = pg_fetch_object($listadoCE)) {
                                                    echo '<option value="' . $rowCE->id_cat_estatus . '">' . $rowCE->estatus . '</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            

                            <a class="btn btn-secondary" style="background-color: #cb9f52; border:none; outline:none; color: white;"
                                href="Listar.php">Cancelar</a>
                            <button type="submit" class="btn btn-light"
                            style="background-color: #cb9f52; border:none; outline:none; color: white;">Guardar</button>

                        </form>
                    </div>
                </div>



            </div>
            <input type="hidden" id="row" value="<?php echo htmlspecialchars($json); ?> " />
            <?php include('../../ajuste-menu.php') ?>
            <?php include('../../footer-librerias.php') ?>



</body>

<script>

    function validate() {
        console.log(validarNick());
        if (validar() && validarNick()) {
            return true;
        } else {
            return false;
        }
    }

    function validarNick() {
        let nick = document.getElementById("nickA"); //Se obtiene el valor de nick
        let bool = false;
        if (validateNick(nick.value)) {
            Swal.fire({
                title: "¡El campo Nick ya existe!",
                text: "Verifique que las contrasenas seas iguales",
                icon: "error"
            });
        } else {
            bool = true;
        }
        return bool;
    }

    //Se obtienen los datos asi como los del mensaje
    function validarCaracteresNick() {
        let rnick = document.getElementById("rnickA"); //Se obtiene el valor de msj nick
        let nick = document.getElementById("nickA"); //Se obtiene el valor de nick
        nick.value = nick.value.toUpperCase(); //La funcion convierte a mayusculas el campo nick
        if (mensajeDD(nick.value, 5, 10) === "") {
            if (validateNick(nick.value)) {
                rnick.value = "*El campo Nick ya existe";
            } else {
                rnick.value = "";
            }
        } else {
            rnick.value = mensajeDD(nick.value, 5, 10);
        }
    }

    function validateNick(nick) {
        let arrayJS = JSON.parse(document.getElementById('row').value);
        let bool = false;
        for (let i = 0; i < arrayJS.length; i++) {
            if (arrayJS[i] == nick) {
                bool = true;
                i++;
            }
        }
        return bool;
    }


</script>
<?php  include("libFooter.php"); ?>
</html>