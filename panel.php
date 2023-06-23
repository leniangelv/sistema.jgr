<?php

  // echo php_ini_loaded_file();

  session_start();

  if (!$_SESSION['user']) {
    session_abort();
    header("location:inicio.php");
  }

  // Var Create
  $name_file = 'panel.php';
  $root = '';
  $view = $root.'views/panel.view.php';
  $partials = $root.'template/partials/';
  $session = true;
  $user = $_SESSION['user'];

  // DATABASE
  require($root . 'db/conn.php');

  if (isset($_GET['pag']) && $_GET['pag'] == 'list') {
    if ($user->role_id == 1 || $user->role_id == 2) {
      $query2 = $conn->prepare("SELECT * FROM jgr_files WHERE auth = 2");
      $query2->execute();
      $result = $query2->fetchAll(PDO::FETCH_OBJ);
    }
  }

  if (isset($_POST['id_delete'])) {
    echo '1';
    $id = $_POST['id_delete'];
    $sql = "DELETE FROM jgr_files WHERE id = $id";
    $query = $conn->prepare($sql);
    $query->execute();
    header('location:panel.php');
  }

  /**
    @IF valid and charge of files (public/private);
    12/11/42
  */
  if (isset($_POST['submit_file'])) {
    $fileTmpPath = $_FILES['file']['tmp_name'];
    $fileName = $_FILES['file']['name'];
    $fileSize = $_FILES['file']['size'];
    $fileType = $_FILES['file']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    $newFileName = time() . $fileName;

    $allowedfileExtensions = array('jpg','gif','png','txt','pdf','doc','xls','docs');
    if (in_array($fileExtension, $allowedfileExtensions)) {
      $uploadFileDir = 'uploaded_files/';
      $dest_path = $uploadFileDir . $newFileName;


      $testing = move_uploaded_file($_FILES["file"]["tmp_name"], $dest_path);
      if ($testing) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $auth_id = $_POST['auth_id'];
        $sql = " INSERT INTO `jgr_files`(`title`, `description`, `url`, `type`,`creathe_by`, `auth_id`) VALUES ('$title','$description','$dest_path','$fileType','$user->id','$auth_id')";

        $query = $conn->prepare($sql);
        $query->execute();
        header("location:panel.php");
      }
    }
  }
  else {
    if ($user->role_id == 1 || $user->role_id == 2) {
      $query2 = $conn->prepare("SELECT * FROM jgr_files");
      $query2->execute();
      $result = $query2->fetchAll(PDO::FETCH_OBJ);
    }
  }

  require($partials . 'head.php');
  require($partials . 'nav.php');
  require($view);
  require($partials . 'footer.php');
 ?>
