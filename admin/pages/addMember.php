 <?php
  ob_start(); 
 ?>
 <!doctype html>
   <html>
   <head>
   <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        اضافة مستخدم
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
  <body style="direction: rtl;">

 <?php include 'layout/init.php';?>
 <?php
    $isError = false ;
    $message ="";

    if( $_SERVER['REQUEST_METHOD'] == 'POST'){
         
        $firstname = $_POST["firstname"];
        $lastname  = $_POST["lastname"];
        $phone     = $_POST["phone"];
        $pass      = $_POST["password"];
        $email     = $_POST["email"];
        $city      = $_POST["location"];
        $userType  = $_POST["userType"];
        $spec      = $_POST["spec"];

        if(empty($firstname)){
            $message .= " من فضلك ادخل الاسم الاول <br />" ;
            $isError = true ;
        }
    
        if(empty($lastname)){
            $message .= " من فضلك ادخل الاسم الاخير  <br />" ;
            $isError = true ;
    
        }
    
        if(empty($phone)){
            $message .= " من فضلك ادخل رقم الهاتف<br />" ;
            $isError = true ;
        } 
    
        
    
        if(empty($userType)){
            $isError = true ;
        } 
    
        if(empty($city)){
            $isError = true ;
        } 
    
        if(empty($email)){
            $message .= "من فضلك ادخل البريد الالكتروني <br />" ;
            $isError = true ;
        } else  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message .= "يجب كتابة البريد الاكتروني بصيغة صحيحة <br />" ;
            $isError = true ;
        }


        if ($isError == false)
     {
         global $con;
         $query = $con->prepare("INSERT INTO user
         SET 
         firstName = ? ,
         lastName =? ,
         email = ? ,
         password = ? ,
         phone = ?,
         city_ID = ?,
         userType_ID = ? ;  ");

$query->execute(
    array(
     $firstname , $lastname  , $email, $pass , $phone , $city ,$userType
    ));

    $id = $con->lastInsertId();

    if($userType == 2){
        $query = $con->prepare("INSERT INTO technician
        SET 
        user_ID = ?,
        specialization_ID = ?;
        

    ");

    $query->execute(
        array(
            $id , $spec
        )
    ); 
    } 
    elseif($userType == 1){
        $query = $con->prepare("INSERT INTO customer
        SET 
        user_ID = ?
        
        ");

        $query->execute(
            array(
                $id 
            ));
    }
    
    $success = ' <div class="alert alert-success">
    <strong> تهانينا ! </strong> قم بتسجيل دخولك الأن .
    </div>'  ;
    echo $success ;
     
    }

    }
 ?>

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
            <i class="material-icons">dashboard</i>
            <p> الرئيسية </p>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="personalPage.php">
            <i class="material-icons">person</i>
            <p> الصفحة الشخصية </p>
          </a>
        </li>
        <li class="nav-item  ">
          <a class="nav-link" href="jobsControl.php">
            <i class="material-icons">content_paste</i>
            <p>إدارة الوظائف </p>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="usersControl.php">
            <i class="material-icons">library_books</i>
            <p> إدارة المستخدمين </p>
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
            <a class="navbar-brand" href="#pablo">اضافة مستخدم</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mike John responded to your email</a>
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="#">Another Notification</a>
                  <a class="dropdown-item" href="#">Another One</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="personalPage.php">الصفحة الشخصية</a>
                  
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="logout.php">تسجيل الخروج</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
      <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title"> اضافة مستخدم  </h4>
                  <p class="card-category"> أضافة مستخدم الى النظام </p>
                </div>
                <div class="card-body">
                <div class="rd-form rd-mailform form-lg" novalidate="novalidate">
                                        <div class="alert alert-danger hide_alert <?php
                         if($isError == true) { echo'show_alert';} ?>" id="erralert" style="display:none;">
                                            <strong> <?php echo $message ?> </strong>
                                        </div>
                  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" >
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating"> الاسم الاول </label>
                          <input type="text" class="form-control" name="firstname">
                        </div>
                      </div>
                      <div class="col-md-7">
                        <div class="form-group">
                          <label class="bmd-label-floating">الاسم الاخير </label>
                          <input type="text" class="form-control" name="lastname">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating"> البريد الالكتروني </label>
                          <input type="email" class="form-control" name="email">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating"> رقم الهاتف </label>
                          <input type="text" class="form-control" name="phone">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          
                          <select  class="form-control"  data-placeholder="اختر الصنف " name="spec" data-constraints="@Selected" id="spec" >
                           <option label="اختر مجال عملك " selected="selected"></option>
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
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          
                          <select class="form-control"  name="userType" data-constraints="@Selected" id="userType">
													
												
                           <option label=" اختر نوع المستخدم " selected="selected"></option>
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
                      
                      <div class="col-md-6">
                        <div class="form-group">
                         
                          <select class="form-control"  name="location" data-constraints="@Selected" id="location">
                          <option label=" اختر المدينة " selected="selected"></option>
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
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">كلمة المرور</label>
                          <input type="password" class="form-control" name="password">
                        </div>
                      </div>
                    </div>
                   
                    
                    <button type="submit" class="btn btn-primary pull-right"> اضافة </button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            </div>
        </div>
      </div>
      <footer class="footer">
          <div class="container-fluid">
            <div class="copyright float-right">
             copyrights
              &copy;
              2019 
              <br><br>
            </div>
          
          </div>
        </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="../assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="../assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="../assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="../assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="../assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="../assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="../assets/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="../assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>

  



  </body>
  </html>












                         
                                       

                           