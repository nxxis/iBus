
<?php

require('fpdf182/fpdf.php');
include 'db.php';
session_start();
if (isset($_SESSION['email'])) {
  $sql = "select * from booking where email= '" . $_SESSION['email'] . "'";
  $row = mysqli_query($conn, $sql);
  $data = mysqli_fetch_array($row, MYSQLI_ASSOC);
  $pdf = new FPDF('P', 'mm', 'A4');

  $pdf->AddPage();
  /*output the result*/

  /*set font to arial, bold, 14pt*/
  $pdf->SetFont('Arial', 'B', 20);

  $pdf->Image('logo.png',11,11,7);

  /*Cell(width , height , text , border , end line , [align] )*/

  $pdf->Cell(71, 10, '', 0, 0);
  $pdf->Cell(59, 5, 'Invoice', 0, 0);
  $pdf->Cell(59, 10, '', 0, 1);

  $pdf->SetFont('Arial', 'B', 15);
  $pdf->Cell(71, 5, 'iBus', 0, 0);
  $pdf->Cell(59, 5, '', 0, 0);
  $pdf->Cell(59, 5, 'Customer Details:', 0, 1);

  $pdf->SetFont('Arial', '', 10);

  $pdf->Cell(130, 5, 'Dhulikhel,Kavre', 0, 0);
  $pdf->Cell(25, 5, '', 0, 0);
  $pdf->Cell(34, 5, '', 0, 1);

  $pdf->Cell(130, 5, 'Near KU', 0, 0);
  $pdf->Cell(25, 5, 'Invoice Date:', 0, 0);
  $pdf->Cell(34, 5, '' . date("Y/m/d") . '', 0, 1);

  $pdf->Cell(130, 5, '', 0, 0);
  $pdf->Cell(25, 5, 'Email:', 0, 0);
  $pdf->Cell(34, 5, '' . $data["email"] . '', 0, 1);


  $pdf->SetFont('Arial', 'B', 15);
  $pdf->Cell(130, 5, 'Travel Details:', 0, 0);
  $pdf->Cell(59, 5, '', 0, 0);
  $pdf->SetFont('Arial', 'B', 10);
  $pdf->Cell(189, 10, '', 0, 1);



  $pdf->Cell(50, 10, '', 0, 1);

  $pdf->SetFont('Arial', 'B', 10);
  /*Heading Of the table*/
  $pdf->Cell(10, 6, 'ID', 1, 0, 'C');
  $pdf->Cell(60, 6, 'Travelling Date', 1, 0, 'C');
  $pdf->Cell(35, 6, 'Location', 1, 0, 'C');
  $pdf->Cell(30, 6, 'Rate', 1, 0, 'C');
  $pdf->Cell(10, 6, 'Side', 1, 0, 'C');
  $pdf->Cell(10, 6, 'Seats', 1, 0, 'C');
  $pdf->Cell(35, 6, 'Total', 1, 1, 'C');/*end of line*/
  /*Heading Of the table end*/
  $pdf->SetFont('Arial', '', 10);


  $subtotal = 0;
  $row = mysqli_query($conn, $sql);
  while ($data = mysqli_fetch_array($row, MYSQLI_ASSOC)) {
    $subtotal += $data['total'];


    $pdf->Cell(10, 6, '' . $data["id"] . '', 1, 0);
    $pdf->Cell(60, 6, '' . $data["travel_date"] . '', 1, 0);
    $pdf->Cell(35, 6, '' . $data["location"] . '', 1, 0, 'R');
    $pdf->Cell(30, 6, 'Rs.' . $data["fee"] . '', 1, 0, 'R');
    $pdf->Cell(10, 6, '' . $data["side"] . '', 1, 0, 'R');
    $pdf->Cell(10, 6, '' . $data["seats"] . '', 1, 0, 'R');
    $pdf->Cell(35, 6, 'Rs.' . $data["total"] . '', 1, 1, 'R');
  }

  $pdf->Cell(130, 6, '', 0, 0);
  $pdf->Cell(25, 6, 'Subtotal', 0, 0);
  $pdf->Cell(35, 6, 'Rs.' . $subtotal . '', 1, 1, 'R');


  $pdf->Output();
} else {
  echo '<script>
   alert("You Must Log In First!");
   window.location.href="login.php";
   </script>';
}

?>

