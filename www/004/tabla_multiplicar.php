<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Tabla de multiplicar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <h1>Tabla de multiplicar</h1>
    <table class="table">
      <?php
      echo "<tr>";
      echo "<th></th>";
      for ($cabecera = 1; $cabecera <= 10; $cabecera++) {
        echo "<th>";
        echo $cabecera;
        echo "</th>";
      }
      echo "</tr>";
      for ($x = 1; $x <= 10; $x++) {
        echo "<tr>";
        echo "<th>";
        echo $x;
        echo "</th>";
        for ($y = 1; $y <= 10; $y++) {
          $multiplicacion = $x * $y;
          echo "<td>";
          echo "$multiplicacion";
          echo "</td>";
        }
        echo "</tr>";
      }
      ?>
    </table>
  </div>
</body>

</html>