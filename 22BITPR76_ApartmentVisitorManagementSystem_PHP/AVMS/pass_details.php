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
        <div class="col-sm-12 ">
          <div class="card shadow-lg">
            <div class="card-header py-2 shadow-sm rounded">
              <h3 class="text-center">Pass Visitors</h3>
            </div>
          </div>
          <div class="card shadow-lg" id="divToPrint">
            <div class="card-body shadow-sm">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <tbody>
                    <?php
                    $visiter_pass_details = $_GET['visiter_pass_details'];
                    $query = "SELECT * FROM `visitor_pass` WHERE `id` = '$visiter_pass_details' ";
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
                            <h5>Pass Number</h5>
                          </td>
                          <td class="f-18" colspan="3">
                            <?php echo $data['id']; ?>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <h5>Visitor Name</h5>
                          </td>
                          <td class="f-18"><?php echo $data['visitor_name']; ?></td>
                          <td>
                            <h5>Category</h5>
                          </td>
                          <td class="f-18"><?php echo $data['category_name']; ?></td>
                        </tr>
                        <tr>
                          <td>
                            <h5>Mobile Number</h5>
                          </td>
                          <td class="f-18"><?php echo $data['phone_number']; ?></td>
                          <td>
                            <h5>Address</h5>
                          </td>
                          <td class="f-18"><?php echo $data['address']; ?>;</td>
                        </tr>
                        <tr>
                          <td class="text-info f-18 f-w-800" colspan="4">Pass Details</td>
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
                            <h5>From Date</h5>
                          </td>
                          <td class="f-18"><?php echo $data['from_date']; ?></td>
                          <td>
                            <h5>
                              To Date
                            </h5>
                          </td>
                          <td class="f-18">
                            <?php
                            echo $data['to_date'] . '<br>';
                            $passend = date("Y-m-d", strtotime('-7 days', strtotime($data['to_date'])));
                            $today_date = date("Y-m-d");
                            if ($today_date >= $passend) {
                              echo '<span class="text-danger">Your pass end soon</span>';
                            } else {
                            }
                            ?>
                          </td>
                        <tr>
                          <td>
                            <h5>Pass Description</h5>
                          </td>
                          <td class="f-18" colspan="3"><?php echo $data['pass_description']; ?></td>
                        </tr>
                        <tr>
                          <td>
                            <h5>Pass Creation Date</h5>
                          </td>
                          <td class="f-18" colspan="3"><?php echo $data['createat']; ?></td>
                        </tr>
                        <tr>
                          <td colspan="4" class="text-center"><button class="btn btn-outline-info m-r-5 shadow-sm f-w-900 f-14" onclick="PrintDiv();">Print</button></td>
                        </tr>
                    <?php
                        $number++;
                      }
                    }
                    ?>
                  </tbody>
                  <script type="text/javascript">
                    function PrintDiv() {
                      var divToPrint = document.getElementById('divToPrint');
                      var popupWin = window.open('', '_blank', 'width=500,height=500');
                      popupWin.document.open();
                      popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
                      popupWin.document.close();
                    }
                  </script>
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