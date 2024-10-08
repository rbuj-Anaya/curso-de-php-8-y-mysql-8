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
    <h1>Formulario Completo</h1>
    <div class="col-md-12 well">
      <form role="form" id="myForm" action="arrayNuevoContacto.php" method="post">
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="contacto[nombre]" aria-describedby="nombreHelp" minLength="5" required="true">
          <div id="nombreHelp" class="form-text">Introduce el nombre completo</div>
        </div>
        <div class="mb-3">
          <label for="apellidos" class="form-label">Apellidos</label>
          <input type="apellidos" class="form-control" id="apellidos" name="contacto[apellidos]">
        </div>
        <div class="mb-3">
          <label for="correo" class="form-label">Correo electrónico</label>
          <input type="email" class="form-control" id="correo" name="contacto[correo]">
        </div>
        <div class="mb-3">
          <select id="metodoPago" class="form-select" name="metodosPago[]" multiple>
            <option selected>Selecciona método de pago</option>
            <option value="VISA">VISA</option>
            <option value="Mastercard">Mastercard</option>
            <option value="Paypal">Paypal</option>
          </select>
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="marcar" name="contacto[marcar]">
          <label class="form-check-label" for="marcar">Aceptar los términos y condiciones</label>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
    </div>
  </div>
</body>

</html>