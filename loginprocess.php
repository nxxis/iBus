<?php 

//Login bata ya aaucha ani check garcha

   
   $email = $_POST['email'];
   $password = $_POST['password'];

  
   
   include 'db.php';
   
   $s = " select * from customers where email = '$email' && password = '$password'";
   
   $result = mysqli_query($conn, $s); 
   $num = mysqli_num_rows($result);
   
   if ($num == 1){
      session_start();
      $_SESSION['email']=$email;
      header('Location: book.php');
   }
   
   else{
      session_start();
      header('Location:loginfailed.php');
   }
   
  
?>