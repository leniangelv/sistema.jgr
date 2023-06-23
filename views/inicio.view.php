
<div class="container mt-3">
  <div class="row">
    <div class="col-12 col-md-6 card mx-auto">
      <form class="card-body" action="inicio.php" method="POST">
        <h2 class='text-center mb-5'>Ingresa tus Datos</h2>
        <div class="group-input">
          <label for="" class='lead'><b style='color:#dc2804'>*</b> Cédula:</label>
          <input type="text" name="ci" placeholder="12345678" class='form-control'>
        </div>

        <div class="container-input">
          <label for="" class='lead'><b style='color:#dc2804'>*</b> Contraseña:</label>
          <input type="password" name="password" placeholder="***********" class='form-control'>
        </div>
        <input type="submit" class='btn btn-dark my-3 w-100' name="submit_login" value="Ingresar">
        <p>
          <a href="<?php echo $root . 'ci/activar.php' ?>">Activar Cuenta</a>
        </p>
        <p class="w-75 mx-auto text-muted text-center">
          Si no tienes cuenta contacta a un Administrador de la Institución para solicitar la creación de una cuenta.
        </p>
      </form>
    </div>
  </div>
</div>
