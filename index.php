<?php
  // Var Create
  $name_filae = 'index.php';
  $view = 'views/index.view.php';
  $partials = 'template/partials/';
  $root = '';
  $session = false;

  // DATABASE
  require($root . 'db/conn.php');

  $query_plaint_text = "SELECT * FROM jgr_ci"; // STRING_QUERY
  $query = $conn->prepare($query_plaint_text); //PREPARE_QUERY
  $query->execute(); // EXECUTE_QUERY
  $result = $query->fetchAll(PDO::FETCH_OBJ);
  print_r($result);

  require($root . $partials . 'head.php');
  require($root . $partials . 'nav.public.php');
  require($root . $view);
  require($root . $partials . 'footer.php');
 ?>
