<!DOCTYPE html>
<html lang="es">

<head>
  <title>Clases</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <?php
    require_once("clases3.php");
    $luis = new PersonaEspaña();
    $luis->setNombre("Luis Miguel");
    $luis->setApellidos("Cabezas", "Granado");
    if ($luis::comprobarDni("04510533A")) {
      $luis->setDni("04510533A");
    }
    ?>
    <h1>
      Datos de <?= $luis->getNombre() . " " . $luis->getApellidos(); ?>
    </h1>
    <h2>
      DNI <?= $luis->getDni()  ?>
    </h2>
  </div>
</body>

</html>