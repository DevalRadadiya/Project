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
              <h3 class="text-center">Manage Visitors</h3>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <tbody>
                    <?php

                    $visitors_details = $_GET['visitors_details'];
                    $query = "SELECT * FROM `visitor_details` WHERE `id` = '$visitors_details' ";
                    $result = $conn->query($query);
                    $num = $result->num_rows;
                    if ($num > 0) {
                      $number = 1;
                      while ($data = $result->fetch_array()) {
                    ?>
                        <tr>
                          <td class="text-info f-18 f-w-800" colspan="4">
                            Visitor Details
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <h5>Visitor Name</h5>
                          </td>
                          <td class="f-18">
                            <?php echo $data['visitor_name']; ?>
                          </td>
                          <td>
                            <h5>Category</h5>
                          </td>
                          <td class="f-18">
                            <?php echo $data['category_name']; ?>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <h5>Mobile Number</h5>
                          </td>
                          <td class="f-18"><?php echo $data['phone_number']; ?></td>
                          <td>
                            <h5> Address</h5>
                          </td>
                          <td class="f-18"><?php echo $data['address']; ?></td>
                        </tr>
                        <tr>
                          <td class="text-info f-18 f-w-800" colspan="4">Whom to Meet Details</td>
                        </tr>
                        <tr>
                          <td>
                            <h5>Apartment no</h5>
                          </td>
                          <td class="f-18"><?php echo $data['apartment']; ?></td>
                          <td>
                            <h5> Floor</h5>
                          </td>
                          <td class="f-18"><?php echo $data['floor']; ?></td>
                        </tr>
                        <tr>
                          <td>
                            <h5>Whom to Meet</h5>
                          </td>
                          <td class="f-18"><?php echo $data['whom_to_meet']; ?></td>
                          <td>
                            <h5>Reason to Meet</h5>
                          </td>
                          <td class="f-18">'<?php echo $data['reason_to_meet']; ?></td>
                        </tr>
                        <tr>
                          <td>
                            <h5>Vistor Enter Time</h5>
                          </td>
                          <td class="f-18" colspan="3"><?php echo $data['createat']; ?></td>
                        </tr>
                        <?php
                        $number++;

                        ?>

                        <?php
                        if ($_SESSION['user']['roll'] == 3) {
                          if (isset($_POST['out_btn'])) {
                            $rem = $_POST['remark'];
                            $id = $_GET['visitors_details'];
                            $query = "UPDATE `visitor_details` SET `out_remark`='$rem' WHERE `id`='$id'";
                            $result = $conn->query($query);
                            echo "<script>document.location='visitor_out.php';</script>";
                          } else {
                            echo "No submit";
                          }
                          if ($data['out_remark'] == "NULL") {
                        ?>
                            <form method="POST">
                              <tr>
                                <th>Outing Remark :</th>
                                <td colspan="3">
                                  <textarea name="remark" placeholder="" rows="6" cols="14" class="form-control wd-450" required="true"></textarea>
                                </td>
                              </tr>
                              <tr align="center">
                                <td colspan="4">
                                  <button type="submit" name="out_btn" class="btn btn-primary btn-sm">Out</button>
                                </td>
                              </tr>
                            </form>
                          <?php
                          } else {
                          ?>
                            <tr>
                              <th>Outing Remark </th>
                              <td><?php echo $data['out_remark']; ?></td>
                              <th>Out Time</th>
                              <td><?php echo ($data['out_time'] == NULL) ? "" : $data['out_time']; ?> </td>
                      <?php }
                        }
                      }
                    }
                      ?>
                            </tr>
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