<?php
    session_start();
  require_once "db.php";

  if(isset($_SESSION['user_email'])!="") {
    header("Location: home.php");
    }
    if (isset($_POST['signup'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $sql="SELECT * FROM users WHERE email = '" . $email. "'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $email_error = "Email already registered";
            }
          } 
          else {
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']); 
            if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
                $name_error = "Name must contain only alphabets and space";
            }
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
                $email_error = "Please Enter Valid Email ID";
            }
            if(strlen($password) < 6) {
                $password_error = "Password must be minimum of 6 characters";
            }       
            if(strlen($mobile) < 10) {
                $mobile_error = "Mobile number must be minimum of 10 characters";
            }
            if($password != $cpassword) {
                $cpassword_error = "Password and Confirm Password doesn't match";
            }
            if (!$error) {
                if(mysqli_query($conn, "INSERT INTO users(name, email, mobile ,password) VALUES('" . $name . "', '" . $email . "', '" . $mobile . "', '" . md5($password) . "')")) {
                header("location: login.php");
                exit();
                } else {
                echo "Error: " . $sql . "" . mysqli_error($conn);
                }
            }
            mysqli_close($conn);
          }

        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="wrapper">
<div class="page-header" >
            <h2 style="color:#fff">Registration Form in PHP with Validation</h2>
             
                <p style="color:#fff">Please fill all fields in the form</p>
                </div >
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-offset-2">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label>Name</label>
                        <input id="input_" type="text" name="name" class="form-control" value="" maxlength="50" required="">
                        <span class="text-danger_" style="color:orange;"><?php if (isset($name_error)) echo $name_error; ?></span>
                    </div>

                    <div class="form-group ">
                        <label>Email</label>
                        <input id="input_" type="email" name="email" class="form-control" value="" maxlength="30" required="">
                        <span class="text-danger_"><?php if (isset($email_error)) echo $email_error; ?></span>
                    </div>

                    <div class="form-group">
                        <label>Mobile</label>
                        <input id="input_" type="text" name="mobile" class="form-control" value="" maxlength="12" required="">
                        <span class="text-danger_"><?php if (isset($mobile_error)) echo $mobile_error; ?></span>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input id="input_" type="password" name="password" class="form-control" value="" maxlength="10" required="">
                        <span class="text-danger_"><?php if (isset($password_error)) echo $password_error; ?></span>
                    </div>  

                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input id="input_" type="password" name="cpassword" class="form-control" value="" maxlength="10" required="" >
                        <span class="text-danger_"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
                    </div>

                    <input type="submit" class="btn btn-primary" name="signup" value="Submit">
                    Already have a account?<a href="login.php" class="btn btn-default" style="color:red" ><b>Login</b></a>
                </form>
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
</div>
</body>
</html>
