<?php
  session_start();
  if (!$_SESSION['user']) {
    session_abort();
    header("location:activar.php");
  }

  // Var Create
  $name_filae = 'index.php';
  $root = '../';
  $view = $root.'views/ci.agregar.view.php';
  $partials = $root.'template/partials/';
  $session = true;
  $user = $_SESSION['user'];

  // DATABASE
  require($root . 'db/conn.php');

  if (isset($_POST['submit_agregar_ci'])) {
    $ci = $_POST['ci'];
    $name = $_POST['name'];

    $query_plaint_text3 = "SELECT * FROM jgr_ci WHERE ci LIKE '$ci'";
    $query3 = $conn->prepare($query_plaint_text3);
    $query3->execute(); // EXECUTE_QUERY
    $result3 = $query3->fetchAll(PDO::FETCH_OBJ); // FETCH_TO_OBJ_RESULT
    if ($result3[0]->ci) {
      $_SESSION['msg'] = 'La cédula ' . $ci . ' ya existe';
      header("location:index.php");
      return;
    }

    $query = $conn->prepare("INSERT INTO jgr_ci(ci,name) VALUES($ci,'$name')");
    $query->execute();
echo 'qlq';
    $query2 = $conn->prepare("SELECT * FROM jgr_ci WHERE ci LIKE '$ci'");
    $query2->execute(); // EXECUTE_QUERY
    $result2 = $query2->fetchAll(PDO::FETCH_OBJ); // FETCH_TO_OBJ_RESULT


    $id = $result2[0]->id;
    $query4 = $conn->prepare("INSERT INTO jgr_data(cedula_id) VALUES($id)");
    $test = $query4->execute();

    header("location:index.php");
  }

  require($partials . 'head.php');
  require($partials . 'nav.php');
  require($view);
  require($partials . 'footer.php');
 ?>
