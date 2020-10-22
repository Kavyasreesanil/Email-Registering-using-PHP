<?php
    session_start();
    $db = mysqli_connect("localhost","root","kavya","Register");

    if (isset($_POST['Registerbtn'])){
        // session_start();
        $username = ($_POST['username']);
        $email =($_POST['email']);
        $password = ($_POST['password']);
        $password2 = ($_POST['password2']);

        if ($password == $password2){
             $password =md5($password);
             $sql ="INSERT INTO users (username, email, password) VALUES ('$username' , '$email' , '$password')";
             mysqli_query($db , $sql);
             $_SESSION['message'] = "Succesfully logged in";
             $_SESSION['username'] = $username;
             header("location :home.php");
            }else{
                $_SESSION['message'] ="The password you entered does not match";
            }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Registration Email</title>
        <link  rel = "stylesheet" type ="text/css" href ="reg.css">
       </head>
       <body>
           <div class ="header">
               <h3>Email Registration Form</h3>
               </div>
               <div class ="main">
    <form method ="POST" action="Reg.php">
        <div id ="reg">
        <table>
            <tr>
            <td> Username :</td>   
            <td><input type ="text" name ="Username"  class ="textInput" placeholder ="enter your name"></td>
        <label class ="username" ></label>   
        </tr>
            <tr>
            <td> Email Id :</td>   
            <td><input type ="email" name ="Email"  class ="textInput" placeholder ="eg:someone@example.com"></td>
            </tr>
            <tr>
            <td> Password :</td>   
            <td><input type ="password" name ="password"  class ="textInput" placeholder ="password must be strong"></td>
            </tr>
            <tr>
            <td> Confirm Password :</td>   
            <td><input type ="password" name =" password2"  class ="textInput" placeholder ="Type the same password"></td>
            </tr>
            
           
            
        </table>
        <input type ="submit" name ="Registerbtn"  value ="Register" id="submit">
            
    </div>
    </form></div>
       </body>
</html>