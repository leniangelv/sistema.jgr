<?php if (isset($_GET['pag']) && $_GET['pag'] == 'list'): ?>
  <?php print_r($_GET['pag']); ?>
<?php else: ?>
  <div class="container-fluid">
    <?php if ($_SESSION['user']->role_id == 1): ?>
    <div class="row">
      <div class="col-4 container-fluid">
        <div class="row">
          <div class="col-12 card mb-3 mx-auto">
            <div class="card-body p-0">
              <h3 class="text-center">Cargar Archivo</h3>
              <form method="POST" enctype="multipart/form-data">
                <div class="group-input mb-1">
                  <label for="" class="text-muted">Titulo:</label>
                  <input type="text" name="title" placeholder="Titulo" class="form-control">
                </div>
                <div class="group-input mb-1">
                  <label for="" class="text-muted">Descripción:</label>
                  <input type="text" name="description" placeholder="Titulo" class="form-control">
                </div>
                <div class="group-input mb-1">
                  <label for="" class="text-muted">Tipo:</label>
                  <select class="btn btn-dark w-100" name="auth_id">
                    <option value="1" selected>Privado</option>
                    <option value="2" selected>Público</option>
                  </select>
                </div>
                <div class="group-input mb-1">
                  <label for="" class="text-muted">Archivo:</label>
                  <input type="file" name="file" class="form-control">
                </div>
                <div class="group-input">
                  <input type="submit" name="submit_file" class="btn btn-dark mt-3 w-100" value='Cargar Archivo'>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>
      <div class="
      <?php if ($_SESSION['user']->role_id != 1): ?>
        col-12 container-fluid
      <?php else: ?>
        col-12 col-md-8 container-fluid
      <?php endif; ?>">
        <div class="row">
          <?php if ($result): ?>
          <table class="table table-strped table-sm table-bordered text-center">
            <thead class="bg-dark text-white text-center">
              <tr>
                <td>Título</td>
                <td>Descripción</td>
                <td>Tipo</td>
                <td></td>
                <td>
                  <?php
                    if ($_SESSION['user']->role_id == 1) {
                      echo 'opc';
                    }
                  ?>
                </td>

              </tr>
            </thead>
            <tbody>
              <?php foreach ($result as $key): ?>
                <tr class="">
                  <td class='m-auto'><strong><?php echo $key->title ?></strong></td>
                  <td class='m-auto'><?php echo $key->description ?></td>
                  <td class='m-auto'><?php echo $key->type ?></td>
                  <td class='m-auto'>
                    <?php if ($key->type == 'image/jpg' || $key->type == 'image/png' || $key->type == 'image/jpeg' || $key->type == 'image/gif'): ?>
                      <img src="<?php echo $key->url ?>" width="60px" class='img-fluid' alt="<?php echo $key->title ?>">
                    <?php else: ?>
                      <span class="text-muted"><?php echo 'No previw' ?></span>
                    <?php endif; ?>
                  </td>
                  <td>
                  <?php if ($_SESSION['user']->role_id == 1): ?>
                    <form method="POST">
                      <input type="hidden" name="id_delete" value="<?php echo $key->id ?>">
                      <input type="submit" class="btn btn-danger" name="submit_delete_file" value="E">
                    </form>
                  <?php endif; ?>
                </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <?php else: ?>
            <div class="card mx-auto px-5">
              <div class="card-body">
                <h3><strong>No hay Archivos</strong> </h3>
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
