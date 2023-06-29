<?php include('connection.php') ?>
<?php
if (!isset($_SESSION['user'])) {
  header('Location: log_out.php');
}
?>
<?php

if (isset($_POST['submmit_form'])) {

  $name = $_POST['name'];
  $phone_number = $_POST['phone_number'];
  $address = $_POST['address'];
  $gate_number = $_POST['gate_number'];
  $password = $_POST['password'];
  $gate_watching = $_POST['gate_watching'];

  $sql = "INSERT INTO `gatekeeper`(`name`, `phone_number`,`address`, `gate`, `password`,`roll`) VALUES ('$name','$phone_number','$address','$gate_number','$password','$gate_watching')";
  $result = $conn->query($sql);
  if ($result == TRUE) {
    echo "<script>alert('Done');</script>";
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
            <div class="card-body">
              <form class="needs-validation" action="" method="POST" novalidate>
                <div class="form-row mt-3">
                  <div class="col-md-3">
                    <label for="validationCustom01" class="f-w-600 f-18">Gatekeeper Name</label>
                  </div>
                  <div class="col-md-9">
                    <input type="text" name="name" class="form-control" id="validationTooltip01" placeholder="Gatekeeper Name" required="">
                    <div class="invalid-feedback mb-3">Pleace Enter Your Name</div>
                  </div>
                </div>
                <div class="form-row mt-3">
                  <div class="col-md-3">
                    <label for="validationCustom01" class="f-w-600 f-18">Phone Number</label>
                  </div>
                  <div class="col-md-9">
                    <input type="number" name="phone_number" class="form-control" id="validationTooltip01" placeholder="Gatekeeper Phone Number" required="">
                    <div class="invalid-feedback mb-3">Pleace Enter Phone Number</div>
                  </div>
                </div>
                <div class="form-row mt-3">
                  <div class="col-md-3">
                    <label for="validationCustom01" class="f-w-600 f-18">Address</label>
                  </div>
                  <div class="col-md-9">
                    <textarea class="form-control" name="address" id="exampleFormControlTextarea1" placeholder="Your Current Address" rows="2" required=""></textarea>
                    <div class="invalid-feedback mb-3">Please Enter Address</div>
                  </div>
                </div>
                <div class="form-row mt-3">
                  <div class="col-md-3">
                    <label for="validationCustom01" class="f-w-600 f-18">Gate No</label>
                  </div>
                  <div class="col-md-9">
                    <input type="number" name="gate_number" class="form-control" id="validationTooltip01" placeholder="Enter GateNumber" required="">
                    <div class="invalid-feedback mb-3">Please Enter Gate No.</div>
                  </div>
                </div>
                <div class="form-row mt-3">
                  <div class="col-md-3">
                    <label for="validationCustom01" class="f-w-600 f-18">Gate Watching</label>
                  </div>
                  <div class="col-md-9">
                    <select class="custom-select" name="gate_watching" required="">
                      <option value="">Please Select One</option>
                      <option value="2">IN</option>
                      <option value="3">Out</option>
                    </select>
                    <div class="invalid-feedback mb-3">Please Select One</div>
                  </div>
                </div>
                <div class="form-row mt-3">
                  <div class="col-md-3">
                    <label for="validationCustom01" class="f-w-600 f-18">Password</label>
                  </div>
                  <div class="col-md-9">
                    <input type="password" name="password" class="form-control" id="validationTooltip01" placeholder="Enter Password" required="">
                    <div class="invalid-feedback mb-3">Pleace Enter Password</div>
                  </div>
                </div>

            </div>
            <div class="card-footer">
              <p style="text-align: center;" class="m-0 p-0">
                <button class="btn btn-outline-primary shadow-sm f-w-900 f-16" type="submit" name="submmit_form"><i class="bi bi-capslock-fill"></i> Submit form </button>
              </p>
            </div>
            </form>
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
  </div>
  </div>
  <!-- Required Js -->
  <?php include('footer_links.php'); ?>
</body>

</html>