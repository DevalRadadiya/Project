<?php
include('connection.php');
?>
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
                            <h3 class="text-center">Ownership Details</h3>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            $query = "SELECT * FROM `apt_details`";
            $result = $conn->query($query);
            $num = $result->num_rows;
            ?>
            <div class="row">
                <div class="col-md-12 rounded">
                    <div class="shadow-lg rounded">
                        <div class="p-0 table-border-style">
                            <div class="shadow-sm table-responsive">
                                <table class="table mb-0 table-striped table-dark rounded">
                                    <thead>
                                        <tr>
                                            <th class="bg-primary">S.NO</th>
                                            <th class="bg-primary">Ownership Name</th>
                                            <th class="bg-primary">Phone Number</th>
                                            <th class="bg-primary">Email</th>
                                            <th class="bg-primary">House Number</th>
                                            <th class="bg-primary">Ownership</th>
                                            <th class="bg-primary">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($num > 0) {
                                            $number = 1;
                                            while ($data = $result->fetch_array()) {
                                        ?>
                                                <tr>
                                                    <td class="d-none ow_id"><?= $data['id']; ?></td>
                                                    <td><?= $number ?></td>
                                                    <td><?= $data['name'] ?></td>
                                                    <td><?= $data['phone_number'] ?></td>
                                                    <td><?= $data['email'] ?></td>
                                                    <td><?= $data['house_number'] ?></td>
                                                    <td><?= $data['owenership'] ?></td>
                                                    <td>
                                                        <a class="btn btn-outline-info m-r-5 m-r-5 shadow-sm f-w-900 f-14" href="<?php echo 'ownership_deatils.php?manage_owner_id=' . $data['id']; ?>"><i class="bi bi-info-circle-fill"></i> View</a>
                                                        <a class="btn btn-outline-warning m-r-5 m-r-5 shadow-sm f-w-900 f-14" href="<?php echo 'edit_ownership_deatils.php?update_owner_id=' . $data['id']; ?>"><i class="bi bi-pencil-square"></i> Update</a>
                                                        <a class="btn btn-outline-danger m-r-5 m-r-5 shadow-sm f-w-900 f-14" href="<?php echo 'form_action.php?delete_owner_id=' . $data['id']; ?>"><i class="bi bi-trash3-fill"></i> Delete</a>

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




        <!-- Update Manage Ownership Details Modal Form -->
        <div id="edit_qwnership" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLiveLabel">Ownership Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" action="" method="post" novalidate>
                            <div class="modal-body">
                                <div class="form-row mt-3">
                                    <div class="col-md-3">
                                        <label for="validationCustom01" class="f-w-600 f-18">Ownership Name</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="ownership_name" class="form-control" id="validationTooltip01" placeholder="Ownership Name" required="">
                                        <div class="invalid-feedback mb-1">Pleace Enter Name</div>
                                    </div>
                                </div>
                                <div class="form-row mt-3">
                                    <div class="col-md-3">
                                        <label for="validationCustom01" class="f-w-600 f-18">Phone Number</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="number" name="ownership_number" class="form-control" id="validationTooltip01" placeholder="Ownership Phone Number" required="">
                                        <div class="invalid-feedback mb-1">Pleace Enter Phone Number</div>
                                    </div>
                                </div>
                                <div class="form-row mt-3">
                                    <div class="col-md-3">
                                        <label for="validationCustom01" class="f-w-600 f-18">Email</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="email" name="ownership_email" class="form-control" id="validationTooltip01" placeholder="Ownership Email" required="">
                                        <div class="invalid-feedback mb-1">Pleace Enter Email</div>
                                    </div>
                                </div>
                                <div class="form-row mt-3">
                                    <div class="col-md-3">
                                        <label for="validationCustom01" class="f-w-600 f-18">House Number</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="ownership_house_number" class="form-control" id="validationTooltip01" placeholder="Ownership House Number" required="">
                                        <div class="invalid-feedback mb-1">Pleace Enter House Number</div>
                                    </div>
                                </div>
                                <div class="form-row mt-3">
                                    <div class="col-md-3">
                                        <label for="validationCustom01" class="f-w-600 f-18">House Ownership</label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <select class="custom-select" name="house_ownership" required="">
                                                <option value="">Pleace Enter House Ownership</option>
                                                <option value="Rent">Rent</option>
                                                <option value="Empty">Empty</option>
                                                <option value="Owner">Owner</option>
                                            </select>
                                            <div class="invalid-feedback">Pleace Select One</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
                                <button class="btn  btn-primary mr-0 submit_ownwership" type="submit">Save changes</button>
                            </div>
                        </form>
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

        $(document).ready(function() {
            // getdata();

            $('.submit_ownwership').click(function(e) {
                e.preventDefault();
                var ow_id = $(this).closest('tr').find('.ow_id').text();

                console.log(ow_id);

                // console.log('hello');
            })
        });



        function getdata() {
            $.ajax({
                type: "POST",
                url: "ajaxdata.php",
                success: function(response) {
                    console.log(response);
                }
            });
        }

        // $(document).ready(function() {
        //     $(".showbtn").click(function() {
        //         var id = $(this).data("id");
        //         $.ajax({
        //             type: "POST",
        //             url: "ajaxdata.php",
        //             data: {
        //                 emid: id
        //             },
        //             dataType: "json",
        //             success: function(data) {
        //                 console.log(data);
        //             }
        //         });
        //         $('#exampleModal1').modal('show');
        //     });
        // });
    </script>
</body>

</html>