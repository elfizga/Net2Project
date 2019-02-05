<?php 
include 'layout/init.php';
$do = isset($_GET['do']) ? $_GET['do'] : 'Manage';
ob_start(); // Output Buffering Start
$pageTitle = 'Requests';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
      إدارة الوظائف
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
    <link href="../assets/css/material-dashboard-rtl.css?v=1.1" rel="stylesheet" />
    <link href="../assets/css/sweetalert2.min.css" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/demo/demo.css" rel="stylesheet" />
  </head>
  <body class="" style="direction: rtl;">
    <div class="wrapper ">
      <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
        <div class="logo">
          <a href="#" class="simple-text logo-normal">
            لوحة التحكم
          </a>
        </div>
        <div class="sidebar-wrapper">
          <ul class="nav">
            <li class="nav-item  ">
              <a class="nav-link" href="dashboard.php">
                <i class="material-icons">dashboard
                </i>
                <p> الرئيسية 
                </p>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="personalPage.php">
                <i class="material-icons">person
                </i>
                <p> الصفحة الشخصية 
                </p>
              </a>
            </li>
            <li class="nav-item active ">
              <a class="nav-link" href="jobsControl.php">
                <i class="material-icons">content_paste
                </i>
                <p>إدارة الوظائف 
                </p>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="usersControl.php">
                <i class="material-icons">library_books
                </i>
                <p> إدارة المستخدمين 
                </p>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
          <div class="container-fluid">
            <div class="navbar-wrapper">
              <a class="navbar-brand" href="#pablo"> إدارة الوظائف 
              </a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
              <span class="sr-only">Toggle navigation
              </span>
              <span class="navbar-toggler-icon icon-bar">
              </span>
              <span class="navbar-toggler-icon icon-bar">
              </span>
              <span class="navbar-toggler-icon icon-bar">
              </span>
            </button>
            <div class="collapse navbar-collapse justify-content-end">
              <form class="navbar-form">
                <div class="input-group no-border">
                  <input type="text" value="" class="form-control" placeholder=" بحث ...">
                  <button type="submit" class="btn btn-white btn-round btn-just-icon">
                    <i class="material-icons"> search 
                    </i>
                    <div class="ripple-container">
                    </div>
                  </button>
                </div>
              </form>
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="#pablo">
                    <i class="material-icons"> dashboard 
                    </i>
                    <p class="d-lg-none d-md-block">
                      Stats
                    </p>
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons"> notifications 
                    </i>
                    <span class="notification">5
                    </span>
                    <p class="d-lg-none d-md-block">
                      Some Actions
                    </p>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Mike John responded to your email
                    </a>
                    <a class="dropdown-item" href="#">You have 5 new tasks
                    </a>
                    <a class="dropdown-item" href="#">You're now friend with Andrew
                    </a>
                    <a class="dropdown-item" href="#">Another Notification
                    </a>
                    <a class="dropdown-item" href="#">Another One
                    </a>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">person
                    </i>
                    <p class="d-lg-none d-md-block">
                      Account
                    </p>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                    <a class="dropdown-item" href="personalPage.php"> الملف الشخصي 
                    </a>
                    <div class="dropdown-divider">
                    </div>
                    <a class="dropdown-item" href="logout.php"> تسجيل الخروج
                    </a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
        <div class="content">
          <?php
//session_start();
if ($do == 'Manage') {
$stmt = $con->prepare("SELECT 
request.*, 
specialization.Name AS spec , job_type.type AS jobType ,
user.firstName , user.lastName , city.name AS cityName
FROM 
request
INNER JOIN
city 
ON 
request.city_ID = city.ID
INNER JOIN 
specialization 
ON 
specialization.ID = request.specialization_ID 
INNER JOIN 
customer
ON 
customer.ID = request.customer_ID
INNER JOIN 
job_type 
ON 
job_type.ID = request.jobType_ID
INNER JOIN 
user
ON 
user.ID = customer.user_ID
ORDER BY 
request.ID DESC");
// Execute The Statement
$stmt->execute();
// Assign To Variable 
$items = $stmt->fetchAll();
if (! empty($items)) {
?>
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title "> جدول إدارة الوظائف
                    </h4>
                    <p class="card-category"> لعرض كافة تفاصيل الوظائف التي تم نشرها في النظام 
                    </p>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead class=" text-primary">
                          <th> رقم الوظيفة 
                          </th>
                          <th> العنوان 
                          </th>
                          <th> الوصف 
                          </th>
                          <th> السعر 
                          </th>
                          <th> البريد الإلكتروني  
                          </th>
                          <th> تاريخ النشر 
                          </th>
                          <th> تـــعديــل 
                          </th>
                          <th> حــــذف 
                          </th>
                        </thead>
                        <tbody>
                          <?php
foreach($items as $item) {
echo "<tr>";
echo "<td >" . $item['ID'] . "</td>";
echo "<td style='max-width:100px;' class='jobTitle'>" . $item['title'] . "</td>";
echo "<td style='max-width:300px;' class='jobDiscription'>" . $item['discription'] . "</td>";
echo "<td class='jobPrice'>" . $item['initialPrice'] . "</td>";
echo "<td class='jobEmail'>" . $item['email'] ."</td>";
echo "<td class='jobTime'>" . $item['time'] ."</td>";
echo "<td>" . " <button type='button' title='Edit Task' class='editReq btn btn-primary btn-link btn-sm' data-toggle='modal' data-target='#editModal' 
data-id='". $item['ID'] ."'> <i class='material-icons'>edit</i> </button>" . " </td> ";
echo "<td> <button type='button' title='Remove' class='delReq btn btn-danger btn-link btn-sm' 
data-id='". $item['ID'] ."'> <i class='material-icons'>close</i> </button> </td> ";
echo "</tr>";
}
?>
                          <!-- Modal -->
                          <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalCenterTitle"> تعديل بيانات الوظيفة
                                  </h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;
                                    </span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form id="reqForm">
                                    <div class="row">
                                      <div>
                                        <input type="hidden" id="jobID" name="ID"/>
                                      </div>
                                      <div class="col-md-7">
                                        <div class="form-group">
                                          <label class="bmd-label-floating"> عنوان الوظيفة 
                                          </label>
                                          <input type="text" class="form-control" id="jobTitle" name="title"> 
                                        </div>
                                      </div>
                                      <div class="col-md-5">
                                        <div class="form-group">                                                                            
                                          <select class="form-control" id="jobCity" data-placeholder="اختر مدينتك " name="city_ID" data-constraints="@Selected">
                                            <option selected="selected">  اختر مدينتك 
                                            </option>
                                            <?php
global $con;
$query = $con->prepare("SELECT * FROM city;");
$query->execute();
$cities = $query->fetchAll();
foreach($cities as $city) {
echo '<option value="' . $city['ID'] . '">' . $city["name"] .'</option>';
}
?>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label class="bmd-label-floating"> السعر 
                                          </label>
                                          <input type="text" class="form-control" id="jobPrice" name="initialPrice">
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <select class="form-control" id="jobType" data-placeholder=" اختر نوع الوظيفة " name="jobType_ID" data-constraints="@Selected">
                                            <option label=" اختر نوع الوظيفة " selected="selected"> اختر نوع الوظيفة 
                                            </option>
                                            <?php
global $con;
$query = $con->prepare("SELECT * FROM job_type;");
$query->execute();
$types = $query->fetchAll();
foreach($types as $type) {
echo '<option value="' . $type['ID'] . '">' . $type["type"] .'</option>';
}
?>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <label class="bmd-label-floating"> البريد الإلكتروني 
                                          </label>
                                          <input type="email" class="form-control" id="jobEmail" name="email">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <select class="form-control" id="jobSpec" data-placeholder= "اختر الصنف " name="specialization_ID" data-constraints="@Selected">
                                            <option label=" اختر مجال العمل " selected="selected"> اختر مجال العمل 
                                            </option>
                                            <?php
global $con;
$query = $con->prepare("SELECT * FROM specialization;");
$query->execute();
$categories = $query->fetchAll();
foreach($categories as $category) {
echo '<option value="' . $category['ID'] . '">' . $category["Name"] .'</option>';
}
?>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label class="bmd-label-floating"> تاريخ النشر 
                                          </label>
                                          <input type="text" class="form-control" id="jobDate" name="time">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <label class="bmd-label-floating"> وصف الوظيفة 
                                          </label>
                                          <textarea class="form-control" rows="7" id="jobDiscription" name="discription">
                                          </textarea>
                                        </div>
                                      </div>
                                    </div>
                                  </form>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق
                                  </button>
                                  <button type="submit" class="btn btn-primary" id="reqBtn" form="reqForm" > حفظ التغيرات 
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <?php }}
?>
              </div>
              <footer class="footer">
                <div class="container-fluid">
                  <div class="copyright float-right">
                    copyrights &copy; 2019
                    <br>
                    <br>
                  </div>
                </div>
              </footer>
            </div>
          </div>
          <!--   Core JS Files   -->
          <script src="../assets/js/core/jquery.min.js">
          </script>
          <script src="../assets/js/core/popper.min.js">
          </script>
          <script src="../assets/js/core/bootstrap-material-design.min.js">
          </script>
          <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js">
          </script>
          <!-- Plugin for the momentJs  -->
          <script src="../assets/js/plugins/moment.min.js">
          </script>
          <!--  Plugin for Sweet Alert -->
          <script src="../assets/js/plugins/sweetalert2.js">
          </script>
          <!-- Forms Validations Plugin -->
          <script src="../assets/js/plugins/jquery.validate.min.js">
          </script>
          <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
          <script src="../assets/js/plugins/jquery.bootstrap-wizard.js">
          </script>
          <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
          <script src="../assets/js/plugins/bootstrap-selectpicker.js">
          </script>
          <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
          <script src="../assets/js/plugins/bootstrap-datetimepicker.min.js">
          </script>
          <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
          <script src="../assets/js/plugins/jquery.dataTables.min.js">
          </script>
          <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
          <script src="../assets/js/plugins/bootstrap-tagsinput.js">
          </script>
          <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
          <script src="../assets/js/plugins/jasny-bootstrap.min.js">
          </script>
          <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
          <script src="../assets/js/plugins/fullcalendar.min.js">
          </script>
          <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
          <script src="../assets/js/plugins/jquery-jvectormap.js">
          </script>
          <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
          <script src="../assets/js/plugins/nouislider.min.js">
          </script>
          <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
          <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js">
          </script>
          <!-- Library for adding dinamically elements -->
          <script src="../assets/js/plugins/arrive.min.js">
          </script>
          <!--  Google Maps Plugin    -->
          <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE">
          </script>
          <!-- Chartist JS -->
          <script src="../assets/js/plugins/chartist.min.js">
          </script>
          <!--  Notifications Plugin    -->
          <script src="../assets/js/plugins/bootstrap-notify.js">
          </script>
          <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
          <script src="../assets/js/material-dashboard.js?v=2.1.1" type="text/javascript">
          </script>
          <!-- Material Dashboard DEMO methods, don't include it in your project! -->
          <script src="../assets/demo/demo.js">
          </script>
          <!-- sweet alert -->
          <script src="../assets/jssweetalert2.min.js">
          </script>
          <script>
   $(document).ready(function() {
       var editBtn ;
   // delete item 
   $(".delReq").click(function() {

    var btn = $(this);
	var theId = $(this).data("id");
    console.log(theId);
    Swal({
        title: ' هل أنت متأكد ؟',
        text: " لن تتمكن من استعادة هذا السجل ان قمت بالموافقة",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: ' أجل , قم بالمسح !',
        cancelButtonText: '  إغلاق '
        }).then((result) => {
        if (result.value) {
            $.ajax({
        	url: 'delete-job-function.php' ,
	        data: { ID : theId },
	        type : 'POST' })

            .done(function(data){
	    	btn.parent("td").parent("tr").fadeOut(500, function() {
		    btn.remove(); 
            Swal(
            ' تم المسح !',
            ' تم مسح السجل الذي قمت بإحتياره بنجاح',
            'success' )
         });
        }) 
             .fail(function(data){
	    	console.log("error");
 		     alert("error") ;
	        });
          } 
        });

}); 

});
        
</script>

<script>
// edit item
$(".editReq").click(function() {
    var btn = $(this);
    editBtn = $(this);
	var jobId = $(this).data("id");

    $.ajax({
            dataType: 'json',
        	url: 'get-job-details.php' ,
	        data: { ID : jobId },
	        type : 'POST' })

        .done(function(response){
            $('#jobID').val(response.ID);
            $('#jobTitle').val(response.title);
            $('#jobCity').val(response.city_ID);
            $('#jobPrice').val(response.initialPrice);
            $('#jobType').val(response.jobType_ID);
            $('#jobEmail').val(response.email);
            $('#jobSpec').val(response.specialization_ID);
            $('#jobDate').val(response.time);
            $('#jobDiscription').val(response.discription);
        })

        .fail(function(response){
 		    alert("error") ;
	    });
});
// form 

$("#reqForm").submit(function(e) {
    e.preventDefault();
    console.log($(this).serialize());
    $.ajax({
        	url: 'update-job-details.php' ,
	        data: $(this).serialize() ,
            type : 'POST' })

        .done(function(response){
            editBtn.parent("td").siblings(".jobTitle").html($('#jobTitle').val());
            editBtn.parent("td").siblings(".jobDiscription").html($('#jobDiscription').val());
            editBtn.parent("td").siblings(".jobPrice").html($('#jobPrice').val());
            editBtn.parent("td").siblings(".jobEmail").html($('#jobEmail').val());
            editBtn.parent("td").siblings(".jobTime").html($('#jobDate').val());
            $('#reqForm')[0].reset();
            $("#editModal").modal('toggle');
        })

        .fail(function(xhr, status, error){
            console.log(xhr.responseText);
            console.log("fail");
	    });

});

 </script>
          </body>
        <?php
ob_end_flush(); // Release The Output
?>
        </html>
