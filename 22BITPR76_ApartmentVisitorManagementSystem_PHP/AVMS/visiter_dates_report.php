<?php include('connection.php'); ?>

<?php
if (!isset($_SESSION['user'])) {
  header('Location: log_out.php');
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
              <h4 class="text-center">Visitor Dates Reports</h4>
            </div>
            <div class="card-body">
              <form class="needs-validation" action="visitor_report.php" method="post" novalidate>
                <div class="form-row mt-3">
                  <div class="col-md-3">
                    <label for="validationCustom01" class="f-w-600 f-18">From Date</label>
                  </div>
                  <div class="col-md-9">
                    <input type="date" class="form-control" id="validationTooltip01" name="from_date" placeholder="Gatekeeper Name" required="">
                    <div class="invalid-feedback mb-3">Pleace Enter Date</div>
                  </div>
                </div>
                <div class="form-row mt-3">
                  <div class="col-md-3">
                    <label for="validationCustom01" class="f-w-600 f-18">To Date</label>
                  </div>
                  <div class="col-md-9">
                    <input type="date" class="form-control" id="validationTooltip01" name="to_date" placeholder="Gatekeeper Phone Number" required="">
                    <div class="invalid-feedback mb-3">Pleace Enter Date</div>
                  </div>
                </div>
            </div>
            <div class="card-footer">
              <p style="text-align: center;" class="m-0 p-0">
                <button class="btn btn-outline-primary shadow-sm f-w-900 f-16" type="submit" name="submit_date"><i class="bi bi-filter-square-fill"></i> Filter</button>
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