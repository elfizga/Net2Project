<?php
 $servername = "mysql:host=localhost;dbname=items";
 $username = "root";
 $password = "";
 $option = array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
try {
    $con = new PDO($servername , $username , $password , $option );
    $con->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo $e->getMessage();
}
 ?>