<?php


include 'db.php';
session_start();
if (isset($_SESSION['email'])) {
?>

	<!DOCTYPE html>
	<html lang="en">

	<head>
		<title>Booked Seats</title>
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/yourseats.css">

	</head>



	<body>
		<div class="main">
			<a href="book.php" class="btn">Back</a>
		</div>
		<a href="bill.php">Bill</a>

		<div id="book">
			<h2 align="center">Your Bookings</h2>
			<table border="1">
				<tr>
					<td>S.N</td>
					<td>Email</td>
					<td>Travel Date</td>
					<td>Location</td>
					<td>Rate</td>
					<td>Seats</td>
					<td>Side</td>
					<td>Total</td>

				</tr>
			</table>
			<table border="1">
				<?php
				$sql = "select * from booking where email= '" . $_SESSION['email'] . "'";
				$row = mysqli_query($conn, $sql);
				while ($data = mysqli_fetch_array($row, MYSQLI_ASSOC)) {
				?>
					<tr>
						<td><?php echo $data['id']; ?></td>
						<td><?php echo $data['email']; ?></td>
						<td><?php echo $data['travel_date']; ?></td>
						<td><?php echo $data['location']; ?></td>
						<td><?php echo $data['fee']; ?></td>
						<td><?php echo $data['seats']; ?></td>
						<td><?php echo $data['side']; ?></td>
						<td><?php echo $data['total']; ?></td>
						<?php echo '<td><a href="cancel.php?id=' . $data["id"] . '">Cancel</a></td>'; ?>

					</tr>
				<?php
				}

				?>
			</table>
		</div>

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