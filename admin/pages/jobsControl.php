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
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="" style="direction: rtl;">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
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
          <li class="nav-item active ">
            <a class="nav-link" href="jobsControl.php">
              <i class="material-icons">content_paste</i>
              <p>إدارة الوظائف </p>
            </a>
          </li>
          <li class="nav-item ">
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
            <a class="navbar-brand" href="#pablo"> إدارة الوظائف </a>
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
                <input type="text" value="" class="form-control" placeholder=" بحث ...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons"> search </i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="material-icons"> dashboard </i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons"> notifications </i>
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
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="#">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Log out</a>
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
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title "> جدول إدارة الوظائف</h4>
                  <p class="card-category"> لعرض كافة تفاصيل الوظائف التي تم نشرها في النظام </p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          رقم الوظيفة
                        </th>
                        <th>
                          العنوان
                        </th>
                        <th>
                          الوصف
                        </th>
                        <th>
                          السعر
                        </th>
                        <th>
                          مجال العمل 
                        </th>
                        <th>
                          تاريخ النشر                       
                        </th>
                        <th>
                            تـــعديــل   
                        </th>
                        <th>
                               حــــذف
                        </th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            1
                          </td>
                          <td>
                            Dakota Rice
                          </td>
                          <td>
                            Niger
                          </td>
                          <td>
                            $36,738
                          </td>
                          <td class="text-primary">
                            $36,738
                          </td>
                           <td>
                            16/11/2018
                           </td>
                           <td>
                              <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                  <i class="material-icons">edit</i>
                              </button>
                              </td>
                              <td>
                              <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                  <i class="material-icons">close</i>
                              </button>
                           </td>
                        </tr>
                        <tr>
                            <td>
                              1
                            </td>
                            <td>
                              Dakota Rice
                            </td>
                            <td>
                              Niger
                            </td>
                            <td>
                              $36,738
                            </td>
                            <td class="text-primary">
                              $36,738
                            </td>
                             <td>
                              16/11/2018
                             </td>
                             <td>
                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                    <i class="material-icons">edit</i>
                                </button>
                                </td>
                                <td>
                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                    <i class="material-icons">close</i>
                                </button>
                             </td>
                          </tr>
                          <tr>
                              <td>
                                1
                              </td>
                              <td>
                                Dakota Rice
                              </td>
                              <td>
                                Niger
                              </td>
                              <td>
                                $36,738
                              </td>
                              <td class="text-primary">
                                $36,738
                              </td>
                               <td>
                                16/11/2018
                               </td>
                               <td>
                                  <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                      <i class="material-icons">edit</i>
                                  </button>
                                  </td>
                                  <td>
                                  <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                      <i class="material-icons">close</i>
                                  </button>
                               </td>
                            </tr>
                            <tr>
                                <td>
                                  1
                                </td>
                                <td>
                                  Dakota Rice
                                </td>
                                <td>
                                  Niger
                                </td>
                                <td>
                                  $36,738
                                </td>
                                <td class="text-primary">
                                  $36,738
                                </td>
                                 <td>
                                  16/11/2018
                                 </td>
                                 <td>
                                    <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                        <i class="material-icons">edit</i>
                                    </button>
                                    </td>
                                    <td>
                                    <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                        <i class="material-icons">close</i>
                                    </button>
                                 </td>
                              </tr>
                              <tr>
                                  <td>
                                    1
                                  </td>
                                  <td>
                                    Dakota Rice
                                  </td>
                                  <td>
                                    Niger
                                  </td>
                                  <td>
                                    $36,738
                                  </td>
                                  <td class="text-primary">
                                    $36,738
                                  </td>
                                   <td>
                                    16/11/2018
                                   </td>
                                   <td>
                                      <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                          <i class="material-icons">edit</i>
                                      </button>
                                      </td>
                                      <td>
                                      <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                          <i class="material-icons">close</i>
                                      </button>
                                   </td>
                                </tr>
                      </tbody>
                    </table>
                  </div>
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
