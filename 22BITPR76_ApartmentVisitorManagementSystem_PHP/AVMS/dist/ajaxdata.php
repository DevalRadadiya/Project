
<?php

include('connection.php');



if (isset($_POST['emid'])) {
    $eid = $_POST['emid'];
    echo $query = "SELECT * FROM `apt_details` WHERE `id`= 1";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    echo json_encode($row);
}

echo $return = "welcome adfasdfadfd";




?>