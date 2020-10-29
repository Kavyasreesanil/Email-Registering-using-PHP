
<?php

session_start();
if(isset($_SESSION['user_name']) =="") {
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Welcome Page</title>
  <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'><link rel="stylesheet" href="./home_style.css">

</head>
<body>
<p id="got_name" style="display:none"> <?php echo $_SESSION['user_name']?></p>
<div class="background">
 <div class="container">
  <div class="row flex-column justify-content-center align-items-center text-center">
   <div class="col-sm-12 col-md-10 col-lg-8">
    <h1 id="time">12:00 AM</h1>
    <h3 id="day" class="display-5">Monday, January 01</h3>
    <h2 id="greeting">Good Morning, User.</h2>
    <h3>Email :- <?php echo $_SESSION['user_email']?></h3>
    <a href="logout.php" class="btn btn-primary">Logout</a>
   </div><!-- /.col -->
   
  </div><!-- /.row -->
	 <div class="row justify-content-center">
	 	<div class="col-sm-12 col-md-10 col-lg-6">
	 	</div><!-- /.col -->
	 </div><!-- /.row -->
 </div><!-- /.container -->
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js'></script><script  src="./home_script.js"></script>

</body>
</html>
