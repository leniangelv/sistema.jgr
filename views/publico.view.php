<nav class='navbar-public'>
  <a href="../index.php">Liceo J.G.R</a>
  <ul>
    <li><a href="../inicio.php">Ingresar</a></li>
  </ul>
</nav>

<div class="container-events">
  <?php foreach ($result as $r): ?>
    <div class="event-container">
      <div class="evetn-img">
        <img src="<?php echo $r->url ?>" alt="">
      </div>
      <div class="event-text">

        <h3><?php echo $r->title ?></h3>
        <span><?php echo $r->date_save ?></span>
        <p><?php echo $r->description ?></p>
      </div>
    </div>
  <?php endforeach; ?>
</div>
