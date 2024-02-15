<?php include("../../validar_rol.php") ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <script src="../../js/usuario/usuarioAgregar.js"></script>
</head>

<body>
    <?php include("../nav-menu.php") ?>
    
    <div id="main-wrapper">

        <div class="page-wrapper" style="background-color: #f6f6f6;">

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h2 class="page-title">Agregar Usuario</h2>
                        <div class="d-flex align-items-center">
                            <br>
                        </div>
                    </div>


                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="usuario.php">Control Usuarios</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Agregar Usuario</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <h5 class="card-header">Agregar</h5>
                    <div class="card-body">
                        <form method="POST" action="../../php/usuario/agregarUsuario.php">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Nick*</label>
                                    <input type="text" onkeyup="validarCaracteresNick();" class="form-control"
                                        id="nickA" name="nickA" placeholder="Nick">
                                    <input readonly
                                        style="width : 400px; background-color:transparent; border:0; font-size: 12px; color:red;"
                                        id="rnickA">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Nombre*</label>
                                    <input onkeyup="validarCaracteresNombre();" id="nombreA" name="nombreA" type="text"
                                        class="form-control" placeholder="Nombre">
                                    <input readonly
                                        style="width : 400px; background-color:transparent; border:0; font-size: 12px; color:red;"
                                        id="rnombreA">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Password*</label>
                                <input id="pwA" onkeyup="validarCaracteresPW1()" name="pwA" type="password"
                                    class="form-control" placeholder="******">
                                <input readonly
                                    style="width : 400px; background-color:transparent; border:0; font-size: 12px; color:red;"
                                    id="rpwA">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Confirmar Password*</label>
                                <input id="psA2" onkeyup="validarCaracteresPW2()" name="psA2" type="password" class="form-control" placeholder="******">
                                <input readonly
                                    style="width : 400px; background-color:transparent; border:0; font-size: 12px; color:red;"
                                    id="rpsA2">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputCity">Rol*</label>
                                    <select class="form-select" aria-label="Default select example" id="rolA"
                                        name="rolA">
                                        <option value="" selected>Seleccione</option>
                                        <?php
                                        if ($roEx) {
                                            if (pg_num_rows($roEx) > 0) {
                                                while ($row1 = pg_fetch_object($roEx)) {
                                                    echo '<option value="' . $row1->id_rol . '">' . $row1->id_rol . " - " . $row1->nombre . '</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckCheckedDisabled"
                                        checked disabled>
                                    <label class="form-check-label" for="flexSwitchCheckCheckedDisabled">
                                        Estatus* Activo</label>
                                </div>

                            </div>

                            <a class="btn btn-secondary" href="usuario.php">Cancelar</a>
                            <button type="submit" onclick="return validar();" class="btn btn-primary">Guardar</button>

                        </form>
                    </div>
                </div>

            </div>

            <?php include('ajuste-menu.php') ?>
            <?php include('footer-librerias.php') ?>

</body>


<script>

    //La funcion retorna el msj con dos variables
 function mensajeDD(cadena, min, max) {
    if (cadena.length >= min && cadena.length <= max || cadena.length == 0) {
        return "";
    } else {
        return "*El campo debe contener de " + min + " a " + max + " caracteres.";
    }
}

//Validar caracteres para password 
function validarCaracteresPW1() {
    let pw1 = document.getElementById("pwA");
    let rpw1 = document.getElementById("rpwA");
    rpw1.value = mensajeDD(pw1.value, 8, 15);
}

//Validar caracteres para password 
function validarCaracteresPW2() {
    let pw2 = document.getElementById("psA2");
    let rpw2 = document.getElementById("rpsA2");
    rpw2.value = mensajeDD(pw2.value, 8, 15);
}

//Varidar caracteres para nombre
function validarCaracteresNombre() {
    let nombre = document.getElementById("nombreA"); //Se obtiene el valor de nombre
    let rnombre = document.getElementById("rnombreA"); //Se obtiene el valor de repuesta nombre
    rnombre.value = mensajeDD(nombre.value, 1, 60);
}

/**
    * Se utiliza para hacer validaciones de datos
    */
//Se obtienen los datos asi como los del mensaje
function validarCaracteresNick() {
    let rnick = document.getElementById("rnickA"); //Se obtiene el valor de msj nick
    let nick = document.getElementById("nickA"); //Se obtiene el valor de nick
    nick.value = nick.value.toUpperCase(); //La funcion convierte a mayusculas el campo nick
    rnick.value = mensajeDD(nick.value, 5, 10);
}

//La funcion retorna verdadero o falso, dependiendo la cantidad de caracterestes donde ini: num caracter mini, fin: nume= caracteres maximo y var la cadena
function tamano(valor, minimo, maximo) {
    if (valor.length >= minimo && valor.length <= maximo || valor.length == 0) {
        return false; //Retorna falso si concuerda con las caracteristicas
    } else {
        return true; // Retorna verdadero si no concuerda con las caracteristicas
    }
}

function validar() {
    //Obtenemos el valor de los datos
    let nick = document.getElementById("nickA").value; //Se obtiene el valor de nick
    let nombre = document.getElementById("nombreA").value; //Se obtiene el valor de nombre
    let pw1 = document.getElementById("pwA").value; //Se obtiene el valor de password
    let pw2 = document.getElementById("psA2").value; //Se obtiene el valor de confirm password
    let rol = document.getElementById("rolA").value; //Se obtiene el valor de rol
    let bool = false;

    if (emptyData(nick) ||
        emptyData(nombre) ||
        emptyData(pw1) ||
        emptyData(pw2) ||
        emptyData(rol)) {
        Swal.fire({
            title: "¡Campos incompletos!",
            text: "Los campos no pueden estar vacios",
            icon: "error"
        });
    } else if (tamano(nick, 5, 10) ||
            tamano(nombre, 1, 60) ||
            tamano(pw1, 8, 15) ||
            tamano(pw2, 8, 15) 
    ){
        Swal.fire({
            title: "¡Numero de caracteres!",
            text: "Verifique el numero de caracteres",
            icon: "error"
        });
    } else if (validatePwN(pw1, pw2)) {
        Swal.fire({
            title: "¡Las contrasenas no coinciden!",
            text: "Verifique que las contrasenas seas iguales",
            icon: "error"
        });
    } else {
        bool = true;
    }
    return bool;
}

// La funcion retorna verdadero o falso si el dato ingresado esta vacio
function emptyData(value) {
    if (value.trim().length === 0) {
        return true; //No tiene datos
    } else {
        return false; //Tiene datos
    }
}
//La funcion compara dos campos para saber si son iguales, retorna verdadero o falso
function validatePwN(pw1, pw2) {
    if (pw1 == pw2) {
        return false; //Pw iguales
    } else {
        return true; //Pw diferentes
    }
}


</script>


</html>