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
		<div class="col-sm-12 col-lg-4">
		</div>

		<div class="pcoded-content">
			<div class="col-sm-12 col-lg-4">

			</div>

			<div class="row">
				<!-- [ sample-page ] start -->
				<?php
				//todays visitors
				$query = $conn->query("SELECT `id` from 	`visitor_details` where date(createat)=CURDATE();");
				$count_today_visitors = mysqli_num_rows($query);
				if ($_SESSION['user']['roll'] == 1) { ?>
					<?php
					//Yesterdays visitors
					$query1 = mysqli_query($conn, "select `id` from `visitor_details` where date(createat)=CURDATE()-1;");
					$count_yesterday_visitors = mysqli_num_rows($query1);
					//Last Sevendays visitors
					$query2 = mysqli_query($conn, "select `id` from `visitor_details` where date(createat)>=(DATE(NOW()) - INTERVAL 7 DAY);");
					$count_lastsevendays_visitors = mysqli_num_rows($query2);
					//Total Visitors visitors
					$query3 = mysqli_query($conn, "select `id` from `visitor_details`");
					$count_total_visitors = mysqli_num_rows($query3);
					//Total Visitors visitors
					$query6 = mysqli_query($conn, "select `id` from `visitor_pass`");
					$totalpass = mysqli_num_rows($query6);
					//Total Visitors visitors
					$query5 = mysqli_query($conn, "select `id` from `visitor_category`");
					$listedcategories = mysqli_num_rows($query5);
					?>
					<div class="col-sm-12 col-lg-4">
						<div class="card border-primary rounded text-center">
							<div class="card-body pb-3 bg-success-subtle d-flex justify-content-between">
								<h2 class="m-0 f-70 "><i class="bi bi-person-video"></i></h2>
								<h2 class="text-c-blue m-0 f-50 "><?php echo $count_today_visitors ?></h2>
							</div>
							<div class="card-footer">
								<h4>
									Today Visitors
								</h4>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-lg-4">
						<div class="card border-primary rounded text-center">
							<div class="card-body pb-3 bg-success-subtle d-flex justify-content-between">
								<h2 class="m-0 f-70 "><i class="bi bi-arrow-bar-left"></i></h2>
								<h2 class="text-c-blue m-0 f-50 "><?php echo $count_yesterday_visitors ?></h2>
							</div>
							<div class="card-footer">
								<h4>
									Yesterday Visitors
								</h4>
							</div>
						</div>
					</div>

					<div class="col-sm-12 col-lg-4">
						<div class="card border-primary rounded text-center">
							<div class="card-body pb-3 bg-success-subtle d-flex justify-content-between">
								<h2 class="m-0 f-70 "><i class="bi bi-person-video"></i></h2>
								<h2 class="text-c-blue m-0 f-50 "><?php echo $count_lastsevendays_visitors ?></h2>
							</div>
							<div class="card-footer">
								<h4>
									Last 7 Days Visitors
								</h4>
							</div>
						</div>
					</div>

					<div class="col-sm-12 col-lg-4">
						<div class="card border-primary rounded text-center">
							<div class="card-body pb-3 bg-success-subtle d-flex justify-content-between">
								<h2 class="m-0 f-70 "><i class="bi bi-person-add"></i></h2>
								<h2 class="text-c-blue m-0 f-50 "><?php echo $count_lastsevendays_visitors ?></h2>
							</div>
							<div class="card-footer">
								<h4>
									Total Visitors Till Date
								</h4>
							</div>
						</div>
					</div>

					<div class="col-sm-12 col-lg-4">
						<div class="card border-primary rounded text-center">
							<div class="card-body pb-3 bg-success-subtle d-flex justify-content-between">
								<h2 class="m-0 f-70 "><i class="bi bi-card-list"></i></h2>
								<h2 class="text-c-blue m-0 f-50 "><?php echo $listedcategories ?></h2>
							</div>
							<div class="card-footer">
								<h4>
									Listed categories
								</h4>
							</div>
						</div>
					</div>

					<div class="col-sm-12 col-lg-4">
						<div class="card border-primary rounded text-center">
							<div class="card-body pb-3 bg-success-subtle d-flex justify-content-between">
								<h2 class="m-0 f-70 "><i class="bi bi-person-vcard-fill"></i></h2>
								<h2 class="text-c-blue m-0 f-50 "><?php echo $totalpass ?></h2>
							</div>
							<div class="card-footer">
								<h4>
									Total Pass Created
								</h4>
							</div>
						</div>
					</div>
				<?php  } else {
					echo '<div class="col-sm-12 col-lg-4">
						<div class="card border-primary rounded text-center">
							<div class="card-body pb-3 bg-success-subtle d-flex justify-content-between">
								<h2 class="m-0 f-70 "><i class="bi bi-person-video"></i></h2>
								<h2 class="text-c-blue m-0 f-50 ">' . $count_today_visitors . '</h2>
							</div>
							<div class="card-footer">
								<h4>
									Today Visitors
								</h4>
							</div>
						</div>
					</div>';
				} ?>
			</div>
		</div>
	</div>
	<!-- [ sample-page ] end -->
	<!-- [ Main Content ] end -->
	</div>
	</div>
	<!-- [ Main Content ] end -->

	<!-- Required Js -->
	<?php include('footer_links.php'); ?>
</body>

</html>