<?php include('connection.php') ?>

<?php
if (!isset($_SESSION['user'])) {
  header('Location: log_out.php');
}
?>

<?php
if (isset($_POST['pass_date'])) {
  $from_date = $_POST['from_date'];
  $to_date = $_POST['to_date'];
  $query = "SELECT * FROM `visitor_pass` WHERE `createat` BETWEEN '$from_date' AND '$to_date'";
  $result = $conn->query($query);
  $num = $result->num_rows;
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
        <div class="col-md-12">
          <div class="card">
            <div class="card-header py-2 shadow-sm rounded">
              <h3 class="text-center">Pass Reports</h3>
              <hr>
              <span class="text-center">
                <h4 class="text-info">Report from <?php echo $from_date; ?> To <?php echo $to_date ?>
              </span></h4>
              <hr>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12 rounded">
          <div class="shadow-lg rounded">
            <div class="p-0 table-border-style">
              <div class="shadow-sm table-responsive">
                <table class="table mb-0 table-striped table-dark rounded">
                  <thead>
                    <tr>
                      <th class="bg-primary text-center">S.NO</th>
                      <th class="bg-primary text-center">Pass Number</th>
                      <th class="bg-primary text-center">Visitor Name</th>
                      <th class="bg-primary text-center">Category</th>
                      <th class="bg-primary text-center">Contact Number</th>
                      <th class="bg-primary text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if ($num > 0) {
                      $number = 1;
                      while ($data = $result->fetch_array()) {
                    ?>
                        <tr>
                          <td class="text-center"><?php echo $number ?></td>
                          <td class="text-center"><?php echo $data['passnumber']; ?></td>
                          <td class="text-center"><?php echo $data['visitor_name']; ?></td>
                          <td class="text-center"><?php echo $data['category_name']; ?></td>
                          <td class="text-center"><?php echo $data['phone_number']; ?></td>
                          <td class="text-center">
                            <a href="<?php echo 'pass_report_details.php?visitors_details=' . $data['id']; ?>" class="btn btn-outline-info m-r-5 m-r-5 shadow-sm f-w-900 f-14"><i class="bi bi-info-circle-fill"></i> View Details</a>
                          </td>
                        </tr>
                    <?php
                        $number++;
                      }
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
    <!-- [ Main Content ] end -->
  </div>
  </div>
  <!-- [ Main Content ] end -->

  </div>
  </div>
  <!-- Required Js -->
  <?php include('footer_links.php'); ?>
</body>

</html>