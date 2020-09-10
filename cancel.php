<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Cancel</title>
</head>

<body>

    <?php
    include 'db.php';
    session_start();
    if (isset($_SESSION['email'])) {

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "delete from booking where id='" . $id . "'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo '<script>
    alert("Booking Cancelled!");
    window.location.href="yourseats.php";
    </script>';
            }
        }
    } else {
        echo '<script>
	   alert("You Must Log In First!");
	   window.location.href="login.php";
	   </script>';
    }
    ?>
</body>

</html>