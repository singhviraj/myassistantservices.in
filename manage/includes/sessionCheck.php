<?php 
  session_start();
 if (isset($_SESSION['UserID']) == NULL OR $_SESSION['UserType']!=5) {
  echo "<script>window.location.href = 'login.php';</script>";
}
?>
