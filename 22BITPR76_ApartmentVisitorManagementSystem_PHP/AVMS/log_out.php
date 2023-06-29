<?php
  session_start();
  session_destroy();
  echo "<script>document.location='signin.php';</script>";
?>