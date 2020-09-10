<?php

//book click garda ya aaucha

include 'db.php';


   $email = $_POST['email'];
   $date = $_POST['date'];
   $city = $_POST['city'];
   $fee = $_POST['fee'];
   $seat = $_POST['seat'];
   $side = $_POST['side'];
   $total = $_POST['total'];

   $result = mysqli_query($conn, "select seats from booking where side ='" . $side . "' and location ='" . $city . "' and travel_date ='" . $date . "'");
   $seatCount = 0;

   while ($catdata = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      $seatCount += $catdata['seats'];
   }

   if ($seatCount >= 15) {
      echo '<script>
   alert("Seat Already Filled!");
   window.location.href="book.php";
   </script>';
   } else if (($seatCount + $seat) > 15) {
      echo '<script>
   alert("Number Of Available Seats Exceeded!");
   window.location.href="book.php";
   </script>';
   } else {
      $sql = "INSERT INTO booking(email, travel_date, location, fee, seats, side, total) VALUES('$email','$date','$city','$fee','$seat','$side','$total')";
      $result = mysqli_query($conn, $sql);
      if ($result) {
         session_start();
         echo '<script>
      alert("Booking Successfull!");
      window.location.href="yourseats.php";
      </script>';
      }
   }

