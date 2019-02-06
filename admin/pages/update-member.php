<?php 
include 'layout/init.php';

$id = $_POST['ID'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$city_ID = $_POST['city_ID'];
$date = $_POST['date'];
$userType_ID = $_POST['userType_ID'];
$password = $_POST['password'];
$bio = $_POST['bio'];




$query1 = $con->prepare(" UPDATE user 
SET firstName = ? , lastName = ? , email = ? , phone = ? , city_ID = ? , date = ? , userType_ID = ? ,
password = ? , bio = ?
 WHERE ID = ?" );
$query1->execute(array( $firstName , $lastName , $email , $phone , $city_ID  ,
 $date , $userType_ID , $password , $bio , $id  ));


?>