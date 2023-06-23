<?php
  session_start();
  // session_abort();
  session_unset();
  $_SESSION['user'] = null;

  header("location:index.php");

 ?>
