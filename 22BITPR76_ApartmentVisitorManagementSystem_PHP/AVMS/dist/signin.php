<!DOCTYPE html>
<html lang="en">

<head>
    <title>AVMS</title>
    <?php include('head_link.php');
    include('connection.php'); ?>
</head>
<?php

if (isset($_POST['signup'])) {
    $name = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT `roll`,`name` FROM `gatekeeper` WHERE `name` = '$name' AND `password` = '$pass'";
    $result = $conn->query($sql)->fetch_assoc();
    if ($result == TRUE) {
    $_SESSION['user'] = $result;
    echo "<script>document.location = 'index.php';</script>";
    } else {
        echo "<script>Name And Password Invalid..</script>";
    }
}
?>

<body class="">
    <!-- [ auth-signin ] start -->
    <div class="auth-wrapper">
        <div class="auth-content text-center">
            <h3 class="text-primary">AVMS</h3>
            <div class="card borderless">
                <div class="row align-items-center ">
                    <div class="col-md-12">
                        <div class="card-body">
                            <h4 class="mb-3 f-w-400">Signin</h4>
                            <hr>
                            <form method="POST">
                                <div class="form-group mb-3">
                                    <input type="text" name="username" class="form-control" id="Email" placeholder="Name">
                                </div>
                                <div class="form-group mb-4">
                                    <input type="password" name="password" class="form-control" id="Password" placeholder="Password">
                                </div>
                                <button class="btn btn-block btn-primary mb-4" type="submit" name="signup">Signin</button>
                            </form>
                            <hr>
                            <p class="mb-2 text-muted">Forgot password? <a href="auth-reset-password.html" class="f-w-400">Reset</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ auth-signin ] end -->

    <!-- Required Js -->
    <?php include('footer_links.php'); ?>
</body>

</html>