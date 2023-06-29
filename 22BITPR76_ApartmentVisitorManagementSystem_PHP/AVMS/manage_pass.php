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
          <div class="shadow-lg rounded">
            <div class="card">
              <div class="p-0 table-border-style">
                <div class="shadow-sm table-responsive">
                  <table class="table mb-0 table-striped rounded">
                    <thead>
                      <tr>
                        <th class="bg-primary text-center">S.NO </th>
                        <th class="bg-primary text-center">Pass No. </th>
                        <th class="bg-primary text-center">Visitor Name</th>
                        <th class="bg-primary text-center">Category</th>
                        <th class="bg-primary text-center">Apartment No</th>
                        <th class="bg-primary text-center">Action</th>
                        <th class="bg-primary text-center">Pass Expired</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $query = "SELECT * FROM `visitor_pass` WHERE `to_date`>= date('Y/m/d')";
                      $result = $conn->query($query);
                      $num = $result->num_rows;
                      if ($num > 0) {
                        $number = 1;
                        while ($data = $result->fetch_array()) {
                      ?>
                          <tr class="">
                            <td class="text-center"><?php echo $number; ?></td>
                            <td class="text-center"><?php echo $data['visitor_name']; ?></td>
                            <td class="text-center"><?php echo $data['category_name']; ?></td>
                            <td class="text-center"><?php echo $data['apartment']; ?></td>
                            <td class="text-center"><?php echo $data['visitor_name']; ?></td>
                            <td class="text-center">
                              <?php
                              $pass_end_date = date("Y-m-d", strtotime($data['to_date'])) . '<br>';
                              $today_date = date("Y-m-d") . '<br>';
                              if ($today_date >= $pass_end_date) {
                                echo
                                '<a class="btn btn-outline-success shadow-sm f-w-900 f-14" href="new_pass.php?visiter_pass_details=' . $data['id'].'"><i class="bi bi-back"></i> Create New</a><br>
                              <td class="text-center text">
                              <span class="text-danger f-w-700" href="">Pass Expired</span>
                              </td>';
                              } else {
                                $passend = date("Y-m-d", strtotime('-30 days', strtotime($data['to_date'])));
                                $counter_date = round((strtotime($data['to_date']) - strtotime('now')) / (86400));
                              ?>
                                <a class="btn btn-outline-info m-r-5 shadow-sm f-w-900 f-14" href="<?php echo 'pass_details.php?visiter_pass_details=' . $data['id']; ?>"><i class="bi bi-info-circle-fill"></i> View Details</a>
                                <a class="btn btn-outline-danger m-r-5 shadow-sm f-w-900 f-14" href="<?php echo 'form_action.php?delete_visiter_pass=' . $data['id']; ?>"><i class="bi bi-trash3-fill"></i> Delete</a>

                              <?php
                                if ($today_date >= $passend) {
                                  echo
                                  '<td class="text-center text">
                                <span class="text-warning f-w-700">Pass Expired in ' . $counter_date . ' Days </span>
                                </td>';
                                }
                              }
                              ?>
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

  <!-- Required Js -->
  <?php include('footer_links.php'); ?>
</body>

</html>