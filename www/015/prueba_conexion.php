<!DOCTYPE html>
<html lang="es">

<head>
  <title>Conexión con MySQL</title>
  <meta charset="utf-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <?php
  $servidor = "mysql";
  $usuario = "root";
  $pass = "root";
  $base_datos = "MiBaseDeDatos";
  //Conexión al servidor de bases de datos
  $descriptor = new Mysqli($servidor, $usuario, $pass, $base_datos)
    or die("Imposible conectar");
  //Se cierra la conexión cuando terminemos
  $descriptor->close();
  ?>
  <h1 class="position-absolute top-50 start-50 translate-middle">
    Conexión establecida.
  </h1>
</body>

</html>