<?php

include('connection.php');

// new_pass.php (INSERT)
if (isset($_POST['submit_pass'])) {

  $catagory = $_POST['catagory'];
  $visitor_name = $_POST['visitor_name'];
  $phone_number = $_POST['phone_number'];
  $adress = $_POST['adress'];
  $apartment_number = $_POST['apartment_number'];
  $floor = $_POST['floor'];
  $pass_description = $_POST['pass_description'];
  $from_date = $_POST['from_date'];
  $to_date = $_POST['to_date'];
  $FiveDigitRandomNumber = rand(10000, 99999);

  $newdate = date("Y-m-d", strtotime('+1 month', strtotime($from_date)));

  $query = "INSERT INTO `visitor_pass`(`passnumber`,`category_name`, `visitor_name`, `phone_number`, `address`, `apartment`, `floor`, `pass_description`, `from_date`, `to_date`) VALUES ('$FiveDigitRandomNumber','$catagory', '$visitor_name', '$phone_number', '$adress', '$apartment_number', '$floor', '$pass_description', '$from_date', '$newdate')";

  $result = $conn->query($query);
  if ($result == TRUE) {
    $_SESSION['status'] = "Data Enter Successfully";
    $_SESSION['icon'] = "success";
    header('Location: index.php');
  } else {
    echo "Not Run";
  }
}


// apartment_deatils.php  (INSERT)
if (isset($_POST['submit_apa_deatils'])) {

  $ownership_name = $_POST['ownership_name'];
  $ownership_number = $_POST['ownership_number'];
  $ownership_email = $_POST['ownership_email'];
  $ownership_house_number = $_POST['ownership_house_number'];
  $house_ownership = $_POST['house_ownership'];
}


// category.php (INSERT)
if (isset($_POST['submit_category'])) {

  $category_name = $_POST['category_name'];

  $duplicate = "SELECT `category_name` FROM `visitor_category` WHERE `category_name` = '$category_name'";
  $duplicate_result = $conn->query($duplicate);
  if ($duplicate_result->num_rows > 0) {
    $_SESSION['status'] = "Category Name Alrady Exites";
    $_SESSION['icon'] = "info";
  } else {
    $query = "INSERT INTO `visitor_category` (`category_name`) VALUES ('$category_name')";
    $result = $conn->query($query);
    if ($result == TRUE) {
      $_SESSION['status'] = "Data Enter Successfully";
      $_SESSION['icon'] = "success";
      header('Location: index.php');
    } else {
      echo "Not Run";
    }
  }
}


// new_visitor.php (INSERT)
if (isset($_POST['submit_new_visitor'])) {

  $catagory = $_POST['catagory'];
  $visitor_name = $_POST['visitor_name'];
  $phone_number = $_POST['phone_number'];
  $address = $_POST['address'];
  $apartment_number = $_POST['apartment_number'];
  $floor = $_POST['floor'];
  $whom_meet = $_POST['whom_meet'];
  $reason_meet = $_POST['reason_meet'];

  // $duplicate = "SELECT `visitor_details` FROM `apt_details` WHERE ";
  // $result = $conn->query($duplicate);
  if ($result->num_rows > 0) {
    $_SESSION['status'] = "You Details Alrady Exites";
    $_SESSION['icon'] = "info";
  } else {
    $query = "INSERT INTO `visitor_details` (`category_name`, `visitor_name`, `phone_number`, `address`, `apartment`, `floor`, `whom_to_meet`, `reason_to_meet`) VALUES ('$catagory', '$visitor_name', '$phone_number', '$address', '$apartment_number', '$floor', '$whom_meet', '$reason_meet')";
    $result = $conn->query($query);
    if ($result == TRUE) {
      $_SESSION['status'] = "Data Enter Successfully";
      $_SESSION['icon'] = "success";
      header('Location: index.php');
    } else {
      echo "Not Run";
    }
  }
}


// ownership_form.php (INSERT)
if (isset($_POST['submit_owner_form'])) {

  $ownership_name = $_POST['ownership_name'];
  $ownership_number = $_POST['ownership_number'];
  $ownership_email = $_POST['ownership_email'];
  $ownership_house_number = $_POST['ownership_house_number'];
  $ownership_floor_wing = $_POST['ownership_floor_wing'];
  $house_ownership = $_POST['house_ownership'];

  $duplicate = "SELECT `house_number` FROM `apt_details` WHERE `house_number` = '$ownership_house_number'";
  $duplicate_result = $conn->query($duplicate);
  if ($duplicate_result->num_rows > 0) {
    $_SESSION['status'] = "You Details Alrady Exites";
    $_SESSION['icon'] = "info";
  } else {
    $query = "INSERT INTO `apt_details` (`name`, `phone_number`, `email`, `house_number`,`floor_wing`, `owenership`) VALUES ('$ownership_name', '$ownership_number', '$ownership_email', '$ownership_house_number','$ownership_floor_wing', '$house_ownership')";
    $result = $conn->query($query);
    if ($result == TRUE) {
      $_SESSION['status'] = "Data Enter Successfully";
      $_SESSION['icon'] = "success";
      header('Location: index.php');
    } else {
      echo "Not Run";
    }
  }
}


// manage_ownership.php (DELETE)
if (isset($_GET['delete_owner_id'])) {
  $delete_owner_id = $_GET['delete_owner_id'];
  $query = "DELETE FROM `apt_details` WHERE `id`='$delete_owner_id'";
  $result = $conn->query($query);
  echo "<script>alert('Successfully Deleted'); window.location = 'manage_ownership.php';</script>";
}


// category.php (DELETE)
if (isset($_GET['delete_category'])) {
  $delete_category = $_GET['delete_category'];
  $query = "DELETE FROM `visitor_category` WHERE `id`='$delete_category'";
  $result = $conn->query($query);
  header('Location: category.php');
}

// manage_pass.php (DELETE)
if (isset($_GET['delete_visiter_pass'])) {
  $delete_visiter_pass = $_GET['delete_visiter_pass'];
  $query = "DELETE FROM `visitor_pass` WHERE `id`='$delete_visiter_pass'";
  $result = $conn->query($query);
  header('Location: manage_pass.php');
}


// manage_visitors.php (DELETE)
if (isset($_GET['delete_visitors_details'])) {
  $delete_visitors_details = $_GET['delete_visitors_details'];
  $query = "DELETE FROM `visitor_details` WHERE `id`='$delete_visitors_details'";
  $result = $conn->query($query);
  header('Location: manage_visitors.php');
}


// user_profile.php (UPDATE PROFILE)
if (isset($_POST['admin_update_profile'])) {
  $admin_update_profile = $_POST['admin_update_profile'];
  $admin_name = $_POST['admin_name'];
  $admin_phone_number = $_POST['admin_phone_number'];

  $query = "UPDATE `gatekeeper` SET `name`='$admin_name', `phone_number`='$admin_phone_number' WHERE `roll`='1'";
  $result = $conn->query($query);
  if ($result == TRUE) {
    echo "<script>alert('Successfully Updated'); window.location = 'user_profile.php';</script>";
  }
}


// user_profile.php (CHANGE PASSWORD) 
if (isset($_POST['admin_update_password'])) {

  $admin_current_password = $_POST['admin_current_password'];
  $admin_new_password = $_POST['admin_new_password'];
  $admin_conform_password = $_POST['admin_conform_password'];

  $query1 = "SELECT `password` FROM `gatekeeper` WHERE `roll`='1'";
  $result = $conn->query($query1);
  $num = $result->num_rows;
  if ($num > 0) {
    while ($data = $result->fetch_array()) {
      $current_password = $data['password'];
    }
  }
  if ($admin_current_password === $current_password) {
    if ($admin_new_password === $admin_conform_password) {
      $query = "UPDATE `gatekeeper` SET `password`='$admin_conform_password' WHERE `roll`='1'";
      $result = $conn->query($query);
      if ($result == TRUE) {
        echo "<script>alert('Successfully Updated'); window.location = 'user_profile.php';</script>";
      }
    } else {
      echo "<script>alert('New Password And Conform Password Is Worng'); window.location = 'user_profile.php';</script>";
    }
  } else {
    echo "<script>alert('Current Password Is Worng'); window.location = 'user_profile.php';</script>";
  }
}


// gatekeeper_deatils.php (CHANGE PASSWORD)
if (isset($_GET['cahnge_password'])) {
}


// gatekeeper_details.php (DELETE)
if (isset($_GET['delete_gatekeeper_details'])) {
  $delete_gatekeeper_details = $_GET['delete_gatekeeper_details'];
  $query = "DELETE FROM `gatekeeper` WHERE `id`='$delete_gatekeeper_details'";
  $result = $conn->query($query);
  header('Location: manage_gatekeeper.php');
}


// edit_gatekeeper_details.php (UPDATE)
if (isset($_POST['s_gat_update_det'])) {
  $update_owner_id = $_GET['update_owner_id'];
  $gatekeeper_name = $_POST['gatekeeper_name'];
  $gatekeeper_phone_number = $_POST['gatekeeper_phone_number'];
  $gatekeeper_address = $_POST['gatekeeper_address'];
  $gatekeeper_gate_number = $_POST['gatekeeper_gate_number'];
  $gatekeeper_gate_watching = $_POST['gatekeeper_gate_watching'];

  $query = "UPDATE `apt_details` SET `name`='$gatekeeper_name', `phone_number`='$gatekeeper_phone_number',`email`='$gatekeeper_address',`house_number`='$gatekeeper_gate_number',`owenership`='$gatekeeper_gate_watching' WHERE `id`='$update_owner_id'";
  $result = $conn->query($query);
  if ($result == TRUE) {

    echo "<script>alert('Successfully Updated'); window.location = 'manage_ownership.php';</script>";
  }
}
