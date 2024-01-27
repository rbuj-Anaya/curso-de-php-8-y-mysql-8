<!DOCTYPE html>
<html lang="es">

<head>
  <title>Consulta de datos con MySQL</title>
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
  <div class="container">
    <h2>Ejemplo de consulta MySQL</h2>
    <hr>
    <div class="d-grid gap-3">
      <?php
      $conexion->consulta("SELECT * FROM contactos");
      while ($fila = $conexion->extraer_registro()) {
        echo '<div class="card"><div class="card-body">';
        foreach ($fila as $campo => $valor) {
          echo "<div>$campo: $valor</div>";
        }
        echo "</div></div>";
      }
      ?>
    </div>
  </div>
</body>

</html>