<?php
//Signup bata ya aaucha ani database ma data save huncha


$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];

include 'db.php';
$s = " SELECT * from customers where email = '$email'";

$result = mysqli_query($conn, $s); 
$num = mysqli_num_rows($result);

if ($num == 1){
	session_start();
     header('Location: sameemail.php');
	
}

else{
	$sql = "INSERT INTO customers(name, phone, email, password)VALUES('$name','$phone','$email','$password')";
    $result = mysqli_query($conn, $sql);
            if($result){
            	session_start();
      			$_SESSION['email']=$email;
				  echo '<script>
				  alert("SignUp Successfull!");
				  window.location.href="book.php";
				  </script>';
                 }
				}

?>