<?php 
include "layout/init.php";
$id = $_POST['ID'];
$query = $con->prepare("DELETE FROM user WHERE ID = ?");
$query->execute(array($id));
?>




