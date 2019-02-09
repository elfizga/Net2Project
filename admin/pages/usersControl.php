<?php 

include 'layout/init.php';
session_start();
ob_start(); // Output Buffering Start
$pageTitle = 'Members';
if(isset($_SESSION['userId']) && $_SESSION['userId'] > 0) {
$do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
      ادارة المستخدمين
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
  <?php
$isError = false ;
$message ="";
?>
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
            <li class="nav-item  ">
              <a class="nav-link" href="jobsControl.php">
                <i class="material-icons">content_paste
                </i>
                <p>إدارة الوظائف 
                </p>
              </a>
            </li>
            <li class="nav-item active">
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
              <a class="navbar-brand" href="#pablo">ادارة المستخدمين
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
                  <input type="text" value="" class="form-control" placeholder="Search...">
                  <button type="submit" class="btn btn-white btn-round btn-just-icon">
                    <i class="material-icons">search
                    </i>
                    <div class="ripple-container">
                    </div>
                  </button>
                </div>
              </form>
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="#pablo">
                    <i class="material-icons">dashboard
                    </i>
                    <p class="d-lg-none d-md-block">
                      Stats
                    </p>
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">notifications
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
                    <a class="dropdown-item" href="personalPage.php">الصفحة الشخصية
                    </a>
                    <div class="dropdown-divider">
                    </div>
                    <a class="dropdown-item" href="logout.php">تسجيل الخروج
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
if ($do == 'Manage') { // Manage Members Page
$query = '';
// Select All  Except Admin 
$stmt = $con->prepare("SELECT 	
user.ID as userID,
user.firstName,
user.lastName,
user.email,
user.phone,
city.name as city
FROM user
INNER JOIN city ON user.city_ID = city.ID
WHERE userType_ID != 3 $query ORDER BY user.ID DESC");
// Execute The Statement
$stmt->execute();
// Assign To Variable 
$rows = $stmt->fetchAll();
if (! empty($rows)) {
?>
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title "> جدول ادارة المستخدمين
                    </h4>
                    <p class="card-category">جدول لعرض كافة مستخدمين النظام   
                    </p>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead class=" text-primary">
                          <th>
                            رقم المستخدم
                          </th>
                          <th>
                            الاسم الاول
                          </th>
                          <th>
                            الاسم الاخير
                          </th>
                          <th>
                            البريد الالكتروني
                          </th>
                          <th>
                            رقم الهاتف
                          </th>
                          <th>
                            المدينة             
                          </th>
                          <th>
                            تـــعديــل   
                          </th>
                          <th>
                            حــــذف
                          </th>
                        </thead>
                        <tbody>
                          <?php
foreach($rows as $row) {
echo "<tr>";
echo "<td>" . $row['userID'] . "</td>";
echo "<td class='fname'>" . $row['firstName'] . "</td>";
echo "<td  class='lname'>" . $row['lastName'] . "</td>";
echo "<td class='email'>" . $row['email'] . "</td>";
echo "<td class='phone'>" . $row['phone'] ."</td>";
echo "<td class='city'>" . $row['city'] ."</td>";
echo "<td>" . " <button type='button' rel='tooltip' title='Edit Task' class='editrequest btn btn-primary btn-link btn-sm'  data-toggle='modal' data-target='#editModal'  data-id='". $row['userID'] ."'> <i class='material-icons'>edit</i> </button>" . " </td> ";
echo "<td>" . " <button type='button' rel='tooltip' title='Remove' class='delrequest btn btn-danger btn-link btn-sm' 
data-id='". $row['userID'] ."'> <i class='material-icons'>close</i> </button> " . " </td> ";
echo "</tr>";
}
?>
                          <!-- Modal -->
                          <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalCenterTitle">تعديل بيانات المستخدم
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
                                        <input type="hidden" id="memberId" name="ID"/>
                                      </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-7">
                                          <div class="form-group">
                                            <label class="bmd-label-floating"> الاسم الاول 
                                            </label>
                                            <input type="text" class="form-control" id="fname" name="firstName"> 
                                          </div>
                                        </div>
                                        <div class="col-md-5">
                                          <div class="form-group">
                                            <label class="bmd-label-floating"> الاسم الاخير 
                                            </label>
                                            <input type="text" class="form-control" id="lname" name="lastName">
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label class="bmd-label-floating"> البريد الالكتروني 
                                            </label>
                                            <input type="text" class="form-control" id="email" name="email">
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label class="bmd-label-floating"> رقم الهاتف 
                                            </label>
                                            <input type="text" class="form-control" id="phone" name="phone">
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-12">
                                          <div class="form-group">
                                            <select class="form-control"  name="city_ID" data-constraints="@Selected" id="city">
                                              <option label=" اختر المدينة " selected="selected">
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
                                          <label class="bmd-label-floating"> تاريخ النشر 
                                          </label>
                                          <input type="text" class="form-control" id="date" name="date">
                                        </div>
                                      </div>                                                                            
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <select class="form-control"  name="userType_ID" data-constraints="@Selected" id="userType">
                                              <option label=" اختر نوع المستخدم " selected="selected">
                                              </option>
<?php
global $con;
$query = $con->prepare("SELECT * FROM user_type;");
$query->execute();
$userTypes = $query->fetchAll();
foreach($userTypes as $type) {
echo '<option value="' . $type['ID'] . '">' . $type["typeName"] .'</option>';
}
?>
                                            </select>
                                          </div>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-12">
                                          <div class="form-group">
                                            <label class="bmd-label-floating">كلمة المرور
                                            </label>
                                            <input type="password" class="form-control" name="password" id="password">
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
              </div>
            </div>
            <div>
          
            <i class="fa fa-plus">
            </i>
            <a href="addMember.php">اضافة عضو 
            </a>
          
        </div>
      </div>
    </div>
    </div>
  </div>
</div>
<?php }} ?> 
<footer class="footer">
  <div class="container-fluid">
    <div class="copyright float-right">
      copyrights
      &copy;
      2019 
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
<script src="../assets/jssweetalert2.min.js">
</script>
<script>
  $(document).ready(function() {
    $().ready(function() {
      $sidebar = $('.sidebar');
      $sidebar_img_container = $sidebar.find('.sidebar-background');
      $full_page = $('.full-page');
      $sidebar_responsive = $('body > .navbar-collapse');
      window_width = $(window).width();
      fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();
      if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
        if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
          $('.fixed-plugin .dropdown').addClass('open');
        }
      }
      $('.fixed-plugin a').click(function(event) {
        // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
        if ($(this).hasClass('switch-trigger')) {
          if (event.stopPropagation) {
            event.stopPropagation();
          }
          else if (window.event) {
            window.event.cancelBubble = true;
          }
        }
      }
                                );
      $('.fixed-plugin .active-color span').click(function() {
        $full_page_background = $('.full-page-background');
        $(this).siblings().removeClass('active');
        $(this).addClass('active');
        var new_color = $(this).data('color');
        if ($sidebar.length != 0) {
          $sidebar.attr('data-color', new_color);
        }
        if ($full_page.length != 0) {
          $full_page.attr('filter-color', new_color);
        }
        if ($sidebar_responsive.length != 0) {
          $sidebar_responsive.attr('data-color', new_color);
        }
      }
                                                 );
      $('.fixed-plugin .background-color .badge').click(function() {
        $(this).siblings().removeClass('active');
        $(this).addClass('active');
        var new_color = $(this).data('background-color');
        if ($sidebar.length != 0) {
          $sidebar.attr('data-background-color', new_color);
        }
      }
                                                       );
      $('.fixed-plugin .img-holder').click(function() {
        $full_page_background = $('.full-page-background');
        $(this).parent('li').siblings().removeClass('active');
        $(this).parent('li').addClass('active');
        var new_image = $(this).find("img").attr('src');
        if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
          $sidebar_img_container.fadeOut('fast', function() {
            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $sidebar_img_container.fadeIn('fast');
          }
                                        );
        }
        if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
          var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');
          $full_page_background.fadeOut('fast', function() {
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
            $full_page_background.fadeIn('fast');
          }
                                       );
        }
        if ($('.switch-sidebar-image input:checked').length == 0) {
          var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
          var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');
          $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
          $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
        }
        if ($sidebar_responsive.length != 0) {
          $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
        }
      }
                                          );
      $('.switch-sidebar-image input').change(function() {
        $full_page_background = $('.full-page-background');
        $input = $(this);
        if ($input.is(':checked')) {
          if ($sidebar_img_container.length != 0) {
            $sidebar_img_container.fadeIn('fast');
            $sidebar.attr('data-image', '#');
          }
          if ($full_page_background.length != 0) {
            $full_page_background.fadeIn('fast');
            $full_page.attr('data-image', '#');
          }
          background_image = true;
        }
        else {
          if ($sidebar_img_container.length != 0) {
            $sidebar.removeAttr('data-image');
            $sidebar_img_container.fadeOut('fast');
          }
          if ($full_page_background.length != 0) {
            $full_page.removeAttr('data-image', '#');
            $full_page_background.fadeOut('fast');
          }
          background_image = false;
        }
      }
                                             );
      $('.switch-sidebar-mini input').change(function() {
        $body = $('body');
        $input = $(this);
        if (md.misc.sidebar_mini_active == true) {
          $('body').removeClass('sidebar-mini');
          md.misc.sidebar_mini_active = false;
          $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();
        }
        else {
          $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');
          setTimeout(function() {
            $('body').addClass('sidebar-mini');
            md.misc.sidebar_mini_active = true;
          }
                     , 300);
        }
        // we simulate the window Resize so the charts will get updated in realtime.
        var simulateWindowResize = setInterval(function() {
          window.dispatchEvent(new Event('resize'));
        }
                                               , 180);
        // we stop the simulation of Window Resize after the animations are completed
        setTimeout(function() {
          clearInterval(simulateWindowResize);
        }
                   , 1000);
      }
                                            );
    }
             );
  }
                   );
</script>
<script>
   $(document).ready(function(){
     $(".delrequest").click(function(){
       var ths = $(this);
       var thId = $(".delrequest").data("id");
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
         url: "delete-member-function.php",
         data: {ID : thId},
         type: 'POST'
       })
       .done(function(data){
         ths.parent("td").parent("tr").fadeOut(600, function(){
           ths.remove();
           Swal(
            ' تم المسح !',
            ' تم مسح السجل الذي قمت بإحتياره بنجاح',
            'success' )
         });
        
       })
       .fail(function(data){
          alert("error");
       });
        }
        })

     });
   });
</script>
<script>
  $('.editrequest').click(function(){
    var btn = $(this);
    editBtn = $(this);
    var memberId = $(this).data("id");
    
    $.ajax({
            dataType: 'json',
        	url: 'get-member-details.php' ,
	        data: { ID : memberId },
	        type : 'POST' })

      .done(function(response){
        $('#memberId').val(response.ID);
        $('#fname').val(response.firstName);
        $('#lname').val(response.lastName);
        $('#email').val(response.email);
        $('#phone').val(response.phone);
        $('#city').val(response.city_ID);
        $('#date').val(response.date);
        $('#userType').val(response.userType_ID);
        $('#password').val(response.password);
       
        
        

      })
      .fail(function(response){
        alert('error');

      });
      });
//form

     $('#reqForm').submit(function(e){
       e.preventDefault();
       console.log($(this).serialize());
       $.ajax({
        url: 'update-member.php' ,
	        data: $(this).serialize() ,
            type : 'POST'})

       .done(function(response){
            editBtn.parent("td").siblings(".fname").html($('#fname').val());
            editBtn.parent("td").siblings(".lname").html($('#lname').val());
            editBtn.parent("td").siblings(".email").html($('#email').val());
            editBtn.parent("td").siblings(".phone").html($('#phone').val());
            editBtn.parent("td").siblings(".city").html($('#city').val());
            $('#reqForm')[0].reset();
            $("#editModal").modal('toggle');
        })

        .fail(function(xhr, status, error){
            console.log(xhr.responseText);
            console.log("fail");
	    });

     });
</script>
<?php
} else {

  header('Location: index.php');
  
  exit();
  }
ob_end_flush(); // Release The Output
?>

</body>
<?php
ob_end_flush(); // Release The Output
?>
</html>
