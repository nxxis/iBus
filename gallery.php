<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Gallery</title>
	<link rel="stylesheet" href="css/gallery.css">
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
</head>
<body>
	
	<header>
		<div class = "main">
			<div class = "logo">
				<img src="image/logo.png">
			</div>
			<ul>
				<li ><a href = "home.php">Home</a></li>
				<li class="active"><a href = "gallery.php">Gallery</a> </li>
				<li><a href = "#">About Us</a></li>
				<li><a href = "contacts.php">Contacts </a></li>

					
			</ul>
		</div>
	</header><br><br><br><br><br><br>
	
		<div class="wrapper">
		<h1>Gallery</h1>
		</div>
	


	<div class="slidershow middle">
		<div class="slides">
			<input type="radio" name="r" id="r1" checked>
			<input type="radio" name="r" id="r2">
			<input type="radio" name="r" id="r3">
			<input type="radio" name="r" id="r4">
			<input type="radio" name="r" id="r5">

			<div class="slide s1">
			<img src="image/gal.jpg" alt="">
			
		</div>
			<div class="slide">
			<img src="image/gal1.jpg" alt="">
			
		</div>
			<div class="slide">
			<img src="image/gal2.jpg" alt="">
			
		</div>
			<div class="slide">
			<img src="image/gal3.jpg" alt="">
			
		</div>
			<div class="slide">
			<img src="image/gal4.jpg" alt="">
			
		</div>

		<div class="navigation">
			<label for="r1" class="bar"></label>
			<label for="r2" class="bar"></label>
			<label for="r3" class="bar"></label>
			<label for="r4" class="bar"></label>
			<label for="r5" class="bar"></label>
		</div>
		
	</div>
</div>
</body>
</html>