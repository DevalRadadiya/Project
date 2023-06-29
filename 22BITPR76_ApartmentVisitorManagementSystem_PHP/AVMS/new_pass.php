<?php include('connection.php') ?>

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
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header py-3 shadow-sm rounded">
              <h4 class="text-center">Create New Pass</h4>
            </div>
            <div class="card-body">

              <form class="needs-validation" action="form_action.php" method="post" novalidate>
                <div class="form-row">
                  <div class="col-12 col-md-2 mt-sm-3 mt-md-0">
                    <label for="validationCustom01" class="f-w-600 f-18 ml-md-4">Catagory</label>
                  </div>
                  <div class="col-12 col-md-4 mb-md-3">
                    <select class="custom-select" name="catagory" required="">
                      <option value="">Select One cateagory</option>
                      <?php
                      $query = "SELECT * FROM `visitor_category` ORDER BY `category_name`";
                      $result = $conn->query($query);
                      $num = $result->num_rows;
                      if ($num > 0) {
                        while ($data = $result->fetch_array()) {
                      ?>
                          <option value="<?php echo $data['category_name']; ?>"><?php echo $data['category_name']; ?></option>
                      <?php }
                      } ?>
                    </select>
                    <div class="invalid-feedback">Pleace Select One</div>
                  </div>
                  <div class="col-12 col-md-2 mt-sm-3 mt-md-0 ">
                    <label for="validationCustom01" class="f-w-600 f-18 ml-md-4">Visitor Name</label>
                  </div>
                  <div class="col-12 col-md-4 mb-md-3">
                    <input type="text" name="visitor_name" class="form-control" id="validationCustom01" placeholder="First name" required="">
                    <div class="invalid-feedback mb-3">Pleace Enter Category Name</div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-12 col-md-2 mt-sm-3 mt-md-0 ">
                    <label for="validationCustom01" class="f-w-600 f-18 ml-md-4">Phone Number</label>
                  </div>
                  <div class="col-12 col-md-4 mb-md-3">
                    <input type="number" name="phone_number" class="form-control" id="validationCustom01" placeholder="Phone Number" required="">
                  </div>
                  <div class="col-12 col-md-2 mt-sm-3 mt-md-0 ">
                    <label for="validationCustom01" class="f-w-600 f-18 ml-md-4">Address</label>
                  </div>
                  <div class="col-12 col-md-4 mb-md-3">
                    <textarea class="form-control" name="adress" id="exampleFormControlTextarea1" placeholder="Your Adress" rows="2" required=""></textarea>
                  </div>
                </div>
                <div class="form-row  ">
                  <div class="col-12 col-md-2 mt-sm-3 mt-md-0 ">
                    <label for="validationCustom01" class="f-w-600 f-18 ml-md-4">Apartment no.</label>
                  </div>
                  <div class="col-12 col-md-4 mb-md-3">
                    <input type="text" name="apartment_number" class="form-control" id="validationCustom01" placeholder="Appartment No" required="">
                  </div>
                  <div class="col-12 col-md-2 mt-sm-3 mt-md-0">
                    <label for="validationCustom01" class="f-w-600 f-18 ml-md-4">Floor/Wing</label>
                  </div>
                  <div class="col-12 col-md-4 mb-md-3">
                    <input type="text" name="floor" class="form-control" id="validationCustom01" placeholder="Floor/Wing" required="">
                  </div>
                </div>
                <div class="form-row  ">
                  <div class="col-12 col-md-2 mt-sm-3 mt-md-0 ">
                    <label for="validationCustom01" class="f-w-600 f-18 ml-md-4">From Date</label>
                  </div>
                  <div class="col-12 col-md-4 mb-md-3">
                    <input type="date" name="from_date" class="form-control" id="validationCustom01" placeholder="Form date" required="">
                  </div>
                  
                </div>
                <div class="form-row">
                  <div class="col-12 col-md-2 mt-sm-3 mt-md-0 ">
                    <label for="validationCustom01" class="f-w-600 f-18 ml-md-4">Pass Description</label>
                  </div>
                  <div class="col-12 col-md-10 mb-md-3">
                    <textarea class="form-control" name="pass_description" id="exampleFormControlTextarea1" placeholder="Pass Description" rows="3" required=""></textarea>
                  </div>
                </div>
            </div>
            <div class="card-footer">
              <p style="text-align: center;">
                <button class="btn btn-outline-primary shadow-sm f-w-900 f-16" type="submit" name="submit_pass"><i class="bi bi-back"></i> Submit Pass</button>
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
    <!-- [ sample-page ] end -->
  </div>
  <!-- [ Main Content ] end -->
  </div>
  </div>
  <!-- [ Main Content ] end -->
  <!-- Required Js -->
  <?php include('footer_links.php'); ?>
</body>

</html>