<?php

  session_start();
  if (isset($_SESSION['user'])) {
    header("location:index.php");
  }

  // Var Create
  $name_filae = 'activar.php';
  $root = '../';
  $view = $root.'views/ci.activar.view.php';
  $partials = $root.'template/partials/';
  $session = false;

  // DATABASE
  require($root . 'db/conn.php');

  if (isset($_POST['submit_activar_ci'])) {
    $ci = $_POST['ci'];
    $password = $_POST['password'];
    $nacionality = $_POST['nacionality'];

    $query = $conn->prepare("SELECT jgr_ci.id AS ciid, ci, jgr_data.id AS dataid, role_id, password, email_id, status FROM jgr_ci JOIN jgr_data ON(jgr_ci.id = jgr_data.cedula_id) WHERE jgr_ci.ci LIKE '$ci'");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_OBJ);
    if ($result[0]->status != 'active') {
      $ciD = $result[0]->ciid;

      $query = $conn->prepare("UPDATE `jgr_data` SET `cedula_id`='$ciid', `password`='$password', `status`='active' WHERE `cedula_id` = $ciD");
      $t = $query->execute();


      die();
      echo $nacionality.'<br>';
      echo $ci.'<br>';


      $query2 = $conn->prepare("UPDATE `jgr_ci` SET `nacionality`='$nacionality' WHERE `ci` LIKE $ci");
      $query2->execute();
      header("location:../inicio.php");
    }
    header("location:activar.php");
  }

  require($partials . 'head.php');
  require($partials . 'nav.php');
  require($view);
  require($partials . 'footer.php');
 ?>
