<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Enlazar Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Enlazar FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- CSS personalizado -->
    <link href="styles.css" rel="stylesheet">
    <title>Vertical Tabs</title>

    <style>
        /* Estilos personalizados para los nav-links */
        .nav-link {
            color: #007bff;
            /* Color inicial del texto */
        }

        .nav-link.active {
            background-color: #007bff;
            /* Color de fondo al estar activo */
            color: #fff;
            /* Color del texto al estar activo */
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <div class="card">
            <div class="row no-gutters">
                <div class="col-md-2">
                    <div class="nav flex-column nav-pills" id="v-tabs-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-tabs-home-tab" data-toggle="pill" href="#v-tabs-home"
                            role="tab" aria-controls="v-tabs-home" aria-selected="true">
                            <i class="fas fa-home mr-2"></i> Home
                        </a>
                        <a class="nav-link" id="v-tabs-profile-tab" data-toggle="pill" href="#v-tabs-profile" role="tab"
                            aria-controls="v-tabs-profile" aria-selected="false">
                            <i class="fas fa-user mr-2"></i> Profile
                        </a>
                        <a class="nav-link" id="v-tabs-messages-tab" data-toggle="pill" href="#v-tabs-messages"
                            role="tab" aria-controls="v-tabs-messages" aria-selected="false">
                            <i class="fas fa-envelope mr-2"></i> Messages
                        </a>
                        <a class="nav-link" id="v-tabs-settings-tab" data-toggle="pill" href="#v-tabs-settings"
                            role="tab" aria-controls="v-tabs-settings" aria-selected="false">
                            <i class="fas fa-cog mr-2"></i> Settings
                        </a>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="tab-content" id="v-tabs-tabContent">
                        <div class="tab-pane fade show active" id="v-tabs-home" role="tabpanel"
                            aria-labelledby="v-tabs-home-tab">
                            <div class="card-body">
                                Contenido de la pestaña Home
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-tabs-profile" role="tabpanel"
                            aria-labelledby="v-tabs-profile-tab">
                            <div class="card-body">
                                Contenido de la pestaña Profile
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-tabs-messages" role="tabpanel"
                            aria-labelledby="v-tabs-messages-tab">
                            <div class="card-body">
                                Contenido de la pestaña Messages
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-tabs-settings" role="tabpanel"
                            aria-labelledby="v-tabs-settings-tab">
                            <div class="card-body">
                                Contenido de la pestaña Settings
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Enlazar jQuery, Popper.js y Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>