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
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header py-2 shadow-sm rounded">
              <h3 class="text-center">Gatekeeper Details</h3>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <tbody>
                    <?php
                    $view_getekeeper_details = $_GET['view_getekeeper_details'];
                    $query = "SELECT * FROM `gatekeeper` WHERE `id` = '$view_getekeeper_details' ";
                    $result = $conn->query($query);
                    $num = $result->num_rows;
                    if ($num > 0) {
                      $number = 1;
                      while ($data = $result->fetch_array()) {
                    ?>
                        <tr>
                          <td>
                            <h5>Gatekeeper Name</h5>
                          </td>
                          <td class="f-18">
                            <?php echo $data['name']; ?>
                          </td>
                          <td>
                            <h5>Phone Number</h5>
                          </td>
                          <td class="f-18">
                            <?php echo $data['phone_number']; ?>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <h5>Gate Number</h5>
                          </td>
                          <td class="f-18"><?php echo $data['gate']; ?></td>
                          <td>
                            <h5> Address</h5>
                          </td>
                          <td class="f-18"><?php echo $data['address']; ?></td>
                        </tr>
                    <?php }
                    } ?>
                  </tbody>
                </table>
              </div>
            </div>
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