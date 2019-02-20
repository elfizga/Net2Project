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
      <div class="col-md-9">
      <table class="table" id="table">
        <thead>
          <tr>
            <th scope="col"> رقم القطعة  </th>
            <th scope="col"> اسم القطعة </th>
            <th scope="col"> سعر القطعة </th>
          </tr>
        </thead>
        <tbody>
        <?php
        include "db_connection.php";
        $sql = " SELECT * FROM items";
        global $con;
        $query = $con->prepare($sql);
        $query->execute();
        $results = $query->fetchAll();
        foreach($results as $result) { ?>
          <tr>
            <th scope="row"><?php echo $result['itemno'] ;?></th>
            <td><?php echo $result['itemname'] ;?></td>
            <td><?php echo $result['itemprice'] ;?></td>
          </tr> 
        <?php } ?>
        </tbody>
      </table>
      </div>
      </div>
      </div>
      <button type="button" class="btn btn-outline-secondary" onclick="showtable();">عرض</button>
      <button type="button" class="btn btn-outline-secondary" onclick="hidetable();">اخفاء</button>
    </div>
  </div>
  <script>
  function hidetable() {
  document.getElementById("table").style.visibility = "hidden";
        }

   function showtable() {
  document.getElementById("table").style.visibility = "visible";
         }
  </script>
</body>
</html>
