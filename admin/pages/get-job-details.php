<?php

include 'layout/init.php';

$id = $_POST['ID'];
$query1 = $con->prepare(" SELECT * FROM request WHERE request.ID = ? " );

 $query1->execute(array( $id ));
 $item = $query1->fetch();
 if (! empty($item)) {

        $myArray = array();
        $myArray['ID'] = $item['ID'];
        $myArray['title'] = $item['title'];
        $myArray['discription'] = $item['discription'];
        $myArray['initialPrice'] = $item['initialPrice'];
        $myArray['specialization_ID'] = $item['specialization_ID'];
        $myArray['email'] = $item['email'];
        $myArray['time'] = $item['time'];
        $myArray['jobType_ID'] = $item['jobType_ID'];
        $myArray['city_ID'] = $item['city_ID'];
         
    }

    echo json_encode($myArray);  

?>