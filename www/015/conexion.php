<!DOCTYPE html>
<html lang="es">

<head>
  <title>Conexión con MySQL</title>
  <meta charset="utf-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <?php
  require_once "autoloader.php";

  use Lib\BaseDatos;

  $servidor   = "mysql";
  $usuario    = "root";
  $pass       = "root";
  $base_datos = "MiBaseDeDatos";
  $conexion = new BaseDatos($servidor, $usuario, $pass, $base_datos);
  ?>
  <h1 class="position-absolute top-50 start-50 translate-middle">
    Conexión establecida.
  </h1>
</body>

</html>