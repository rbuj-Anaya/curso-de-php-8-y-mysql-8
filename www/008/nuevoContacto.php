<!DOCTYPE html>
<html lang="es">

<head>
  <title>Formulario Simple</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="container">
      <h1>Formulario Simple</h1>
      <div class="col-md-12 well">
        Nombre: ( $_POST ): <?= $_POST['nombre'] ?>
      </div>
      <div class="col-md-12 well">
        Apellidos: ( $_REQUEST ): <?= $_REQUEST['apellidos'] ?>
      </div>
    </div>
  </div>
</body>

</html>