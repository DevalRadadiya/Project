<?php include('connection.php') ?>

<?php
if (isset($_POST['s_gat_update_det'])) {
  $getekeeper_details = $_GET['getekeeper_details'];
  $gatekeeper_name = $_POST['gatekeeper_name'];
  $gatekeeper_phone_number = $_POST['gatekeeper_phone_number'];
  $gatekeeper_address = $_POST['gatekeeper_address'];
  $gatekeeper_gate_number = $_POST['gatekeeper_gate_number'];
  $gatekeeper_gate_watching = $_POST['gatekeeper_gate_watching'];

  $query = "UPDATE `gatekeeper` SET `name`='$gatekeeper_name', `phone_number`='$gatekeeper_phone_number',`address`='$gatekeeper_address',`gate`='$gatekeeper_gate_number',`roll`='$gatekeeper_gate_watching' WHERE `id`='$getekeeper_details'";
  $result = $conn->query($query);
  if ($result == TRUE) {

    echo "<script>
  alert('Successfully Updated');
  window.location = 'manage_gatekeeper.php';
</script>";
  }
}

if (isset($_POST['gatekeeper_update_password'])) {
  $getekeeper_details = $_GET['getekeeper_details'];
  $gatekeeper_current_password = $_POST['gatekeeper_current_password'];
  $gatekeeper_new_password = $_POST['gatekeeper_new_password'];
  $gatekeeper_conform_password = $_POST['gatekeeper_conform_password'];

  $query1 = "SELECT `password` FROM `gatekeeper` WHERE `id`='$getekeeper_details'";
  $result = $conn->query($query1);
  $num = $result->num_rows;
  if ($num > 0) {
    while ($data = $result->fetch_array()) {
      $current_password = $data['password'];
    }
  }
  if ($gatekeeper_current_password === $current_password) {
    if ($gatekeeper_new_password === $gatekeeper_conform_password) {
      $query = "UPDATE `gatekeeper` SET `password`='$gatekeeper_conform_password' WHERE `id`='$getekeeper_details'";
      $result = $conn->query($query);
      if ($result == TRUE) {
        echo "<script>alert('Successfully Updated'); window.location = 'manage_gatekeeper .php';</script>";
      }
    } else {
      echo "<script>alert('New Password And Conform Password Is Worng');</script>";
    }
  } else {
    echo "<script>alert('Current Password Is Worng');</script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>AVMS</title>
  <?php include('head_link.php'); ?>
</head>

<body class="">
  <!-- [ Pre-loader ] start -->
  <div class="loader-bg">
    <div class="loader-track">
      <div class="loader-fill"></div>
    </div>
  </div>
  <!-- [ Pre-loader ] End -->

  <!-- [ navigation menu ] start -->

  <?php include('navbar.php'); ?>

  <!-- [ navigation menu ] end -->

  <!-- [ Header ] start -->

  <?php include('header.php'); ?>

  <!-- [ Header ] end -->

  <!-- [ Main Content ] start -->
  <div class="pcoded-main-container">
    <div class="pcoded-content">
      <!-- [ breadcrumb ] start -->

      <!-- [ breadcrumb ] end -->
      <!-- [ Main Content ] start -->

      <div class="row">
        <div class="col-md-12 mb-5">
          <div class="card shadow-sm rounded">
            <div class="card-header py-3 shadow-sm rounded">
              <h4 class="text-center">Gatekeeper Details Form</h4>
            </div>
            <form class="needs-validation" action="" method="POST" novalidate>
              <div class="card-body">
                <?php
                $getekeeper_details = $_GET['getekeeper_details'];
                if (isset($_GET['getekeeper_details'])) {
                  $query = "SELECT * FROM `gatekeeper` WHERE `id`='$getekeeper_details'";
                  $result = $conn->query($query);
                  $num = $result->num_rows;
                  if ($num > 0) {
                    $number = 1;
                    while ($data = $result->fetch_array()) {
                ?>
                      <div class="form-row mt-3">
                        <div class="col-md-3">
                          <label for="validationCustom01" class="f-w-600 f-18">Gatekeeper Name</label>
                        </div>
                        <div class="col-md-9">
                          <input type="text" name="gatekeeper_name" value="<?php echo $data['name']; ?>" class="form-control" id="validationTooltip01" placeholder="Gatekeeper Name" required="">
                          <div class="invalid-feedback mb-3">Pleace Enter Your Name</div>
                        </div>
                      </div>
                      <div class="form-row mt-3">
                        <div class="col-md-3">
                          <label for="validationCustom01" class="f-w-600 f-18">Phone Number</label>
                        </div>
                        <div class="col-md-9">
                          <input type="number" name="gatekeeper_phone_number" value="<?php echo $data['phone_number']; ?>" class="form-control" id="validationTooltip01" placeholder="Gatekeeper Phone Number" required="">
                          <div class="invalid-feedback mb-3">Pleace Enter Phone Number</div>
                        </div>
                      </div>
                      <div class="form-row mt-3">
                        <div class="col-md-3">
                          <label for="validationCustom01" class="f-w-600 f-18">Address</label>
                        </div>
                        <div class="col-md-9">
                          <textarea class="form-control" name="gatekeeper_address" id="exampleFormControlTextarea1" placeholder="Your Current Address" rows="2"><?php echo $data['address']; ?></textarea>
                          <div class="invalid-feedback mb-3">Pleace Enter Address</div>
                        </div>
                      </div>
                      <div class="form-row mt-3">
                        <div class="col-md-3">
                          <label for="validationCustom01" class="f-w-600 f-18">Gate No</label>
                        </div>
                        <div class="col-md-9">
                          <input type="number" name="gatekeeper_gate_number" value="<?php echo $data['gate']; ?>" class="form-control" id="validationTooltip01" placeholder="Gate No" required="">
                          <div class="invalid-feedback mb-3">Pleace Enter Gate No</div>
                        </div>
                      </div>
                      <div class="form-row mt-3">
                        <div class="col-md-3">
                          <label for="validationCustom01" class="f-w-600 f-18">Gate Watching</label>
                        </div>
                        <div class="col-md-9">
                          <select class="custom-select" name="gatekeeper_gate_watching" value="<?php echo $data['roll']; ?>" required="">
                            <option value="2" <?php echo ($data['roll'] == "2") ? "selected" : ""; ?>>IN</option>
                            <option value="3" <?php echo ($data['roll'] == "3") ? "selected" : ""; ?>>Out</option>
                          </select>
                          <div class="invalid-feedback mb-3">Pleace Select One</div>
                        </div>
                      </div>
              </div>
              <div class="card-footer">
                <p style="text-align: center;" class="m-0 p-0">
                  <button class="btn btn-outline-primary shadow-sm f-w-900 f-16" type="submit" name="s_gat_update_det"><i class="bi bi-capslock-fill"></i> Submit form </button>
                </p>
              </div>
            </form>
      <?php
                    }
                  }
                }
      ?>
      <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
          'use strict';
          window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
              form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                  event.preventDefault();
                  event.stopPropagation();
                }
                form.classList.add('was-validated');
              }, false);
            });
          }, false);
        })();
      </script>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <form action="" method="post">
            <div class="form-row mt-3">
              <div class="col-md-3">
                <label for="validationCustom03" class="f-w-600 f-18">Current Password</label>
              </div>
              <div class="col-md-9">
                <input type="password" name="gatekeeper_current_password" class="form-control" id="validationTooltip03" placeholder="Enter Current Password" required="">
                <div class="invalid-feedback mb-3">Pleace Enter Current Password</div>
              </div>
            </div>
            <div class="form-row mt-3">
              <div class="col-md-3">
                <label for="validationCustom03" class="f-w-600 f-18">New Password</label>
              </div>
              <div class="col-md-9">
                <input type="password" name="gatekeeper_new_password" class="form-control" id="validationTooltip03" placeholder="Enter New Password" required="">
                <div class="invalid-feedback mb-3">Pleace Enter New Password</div>
              </div>
            </div>
            <div class="form-row mt-3">
              <div class="col-md-3">
                <label for="validationCustom04" class="f-w-600 f-18">Conform Password</label>
              </div>
              <div class="col-md-9">
                <input type="password" name="gatekeeper_conform_password" class="form-control" id="validationTooltip04" placeholder="Enter New Password" required="">
                <div class="invalid-feedback mb-3">Pleace Enter Condorm Password</div>
              </div>
            </div>
            <div class="card-footer mt-3">
              <p style="text-align: center;" class="m-0 p-0">
                <button class="btn btn-outline-primary shadow-sm f-w-900 f-16" type="submit" name="gatekeeper_update_password"><i class="bi bi-capslock-fill"></i> Change Password </button>
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>
  </div>
  <!-- Required Js -->
  <?php include('footer_links.php'); ?>
</body>

</html>