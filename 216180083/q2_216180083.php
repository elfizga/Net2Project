<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <title>Lazord El-Fizga</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/bootstrap-rtl.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
      <?php
        include "db_connection.php";
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $id = $_POST['itemid'];
        $name = $_POST['itemname'];
        $price = $_POST['price'];
        $query = $con->prepare( " INSERT INTO items SET itemno = ? , itemname = ? , itemprice = ? ;");
        $query->execute(array( $id , $name , $price )); }
        ?>
      <div class="col-md-12">
      <h2> اضافة قطعة جديدة </h2>
      <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
          <label for="itemid"> ادخل رقم القطعة :</label>
          <input type="text" class="form-control" name="itemid"  placeholder="رقم القطعة">
        </div>
        <div class="form-group">
          <label for="itemname"> ادخل اسم القطعة :</label>
          <input type="text" class="form-control" name="itemname" placeholder="اسم القطعة">
        </div>
        <div class="form-group">
          <label for="price">ادخل السعر :</label>
          <input type="text" class="form-control" name="price" id="price" placeholder="ادحل السعر ">
        </div>
          <input type="submit" class="btn btn-default" value="اضافة">
      </form>
      </div>
      </div>
    </div>
  </div>
</body>
</html>
