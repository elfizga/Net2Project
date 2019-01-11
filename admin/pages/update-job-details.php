<?php 
include 'layout/init.php';
$id = $_POST['ID'];
$title = $_POST['title'];
$discription = $_POST['discription'];
$initialPrice = $_POST['initialPrice'];
$email = $_POST['email'];
$time = $_POST['time'];
$specialization_ID = $_POST['specialization_ID'];
$city_ID = $_POST['city_ID'];
$jobType_ID = $_POST['jobType_ID'];


$query1 = $con->prepare(" UPDATE request SET title = ? , discription = ? , initialPrice = ? , email = ? , time = ? , city_ID = ? , jobType_ID = ? , specialization_ID = ?  WHERE ID = ?" );
$query1->execute(array( $title , $discription , $initialPrice , $email , $time , $city_ID , $jobType_ID , $specialization_ID ,$id ));


?>