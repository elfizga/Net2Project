<?php 
include 'layout/init.php';
$id = $_POST['ID'];
$title = $_POST['title'];
$discription = $_POST['discription'];
$initialPrice = $_POST['initialPrice'];
$email = $_POST['email'];
$time = $_POST['time'];
$spec = $_POST['spec'];
$cityName = $_POST['cityName'];
$jobType = $_POST['jobType'];


$query1 = $con->prepare(" UPDATE request SET title = ? , discription = ? , initialPrice = ? , email = ? , time = ?  WHERE ID = ?" );
$query1->execute(array( $title , $discription , $initialPrice , $email , $time , $id ));

?>