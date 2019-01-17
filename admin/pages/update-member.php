<?php 
include 'layout/init.php';

$id = $_POST['ID'];
$fname = $_POST['firstName'];
$lname = $_POST['lastName'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$city_ID = $_POST['city_ID'];



$query1 = $con->prepare(" UPDATE user SET firstName = ? , lastName = ? , email = ? , phone = ? , city_ID = ?  WHERE ID = ?" );
$query1->execute(array( $fname , $lname , $email , $phone , $city_ID  ,$id ));


?>