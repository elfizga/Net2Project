
<?php
$servername="mysql:host=localhost;dbname=items";
$user="root";
$password="";
$dbname="items";

try{
$con=new PDO($servername,$user,$password);
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


}
catch(PDOException $e){
    echo $e->getMassage(); 
}

?>
