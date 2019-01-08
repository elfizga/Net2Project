<?php
include 'layout/init.php';
$id = $_POST['ID'];
echo $id ;
$query1 = $con->prepare( "DELETE FROM Request WHERE ID = ?"
);

$query1->execute(array( $id ));
?>