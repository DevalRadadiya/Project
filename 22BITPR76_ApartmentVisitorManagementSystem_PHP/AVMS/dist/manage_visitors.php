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
        <div class="col-md-12">
          <div class="card">
            <div class="card-header py-2 shadow-sm rounded">
              <h3 class="text-center">Manage Visitors</h3>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12 rounded">
          <div class="card">
            <div class="shadow-lg rounded">
              <div class="p-0 table-border-style">
                <div class="shadow-sm table-responsive">
                  <table class="table mb-0 table-striped rounded">
                    <thead>
                      <tr>
                        <th class="bg-primary text-center">S.NO</th>
                        <th class="bg-primary text-center">Visitor Name</th>
                        <th class="bg-primary text-center">Apartment</th>
                        <th class="bg-primary text-center">Whom To Visit</th>
                        <th class="bg-primary text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                      $query = "SELECT * FROM `visitor_details`";
                      $result = $conn->query($query);
                      $num = $result->num_rows;

                      ?>
                      <?php
                      if ($num > 0) {
                        $number = 1;
                        while ($data = $result->fetch_array()) {
                      ?>
                          <tr>
                            <td class="text-center"><?php echo $number ?></td>
                            <td class="text-center"><?php echo $data['visitor_name'] ?></td>
                            <td class="text-center"><?php echo $data['apartment'] ?></td>
                            <td class="text-center"><?php echo $data['whom_to_meet'] ?></td>
                            <td class="text-center">
                              <a href="<?php echo 'visitors_details.php?visitors_details=' . $data['id']; ?>" class="btn btn-outline-info m-r-5 shadow-sm f-w-900 f-14"><i class="bi bi-info-circle-fill"></i> View Details</a>
                              <a href="<?php echo 'form_action.php?delete_visitors_details=' . $data['id']; ?>" class="btn btn-outline-danger m-r-5 shadow-sm f-w-900 f-14"><i class="bi bi-trash3-fill"></i> Delete</a>
                              <!-- <a href="manage_visitors.php" class="btn btn-outline-warning m-r-5 shadow-sm f-w-900 f-18"><i class="bi bi-pencil-square"></i></a> -->
                            </td>
                          </tr>
                      <?php
                          $number++;
                      }
                      } 
                      else 
                      {
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
    <!-- [ Main Content ] end -->
  </div>
  </div>
  <!-- [ Main Content ] end -->

  <!-- Required Js -->
  <?php include('footer_links.php'); ?>
</body>

</html>