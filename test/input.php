<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página con Imagen de Fondo</title>
  <!-- Enlace al archivo CSS de Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Estilos personalizados -->

  <style>
    .btn-circle.btn-xl {
      width: 50px;
      height: 50px;
      padding: 3px 7px;
      border-radius: 35px;
      font-size: 18px;
      line-height: 1.33;
    }

    .btn-circle {
      width: 30px;
      height: 30px;
      padding: 6px 0px;
      border-radius: 15px;
      text-align: center;
      font-size: 12px;
      line-height: 1.42857;
    }

    .boton-con-imagen {
      background-color: transparent;
      border: none;
      padding: 0;
    }

    .boton-con-imagen img {
      width: 35px;
      /* ajusta el tamaño según lo necesites */
      height: auto;
      /* mantiene la proporción original */
    }
  </style>
</head>

<body>

</body>
<div class="panel panel-default">
  <div class="panel-heading">
    Hey Look! Those Buttons are circular!!
  </div>
  <!-- /.panel-heading -->
  <div class="panel-body">
    <h4>Normal Circle Buttons</h4>
    <button type="button" class="btn btn-default btn-circle"><i class="fa fa-check"></i>
    </button>
    <button type="button" class="btn btn-primary btn-circle"><i class="fa fa-list"></i>
    </button>
    <button type="button" class="btn btn-success btn-circle"><i class="fa fa-link"></i>
    </button>
    <button type="button" class="btn btn-info btn-circle"><i class="fa fa-check"></i>
    </button>
    <button type="button" class="btn btn-warning btn-circle"><i class="fa fa-times"></i>
    </button>
    <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-heart"></i>
    </button>
    <br>
    <br>
    <h4>Large Circle Buttons</h4>

    <button type="button" class="btn btn-default btn-circle btn-lg"><i class="fa fa-check"></i>
    </button>

    <button type="button" class="btn btn-primary btn-circle btn-lg"><i class="fa fa-list"></i>
    </button>
    <button type="button" class="btn btn-success btn-circle btn-lg"><i class="fa fa-link"></i>
    </button>
    <button type="button" class="btn btn-info btn-circle btn-lg"><i class="fa fa-check"></i>
    </button>
    <button type="button" class="btn btn-warning btn-circle btn-lg"><i class="fa fa-times"></i>
    </button>
    <button class="btn btn-success btn-circle btn-xl boton-con-imagen">
      <img src="../assets/icons/guardar.png">
    </button>


    <!--
    <button onclick="agregarEditarDetalles(null)" class=" btn btn-light boton-con-imagen" id="agregar_empleado">
      <img src="../../../../assets/icons/guardar.png" alt="Imagen del botón">
      <span class="hide-menu" style="font-weight: bold;">&nbsp;Guardar</span>
    </button>
  -->


    <br>
    <br>
    <h4>Extra Large Circle Buttons</h4>
    <button type="button" class="btn btn-default btn-circle btn-xl"><i class="fa fa-check"></i>
    </button>
    <button type="button" class="btn btn-primary btn-circle btn-xl"><i class="fa fa-list"></i>
    </button>
    <button type="button" class="btn btn-success btn-circle btn-xl"><i class="fa fa-link"></i>
    </button>
    <button type="button" class="btn btn-info btn-circle btn-xl"><i class="fa fa-check"></i>
    </button>
    <button type="button" class="btn btn-warning btn-circle btn-xl"><i class="fa fa-times"></i>
    </button>
    <button type="button" class="btn btn-danger btn-circle btn-xl"><i class="fa fa-heart"></i>
    </button>
  </div>
  <!-- /.panel-body -->
</div>

</html>