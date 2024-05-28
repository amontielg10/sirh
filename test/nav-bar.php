<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIRH</title>
    <link rel="stylesheet" href="../assets/dist/css/bootstrap.min.css">

    <style>
        .nav-color-green-dad {
            background: #10312B;
            height: 60px;
        }

        .nav-color-green-son {
            background: #235B4E;
            height: 50px;
        }

        .nav-text-tittle {
            font-family: 'Montserrat Light';
            height: 45px;
            color: #DDC9A3;
        }

        .bg-image {
            background-image: url('../assets/sirh/fondo.png');
            background-size: cover;
            background-position: center;
            height: 100vh;
        }

        .navbar-nav .nav-link:hover {
            color: #BC955C;
        }

        .nav-tittle {
            margin-right: 1%;
            color: white;
            font-family: 'Montserrat Light';
        }

        .navbar-header {
            flex-grow: 1;
        }

        .wider-image {
            width: 170px;
            height: auto;
        }

        .wider-image-index {
            width: 75%;
            height: auto;
            margin: auto;
        }

        .nav-padding {
            padding: .10rem 4rem;
        }

        .navbar {
            position: relative;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            padding-top: .5rem;
            padding-bottom: .0rem;
        }

        hr {
            background-color: transparent !important;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
        }

        .button-color-index {
            background: #386B5F;
            font-family: 'Montserrat Light';
        }

        .tittle-card-index {
            font-weight: bold;
            font-family: "Arial";
            /*
            font-family:  "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
            */
        }

        .linea-horizontal {
            width: 10%;
            /* Ancho del contenedor */
            height: 8px;
            /* Grosor de la línea */
            background: linear-gradient(to right, #BC955C 33%, transparent 33%, transparent 100%);
        }
    </style>
</head>

<body>

    <nav class="navbar bg-light">
        <div class="container-fluid nav-color-green-dad mb-0 nav-padding">
            <a class="navbar-brand navbar-header" href="#">
                <img src="../assets/images/imss_bienestar.png" width="30" height="24"
                    class="d-inline-block align-text-top wider-image">
            </a>
            <h3 class="nav-tittle">IMSS-BIENESTAR</h3>
        </div>
    </nav>


    <nav class="navbar navbar-expand-lg nav-color-green-son mt-0">
        <div class="container-fluid nav-color-green-son mt-0 nav-padding">
            <a class="navbar-brand nav-text-tittle" href="#">Inicio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll nav-text-tittle"
                    style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link active nav-text-tittle" aria-current="page" href="#">Menu 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-text-tittle" href="#">Menu 2</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle nav-text-tittle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Sub-menu
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Sub-menu 1</a></li>
                            <li><a class="dropdown-item" href="#">Sub-menu 2</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Sub-menu 3</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container-fluid bg-image nav-padding">
        <br>
        <div class="card border-light">
            <div class="card-body">
                <h6>Inicio > titulo 1 > subtitulo 2</h6>
            </div>
        </div>
        <br>

        <div class="card border-light">
            <div class="card-body">
                <h3 class="card-title tittle-card-index">SISTEMA INTEGRAL DE RECURSOS HUMANOS</h3>
                <div class="linea-horizontal"></div>
                <hr>

                <div class="text-center">
                    <img src="../assets/images/bnn_imssbienestar.jpg" width="30" height="24"
                        class="d-inline-block align-text-top wider-image-index">
                </div>

                <hr>
                <div class="text-center">
                    <button type="button" class="btn btn-success btn-lg button-color-index">Accion 1</button>
                    <button type="button" class="btn btn-success btn-lg button-color-index">Accion 2</button>
                    <button type="button" class="btn btn-success btn-lg button-color-index">Accion 3</button>
                </div>
            </div>
        </div>

        <br>
        <div class="card border-light">
            <div class="card-body">
                <h6 class="tittle-card-index">¿Qué es?</h6>
                <div class="linea-horizontal"></div>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi distinctio accusantium asperiores error non, aut, beatae perspiciatis amet voluptatum voluptatibus autem, quia cumque fuga iste voluptate adipisci nisi quae aliquid.</p>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsam debitis esse nulla doloribus doloremque iusto error laboriosam laborum labore ipsa amet nostrum possimus alias perferendis numquam, consequuntur temporibus tempore culpa?</p>
            </div>
        </div>

    </div>


    <script src="../assets/dist/js/bootstrap.min.js"></script>
</body>

</html>