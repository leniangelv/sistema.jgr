<div class="container-fluid">
  <div class="row">
    <h2 class='text-center col-12'>Lista de Cédulas</h2>
    <a href="agregar.php" class='mx-auto'>Agregar</a>
  </div>

  <div class="container">
    <div class="row">
      <?php if ($user->role_id == 1): ?>
        <table class='table table-sm table-bordered mt-3 text-center table-striped'>
          <thead class='thead-dark'>
            <tr class='bg-dark'>
              <td><strong class='text-white'>Cédula</strong></td>
              <td><strong class='text-white'>Usuario</strong></td>
              <td><strong class='text-white'>Estado</strong></td>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($cis as $ci): ?>
            <tr>
              <td><?php echo $ci->ci ?></td>
              <td><?php echo $ci->name ?></td>
              <td><?php echo $ci->status ?></td>
              <!-- <td>
                <form action="" method="post">
                  <input type="hidden" name="id" value="<?php echo $r->id ?>">
                  <input type="submit" name="submit_block_id" value="Bloquear" class="btn-block">
                </form>
                <form action="" method="post">
                  <input type="hidden" name="id" value="<?php echo $r->id ?>">
                  <input type="submit" name="submit_delete_id" value="Eliminar" class="btn-delete-table">
                </form>
              </td>-->
            </tr>
          <?php endforeach; ?>
        </tbody>
        </table>
      <?php else: ?>
        <?php header("location:../panel.php"); ?>
      <?php endif; ?>
    </div>
  </div>

</div>
