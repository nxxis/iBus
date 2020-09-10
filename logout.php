<?php
session_start();
session_destroy();
unset($_SESSION['email']);
echo '<script>
alert("Logged Out Successfully!");
window.location.href="home.php";
</script>';
?>