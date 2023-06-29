
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "avms";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if(!isset($_SESSION))
{
  session_start();
}

?>