<?php

  session_start();
  if (!$_SESSION['user']) {
    session_abort();
    header("location:activar.php");
  }


  // Var Create
  $name_filae = 'index.php';
  $root = '../';
  $view = $root.'views/ci.index.view.php';
  $partials = $root.'template/partials/';
  $session = true;
  $user = $_SESSION['user'];

  // DATABASE
  require($root . 'db/conn.php');

  // SERACRH_ALL_CIS
  $query_plaint_text = "SELECT * FROM jgr_ci JOIN jgr_data ON(jgr_ci.id = jgr_data.cedula_id)"; // STRING_QUERY
  $query = $conn->prepare($query_plaint_text); //PREPARE_QUERY
  $query->execute(); // EXECUTE_QUERY
  $cis = $query->fetchAll(PDO::FETCH_OBJ); // FETCH_TO_OBJ_RESULT

  require($partials . 'head.php');
  require($partials . 'nav.php');
  require($view);
  require($partials . 'footer.php');
 ?>
