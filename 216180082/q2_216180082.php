<?php include 'connect216180082.php'; ?>
<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>اضافة</title>
</head>
<body dir="rtl">
<?php
 if( $_SERVER['REQUEST_METHOD'] == 'POST'){
$id    = $_POST['ID'];
$name  = $_POST['itemName'];
$price = $_POST['price'];

global $con;
$query = $con->prepare("INSERT INTO items SET itemno = ? , itemname = ? , itemprice = ?;");
$query->execute(array($id , $name , $price));

echo 'تم اضافة القطعة بنجاح';
 }


?>

<h1> اضافة القطع </h1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"  enctype="multipart/form-data" method="post">
<label for="ID" > ادخل رقم القطعة </label>
<input type="text" placeholder="الرقم" name="ID" id="ID"> <br>

<label for="name" > ادخل اسم القطعة </label>
<input type="text" placeholder="الاسم" name="itemName" id="name"><br>

<label for="price" > ادخل سعر القطعة </label>
<input type="text" placeholder="السعر" name="price" id="price"><br>

<input type="submit" value="اضافة">


</form>