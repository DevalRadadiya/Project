
<?php

include("connection.php");
if (!empty($_POST["edname"])) {
  $deptid = $_POST["edname"];
  $sql = "SELECT * FROM `apt_details` WHERE `house_number` = $deptid";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  echo json_encode($row);
} ?>
    