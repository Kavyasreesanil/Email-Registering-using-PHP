<?php
    $servername='localhost';
    $username='root';
    $password='1234';
    $dbname = "my_db";
    $conn= new mysqli($servername,$username,$password,"$dbname");
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }
?>
