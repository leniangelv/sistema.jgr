<?php
  session_start();

  // Var Create
  $name_file = 'inicio.php';
  $view = 'views/inicio.view.php';
  $partials = 'template/partials/';
  $root = '';
  $session = false;


  if (isset($_SESSION['user'])) {
    header('location:panel.php');
  }

  // DATABASE
  require($root . 'db/conn.php');

  if (isset($_POST['submit_login'])) {
    $ci = $_POST['ci'];
    $password = $_POST['password'];
    $query_plaint_text = "SELECT * FROM jgr_ci JOIN jgr_data ON(jgr_ci.id = jgr_data.cedula_id) JOIN jgr_roles ON(jgr_data.role_id = jgr_roles.id) WHERE jgr_ci.ci LIKE '$ci'"; // STRING_QUERY
    $query = $conn->prepare($query_plaint_text); //PREPARE_QUERY
    $query->execute(); // EXECUTE_QUERY
    $result = $query->fetchAll(PDO::FETCH_OBJ); // FETCH_TO_OBJ_RESULT

    // print_r($result[0]->role_id);

    //if($result[0]->role_id == 1) {
    if ($password === $result[0]->password) {
      session_start();
      $_SESSION['user'] = $result[0];
      $_SESSION['msg'] = null;
      // die();
      header("location:panel.php");
    }
    //}

  }

  /**
    @include views
  */
  require($partials . 'head.php');
  require($partials . 'nav.php');
  require($view);
  require($partials . 'footer.php');
 ?>
