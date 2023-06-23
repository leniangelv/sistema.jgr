<div class="container">
  <div class="row">
    <?php foreach ($result as $key): ?>
      <div class="col-12 col-md-6 card px-0">
        <?php if ($key->type == 'image/png' || $key->type == 'image/jpg' || $key->type == 'image/jpeg' || $key->type == 'image/gif'): ?>
          <div class="card-header text-center center">
            <img src="<?php echo $root . $key->url ?>" alt="<?php echo $key->title ?>" class="img-card" style='object-fit:cover;height:200px;'>
          </div>
        <?php endif; ?>
        <div class="card-body">
          <h3 class="text-center mb-3"><?php echo $key->title ?></h3>
          <p class="text-center text-muted"><?php echo $key->description ?></p>
        </div>
        <div class="card-footer text-center">
          <span><?php echo $key->date_save ?></span>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
