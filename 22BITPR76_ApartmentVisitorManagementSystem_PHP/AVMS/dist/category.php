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
        <div class="col-md-12 mb-5">
          <div class="card shadow-sm rounded">
            <div class="card-header py-3 shadow-sm rounded">
              <h4 class="text-center">Add Catagory</h4>
            </div>
            <div class="card-body">
              <form class="needs-validation" action="form_action.php" method="post" novalidate>
                <div class="form-row">
                  <div class="col-md-3">
                    <label for="validationCustom01" class="f-w-600 f-18">Category Name</label>
                  </div>
                  <div class="col-md-9 mt-0">
                    <input type="text" class="form-control" name="category_name" id="validationTooltip01" placeholder="Category Name" required="">
                    <div class="invalid-feedback mb-3">Pleace Enter Category Name</div>
                  </div>
                </div>
                <div class="card-footer m-3">
                  <p style="text-align: center;" class="m-0 p-0">
                    <button class="btn btn-outline-primary shadow-sm f-w-900 f-16" type="submit" name="submit_category"><i class="bi bi-hdd-stack-fill"></i> Submit Category</button>
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

      <div class="row">
        <div class="col-md-12">
          <div class="card shadow-lg rounded">
            <div class="card-header py-3 shadow-sm">
              <h4 class="text-center">All Category</h4>
            </div>
            <div class="card-body p-0 table-border-style">
              <div class="table-responsive">
                <table class="table mb-0 table-striped table-secodary rounded">
                  <thead>
                    <tr>
                      <th class="bg-primary text-center">Sr No.</th>
                      <th class="bg-primary text-center">Category Name</th>
                      <th class="bg-primary text-center">Category Date</th>
                      <th class="bg-primary text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $number = 1;
                    $query = "SELECT * FROM `visitor_category`";
                    $result = $conn->query($query);
                    $num = $result->num_rows;
                    if ($num > 0) {
                      while ($data = $result->fetch_array()) {
                    ?>
                        <tr>
                          <td class="f-w-600 f-16 text-center"><?php echo $number ?></td>
                          <td class="text-center"><?php echo $data['category_name'] ?></td>
                          <td class="text-center"><?php echo $data['createat'] ?></td>
                          <td class="text-center">
                            <a class="btn btn-outline-danger m-r-5 shadow-sm f-w-900 f-14" href="<?php echo 'form_action.php?delete_category=' . $data['id']; ?>"><i class="bi bi-trash3-fill"></i> Delete</a>
                          </td>
                        </tr>
                    <?php
                        $number++;
                      }
                    } else {
                      echo "<tr><td colspan='5' class='text-center f-w-800 f-20'>Data Not Found</td></tr>";
                    }
                    ?>
                  </tbody>
                </table>
              </div>
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