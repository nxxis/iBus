<?php
include 'db.php';
session_start();
if (isset($_SESSION['email'])) {
?>


	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">


		<title>Booking Form</title>

		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
		<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
		<link type="text/css" rel="stylesheet" href="css/book.css">


	</head>

	<body>
		<div id="booking" class="section">
			<div class="usern">
				<div class="logo">
					<img src="image/logo.png">
				</div>
				<div class="info">Welcome: <?php
											echo $_SESSION['email'];
											?></div>

				<a class="logout" name='logout' href="logout.php">Logout</a>
			</div>

			<div class="section-center">
				<div class="container">
					<div class="row">

						<div class="col-md-5 col-md-offset-7">

							<div class="booking-form">
								<form method="POST" action="bookingprocess.php">
									<input name="email" id="email" style="display: none" value=<?php echo $_SESSION['email'] ?> />
									<div class="form-group">
										<span class="form-label">Travelling Date</span>
										<input class="form-control" type="date" name="date" id="date" required>
									</div>
									<div class="form-group">
										<span class="form-label">From</span>
										<select class="form-control" required>
											<option hidden value="">-Select Your City-</option>
											<option selected>Kathmandu</option>
										</select>
									</div>

									<div class="form-group">
										<span class="form-label">To</span>
										<select class="form-control" name="city" id="city">
											<option selected hidden value="">-Select Your City-</option>
											<?php
											$s2 = "select * from cities";
											$s3 = mysqli_query($conn, $s2);
											?>
											<?php
											while ($catdata = mysqli_fetch_array($s3, MYSQLI_ASSOC)) {
											?>
												<option data-value=<?php echo $catdata['price'] ?> value=<?php echo $catdata['city']; ?>><?php echo $catdata['city']; ?></option>
											<?php } ?>

										</select>
										<div class="form-group">

											<div class="form-group">
												<span class="form-label" style="margin: 15px 0 5px 0;">Service Fee(In Rs.)</span>
												<input name='fee' id='fee' value="0" style="background-color: #f5f5f5; border: none; height :45px; border-radius: 3px; box-shadow: none; font-weight: 400; color: #101113; width: 100%" readOnly />
											</div>

											<div class="form-group">
												<span class="form-label">Select Side</span>
												<div class="form-checkbox">
													<div class="seatsRemaining" style="color: white">
														<?php
														$s3 = mysqli_query($conn, "select seats from booking where side = 'a'");
														$seatACount = 0;
														while ($catdata = mysqli_fetch_array($s3, MYSQLI_ASSOC)) {
															$seatACount += $catdata['seats'];
														}

														$s3 = mysqli_query($conn, "select seats from booking where side = 'b'");
														$seatBCount = 0;
														while ($catdata = mysqli_fetch_array($s3, MYSQLI_ASSOC)) {
															$seatBCount += $catdata['seats'];
														}

														?>
														<label for="A">
															<input type="radio" name="side" id="" value="a" required>
															<span>A</span>
														</label>
														<label for="B">
															<input type="radio" name="side" id="side" value="b" required>
															<span>B</span>
														</label>
													</div>
												</div>

												<div class="form-group">
													<span class="form-label">No. Of Seats</span>
													<input class="form-control" type="number" name="seat" id="seat" onChange="gettotal1()" required>

												</div>
												<div class="form-group">
													<span class="form-label">Total Amount(In Rs.)</span>
													<input class="form-control" name="total" id="total" readonly="">
												</div>
											</div>


										</div>
										<div class="row">

											<div class="form-btn">
												<button class="search-btn">Book Now</button>
												<a href="yourseats.php" class="seats">Your Seats</a>
											</div>

										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script language="javascript" type="text/javascript">
			function notEmpty() {
				var e = document.getElementById("city");
				var strUser = e.options[e.selectedIndex].dataset.value;
				var strUser = document.getElementById('fee').value = strUser;
			}

			document.getElementById("city").onchange = notEmpty;

			function gettotal1() {
				var gender1 = document.getElementById('fee').value;
				var gender2 = document.getElementById('seat').value;
				var gender3 = parseFloat(gender1) * parseFloat(gender2);

				document.getElementById('total').value = gender3;

			}
		</script>
	</body>

	</html>

<?php
} else {
	echo '<script>
										   alert("You Must Log In First!");
										   window.location.href="login.php";
										   </script>';
}

?>