
<!DOCTYPE html>
<html>

<head>

  <title>iBus</title>
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

</head>

<body>

  <nav class="navbar navbar-expand-md navbar-dark sticky-top ">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">

        <a href="home.php"><img src="image/logo.png" alt="some text" width=40 height=40>&nbsp;&nbsp;</a>
      </ul>

      <form class="form-inline mt-2 mt-md-0" method="POST" action="loginprocess.php">
        <input class="form-control mr-sm-2" type="text" placeholder="Email" aria-label="Search" id="email" name="email" required>
        <input class="form-control mr-sm-2" type="password" placeholder="Password" aria-label="Search" id="password" name="password" required>
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Log In </button>

      </form>
    </div>
  </nav>
  <div id="myModal" class="idmodal">


    <div class="modal-content">
      <span class="close">&times;</span>
      <div class="card-body">
        Email Already Taken!
      </div>
    </div>

  </div>

  <div class="row text-center equal-height-columns">
    <div class="col-md-7">
      <div class="equal-column-content">
        <section class="header">
          <h1>Travel Safe With Us</h1>
          <p>"Journey With Comfortablility"</p>
        </section>
      </div>
    </div>

    <div class="col-md-4">
      <div class="equal-column-content">

        <form action="signupdata.php" method="POST">
          <h2>Sign Up </h2>
          <div class="form-group">
            <input type="name" class="form-control" id="name" name="name" placeholder="Full Name" required>
          </div>

          <div class="form-group">
            <input type="phone" class="form-control" id="phone" name="phone" placeholder="Phone Number" required>
          </div>

          <div class="form-group">
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email Address" required>
            <small id="emailHelp" class="form-text text-muted"></small>
          </div>

          <div class="form-group">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
          </div>


          <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>
      </div>
    </div>

  </div>
  <script>
    var modal = document.getElementsByClassName("idmodal")[0];

    var btn = document.getElementsByClassName("btn")[0];

    var span = document.getElementsByClassName("close")[0];


    span.onclick = function() {
      modal.style.display = "none";
    }


    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }

    }
  </script>


</body>

</html>