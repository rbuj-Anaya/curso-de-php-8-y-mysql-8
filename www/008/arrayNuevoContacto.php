<!DOCTYPE html>
<html lang="es">

<head>
  <title>Formulario Completo</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <h1>Formulario Completo</h1>
    <?php $contacto =  $_POST["contacto"]; ?>
    <div class="col-md-12 well">
      Nuevo Contacto: <?= $contacto["nombre"] . " " . $contacto["apellidos"] ?>
    </div>
    <div class="col-md-12 well">
      Correo electrónico: <?= $contacto["correo"] ?>
    </div>
    <div class="col-md-12 well">
      Métodos de Pago:
      <?php
      $metodosPago = $_POST["metodosPago"];
      foreach ($metodosPago as $metodoPago) {
        echo "[$metodoPago]";
      }
      ?>
    </div>
  </div>
</body>

</html>