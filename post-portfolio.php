<?php
 include 'include/db_connnection.php';
 $isError = false ;
 $message ="";

 if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $title=$_POST["portfolio-title"];
    $desc=$_POST["description"];

    if(empty($title)){
        $message .= " من فضلك ادخل العنوان  <br />" ;
        $isError = true ;
    }
    if(empty($desc)){
    $message .= "  من فضلك ضع وصف للعمل  <br />" ;
    $isError = true ;
    }

    $imageName = "";
    if (isset($_FILES["portfolio"]["name"])) {
    $image = $_FILES['portfolio'];
    $imageName = rand(0, 100000) . "_" . $image['name'];
    move_uploaded_file($image['tmp_name'], "images/" . $imageName);
    } else {
    $imageName = "avatar.jpg";
    }

    if ($isError == false && isset($_SESSION['userId']) )
    {
    global $con;
    $query1 = $con->prepare(
        "SELECT ID FROM technician WHERE user_ID = ?"
    );

    $query1->execute(array( $_SESSION['userId'] ));
    $result = $query1->fetch();
    $id = $result['ID'];
    $query = $con->prepare("INSERT INTO portfolio
        SET 
        title = ? ,
        description = ? ,
        technician_ID = ?, 
        imageURL = ?;");
    $query->execute(
        array( $title , $desc , $id, $imageName ));
        echo $imageName ;
        }
      else 
        echo "error" ;
        
    }  
?>