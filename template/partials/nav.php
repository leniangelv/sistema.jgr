<header class='d-flex flex-wrap py-3 mb-5 border-bottom'>
  <nav class='navbar navbar-expand-lg navbar-dark bg-dark fixed-top'>
    <div class="container">
      <a href="<?php echo $root . 'index.php' ?>" class='navbar-brand'>Liceo Juan Germán Roscio</a>


    <ul class="navbar-nav">
      <li class='nav-item ml-4'>
        <a href='<?php echo $root . 'actividades.php' ?>'><strong class='nav-link'>Actividades</strong> </a>
      </li>
      <?php if (isset($_SESSION['user'])): ?>

        <li class='nav-item ml-4'>
          <a href='<?php echo $root . 'panel.php' ?>'><strong class='nav-link'>Panel</strong></a>
        </li>
        <?php if ($_SESSION['user']->role_id == 1): ?>
          <li class='nav-item ml-4'>
            <a href='<?php echo $root . 'ci/index.php' ?>'><strong class='nav-link'>CI</strong></a>
          </li>
        <?php endif; ?>

        <li class='nav-item ml-4'>
          <a href='<?php echo $root . 'salir.php' ?>'><strong class='nav-link'>Salir</strong> </a>
        </li>
        <?php else: ?>
          <li class='nav-item ml-4'>
            <a href='<?php echo $root . 'inicio.php' ?>'><strong class='nav-link'>Ingresar</strong> </a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </nav>
</header>
<div class=""></div>

<?php if (isset($_SESSION['msg']) && $_SESSION['msg'] != null): ?>
  <div class="alert alert-danger">
    <?php echo $_SESSION['msg']; ?>
    <?php $_SESSION['msg'] = null; ?>
  </div>
<?php endif; ?>
