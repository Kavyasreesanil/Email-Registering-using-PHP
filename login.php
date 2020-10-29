<?php
ini_set('display_errors' , '1');
session_start();

require_once "db.php";

if(isset($_SESSION['user_email'])!="") {
    header("Location: home.php");
}

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $email_error = "Please Enter Valid Email ID";
    }
    if(strlen($password) < 6) {
        $password_error = "Password must be minimum of 6 characters";
    }  

    $sql="SELECT * FROM users WHERE email = '" . $email. "' and password = '" . md5($password). "'";
   
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $_SESSION['user_name'] = $row['name'];
        $_SESSION['user_email'] = $row['email'];
        $_SESSION['user_mobile'] = $row['mobile'];
        header("Location: home.php");
      }
    } else {
        $error_message="Email or Password is Incorrect";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="style2.css" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="wrapper">
<div class="page-header" style="margin-top:10%" >
            <h2 style="color:#fff">LOGIN</h2>
             
                <p style="color:#fff">Please fill all fields in the form</p>
                </div >
              
    <div class="container_">
        <div class="row">
            <div class="col-lg-10">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group ">
                        <label>Email</label>
                        <input  id="input_"  type="email" name="email" class="form-control" value="" maxlength="30" required="">
                        <span class="text-danger_"><?php if (isset($email_error)) echo $email_error; ?></span>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input  id="input_"  type="password" name="password" class="form-control" value="" maxlength="10" required="">
                        <span class="text-danger_"><?php if (isset($password_error)) echo $password_error; ?></span>
                    </div>  
                    <center><span class="text-danger_"><?php if (isset($error_message)) echo $error_message; ?></span></center>
                    <br>
                    <input type="submit" class="btn btn-primary" name="login" value="Submit">
                    <br>
                    You don't have account? <b> <a href="registration.php" class="mt-3">Click Here</a> </b>
                    <br>
                    Forget Password? <b> <a href="reset.php" class="mt-3">Click Here</a> </b>
                </form>
            </div>
        </div>     
    </div>
</div>
<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
    </ul>
</body>
</html>
