<?php
  session_start();
  // Var Create
  $name_filae = 'index.php';
  $root = '';
  $view = $root.'views/actividades.view.php';
  $partials = $root.'template/partials/';
  $session = false;

  // DATABASE
  require($root . 'db/conn.php');
  $query_plaint_text = "SELECT * FROM jgr_files WHERE auth_id = 2"; // STRING_QUERY
  $query = $conn->prepare($query_plaint_text); //PREPARE_QUERY
  $query->execute(); // EXECUTE_QUERY
  $result = $query->fetchAll(PDO::FETCH_OBJ);

  require($partials . 'head.php');
  require($partials . 'nav.public.php');
  require($view);
  require($partials . 'footer.php');

 ?>
