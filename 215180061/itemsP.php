



<?php

Include "db_con.php";

$query= "INSERT INTO items(itemno,itemname,itemprice) VALUES (:itemno,:itemname,:itemprice)";

$stmt=$con->prepare($query);

$stmt->bindParam(':itemno', $_POST['itemno']);

$stmt->bindParam(':itemname', $_POST['itemname']);

$stmt->bindParam('itemprice', $_POST['itemprice']);

$stmt->execute();


?> 


