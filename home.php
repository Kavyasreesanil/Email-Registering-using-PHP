<?php
session_start();
if(isset($_SESSION['username'])){
    $_SESSION['msg'] ="you must login first to view this page";
    header ("location      :login.php");

}
if (isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header("location  : login.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registration Email</title>
        <link  rel = "stylesheet" type ="text/css" href ="reg.css">
       </head>
       <body>
       <?php
       if(isset($_SESSION['success']))  : ?>
       <div>
       <h3>
       <?php
       echo $_SESSION['success'];
       unset ($_SESSION['success']);
       ?>
       </h3>
       </div>
       <?php endif ?>
                  
              
               <?php if(isset($_SESSION['username']))   : ?>
               <h3> welcome <?php echo $_SESSION['username'] ; ?></h3>

        </body>
   </html>     