<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nav Tabs con Iconos en Card - Bootstrap 5</title>
    <!-- CSS de Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome para iconos -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .nav-tabs {
            justify-content: center; /* Centra las pestañas horizontalmente */
        }
        .nav-link {
            background-color: #e9ecef; /* Color gris para las pestañas inactivas */
            color: #495057; /* Color del texto de las pestañas inactivas */
            border: 1px solid #dee2e6; /* Borde gris para las pestañas inactivas */
        }
        .nav-link.active {
            background-color: #28a745; /* Color verde para la pestaña activa */
            color: #ffffff; /* Color del texto de la pestaña activa */
            border-color: #28a745; /* Borde verde para la pestaña activa */
        }
        .nav-link i {
            margin-right: 8px; /* Espacio entre el icono y el texto */
        }
        .card {
            margin-top: 20px; /* Espacio superior para la card */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                            <i class="fas fa-home"></i> Home
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                            <i class="fas fa-user"></i> Profile
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
                            <i class="fas fa-envelope"></i> Contact
                        </a>
                    </li>
                </ul>
                <div class="tab-content mt-3" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h4>Contenido de Inicio</h4>
                        <p>Este es el contenido para la pestaña de inicio.</p>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h4>Contenido de Perfil</h4>
                        <p>Este es el contenido para la pestaña de perfil.</p>
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <h4>Contenido de Contacto</h4>
                        <p>Este es el contenido para la pestaña de contacto.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript de Bootstrap y dependencias -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>
</html>
