<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Loader Animation</title>

  <style>
    .loader-wrapper {
      display: flex;
      justify-content: center;
      align-items: center;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 9999;
    }

    .loader {
      border: 4px solid rgba(255, 255, 255, 0.3);
      border-radius: 50%;
      border-top: 4px solid #ffffff;
      width: 50px;
      height: 50px;
      animation: spin 1s linear infinite;
    }

    @keyframes spin {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
      }
    }

    .content {
      display: none;
      /* Oculta el contenido hasta que se haya cargado completamente */
    }
  </style>
</head>

<body>
  <!-- Loader -->
  <div class="loader-wrapper">
    <div class="loader"></div>
  </div>

  <!-- Contenido de la página -->
  <div class="content">
    <?php
    $password = "pg2024";
    $username = "postgres";
    $dbname = "sirh";
    $host = "localhost";
    $port = "5432";
    $options = "--client_encoding=UTF8";

    try {
      $connectionDB = "host=$host port=$port dbname=$dbname user=$username password=$password options=$options";
      $connectionDBsPro = pg_pconnect($connectionDB);
      echo 'success';
    } catch (\Throwable $e) {
      echo "Error connecting to data base + " . $e;
    } ?>

    <!-- Aquí va el contenido de tu página -->
  </div>


</body>

<script>
  window.addEventListener('load', function () {
    // Oculta el loader y muestra el contenido de la página una vez que todo haya cargado
    document.querySelector('.loader-wrapper').style.display = 'none';
    document.querySelector('.content').style.display = 'block';
  });
</script>

</html>