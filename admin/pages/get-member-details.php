<?php
include 'layout/init.php';

$id = $_POST['ID'];
$query1 = $con->prepare(" SELECT *

FROM user WHERE user.ID = ? " );

 $query1->execute(array( $id ));
 $row = $query1->fetch();
 if (! empty($row)) {

        $Array = array();
        $Array['ID'] = $row['ID'];
        $Array['firstName'] = $row['firstName'];
        $Array['lastName'] = $row['lastName'];
        $Array['email'] = $row['email'];
        $Array['phone'] = $row['phone'];
        $Array['city_ID'] = $row['city_ID'];
         
    }

    echo json_encode($Array);  

?>