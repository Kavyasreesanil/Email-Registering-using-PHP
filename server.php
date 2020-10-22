<?php
session_start();
$username ="";
$email="";

$errors = array();

$db = mysqli_connect("localhost","root","kavya","Register") or die("could not connect to database");
$username =  mysql_real_escape_string($db,$_POST['username']);
$email =  mysql_real_escape_string($db,$_POST['email']);
$password =  mysql_real_escape_string($db,$_POST['password']);
$password2 =  mysql_real_escape_string($db,$_POST['password2']);


if(empty($username)){array_push($errors, "username is required")};
if(empty($email)){array_push($errors, "email is required")};
if(empty($password)){array_push($errors, "password is required")};
if($password != $password2){array_push($errors,"password doesnt match")};
$user_check_query = "SELECT * FROM users WHERE username = '$username' or email ='$email' LIMIT 1";
$results = mysql_query($db, $user_check_query);
$user = mysql_fetch_assoc($results);
if ($user ){
    if($user['username']=== $username){aray_push($errors,"user already exist");}
    if($user['email']=== $email){aray_push($errors,"email already exist");}

}
if (count($errors))==0){
    $password = md5($password);
    $query ="INSERT  INTO users (username ,email,password) VALUES ('$username','$email','$password)";
    mysqli_query($db,$query);
    $_SESSION['username']=$username;
    $_SESSION['success']="successfully logged in";
    header ('location  :home.php')
}

?>
