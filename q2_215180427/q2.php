<!DOCTYPE html>
<html>
    <head>

    </head>

    <body>
<?php

include "q2con.php";
 

 try{
    $query = "INSERT INTO items(itemno,itemname,itemprice) VALUES
   (:itemno,:itemname,:itemprice)";
    $stmt = $con->prepare($query);
    $stmt->bindParam(':itemno', $_POST['itemno']);
    $stmt->bindParam(':itemname', $_POST['itemname'] );
    $stmt->bindParam(':itemprice', $_POST['itemprice'] );



    if ($stmt->execute()) 
   {
    echo " added successfully";
   }
    }
    catch (Exception $ex)
    {
   echo $ex->getMessage();
    }



?>
</body>
</html>