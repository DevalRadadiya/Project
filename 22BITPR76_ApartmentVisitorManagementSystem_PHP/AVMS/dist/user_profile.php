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
              <h3 class="text-center">Profile</h3>
            </div>
          </div>
        </div>
      </div>


      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link text-uppercase active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Profile</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-uppercase" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Update Profile</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-uppercase" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Change Password</a>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <p class="text-center">
                    <img class='img-fluid img-rounded text-center' style="width:10%" src='assets/images/user/login_icon.png' alt='login_icon'>
                  </p>
                  <?php
                  $query = "SELECT * FROM `gatekeeper` WHERE `roll`='1'";
                  $result = $conn->query($query);
                  $num = $result->num_rows;
                  if ($num > 0) {
                    $number = 1;
                    while ($data = $result->fetch_array()) {
                  ?>
                      <table class="table table-bordered">
                        <tbody>
                          <tr>
                            <td class="text-center">
                              <h5>Admin Name</h5>
                            </td>
                            <td class="f-18 text-center">
                              <?= $data['name'] ?>
                            </td>
                          </tr>
                          <tr>
                            <td class="text-center">
                              <h5>Phone Number</h5>
                            </td>
                            <td class="f-18 text-center">
                              <?= $data['phone_number'] ?>
                            </td>
                          </tr>
                          <tr>
                            <td class="text-center">
                              <h5>Password</h5>
                            </td>
                            <td colspan="3" class="text-center">
                              <div class="input-group">
                                <input disabled type="password" class="form-control" value="<?= $data['password'] ?>" aria-label="Recipient's username" aria-describedby="basic-addon2" id="myInput">
                                <div class="input-group-append">
                                  <button class="btn btn-outline-primary" type="button" onmouseup="myFunction()" onmousedown="myFunction1()">Show</button>
                                </div>
                              </div>
                            </td>
                          </tr>

                          <script>
                            function myFunction() {
                              var x = document.getElementById("myInput");
                              if (x.type === "password") {
                                x.type = "text";
                              } else {
                                x.type = "password";
                              }
                            }

                            function myFunction1() {
                              var x = document.getElementById("myInput");
                              if (x.type === "password") {
                                x.type = "text";
                              } else {
                                x.type = "password";
                              }
                            }
                          </script>
                        </tbody>
                      </table>
                  <?php }
                  } ?>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <?php
                  $query = "SELECT * FROM `gatekeeper` WHERE `roll`='1'";
                  $result = $conn->query($query);
                  $num = $result->num_rows;
                  if ($num > 0) {
                    $number = 1;
                    while ($data = $result->fetch_array()) {
                  ?>
                      <form action="form_action.php" method="post">
                        <div class="form-row mt-3">
                          <div class="col-md-3">
                            <label for="validationCustom01" class="f-w-600 f-18">Admin Name</label>
                          </div>
                          <div class="col-md-9">
                            <input type="text" name="admin_name" value="<?= $data['name'] ?>" class="form-control" id="validationTooltip01" placeholder="Enter Your Name" required="">
                            <div class="invalid-feedback mb-3">Pleace Enter Admin Name</div>
                          </div>
                        </div>
                        <div class="form-row mt-3">
                          <div class="col-md-3">
                            <label for="validationCustom02" class="f-w-600 f-18">Phone Number</label>
                          </div>
                          <div class="col-md-9">
                            <input type="number" name="admin_phone_number" value="<?= $data['phone_number'] ?>" class="form-control" id="validationTooltip02" placeholder="Enter Phone Number" required="">
                            <div class="invalid-feedback mb-3">Pleace Enter Your Name</div>
                          </div>
                        </div>
                        <div class="card-footer mt-3">
                          <p style="text-align: center;" class="m-0 p-0">
                            <button class="btn btn-outline-primary shadow-sm f-w-900 f-16" type="submit" name="admin_update_profile"><i class="bi bi-capslock-fill"></i> Update </button>
                          </p>
                        </div>
                      </form>
                  <?php
                    }
                  }
                  ?>
                </div>
                <div class="tab-pane fade active show" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                  <form action="form_action.php" method="post">
                    <div class="form-row mt-3">
                      <div class="col-md-3">
                        <label for="validationCustom03" class="f-w-600 f-18">Current Password</label>
                      </div>
                      <div class="col-md-9">
                        <input type="password" name="admin_current_password" class="form-control" id="validationTooltip03" placeholder="Enter Current Password" required="">
                        <div class="invalid-feedback mb-3">Pleace Enter Current Password</div>
                      </div>
                    </div>
                    <div class="form-row mt-3">
                      <div class="col-md-3">
                        <label for="validationCustom03" class="f-w-600 f-18">New Password</label>
                      </div>
                      <div class="col-md-9">
                        <input type="password" name="admin_new_password" class="form-control" id="validationTooltip03" placeholder="Enter New Password" required="">
                        <div class="invalid-feedback mb-3">Please Enter New Password</div>
                      </div>
                    </div>
                    <div class="form-row mt-3">
                      <div class="col-md-3">
                        <label for="validationCustom04" class="f-w-600 f-18">Conform Password</label>
                      </div>
                      <div class="col-md-9">
                        <input type="password" name="admin_conform_password" class="form-control" id="validationTooltip04" placeholder="Enter New Password" required="">
                        <div class="invalid-feedback mb-3">Pleace Enter Conform Password</div>
                      </div>
                    </div>
                    <div class="card-footer mt-3">
                      <p style="text-align: center;" class="m-0 p-0">
                        <button class="btn btn-outline-primary shadow-sm f-w-900 f-16" type="submit" name="admin_update_password"><i class="bi bi-capslock-fill"></i> Change Password </button>
                      </p>
                    </div>
                  </form>
                </div>
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