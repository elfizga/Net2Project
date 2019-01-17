<?php
        include 'include/db_connnection.php';
    ?>
    <!DOCTYPE html>
    <html class="wide wow-animation" lang="en">

    <head>
        <title>انضم الينا </title>
        <meta name="viewport" content="width=device-width height=device-height initial-scale=1.0">
        <meta charset="utf-8">
        <link rel="icon" href=" images/koop_logo.png" type="image/x-icon">
        <link rel="stylesheet" href=" css/bootstrap.css">
        <link rel="stylesheet" href=" css/fonts.css">
        <link rel="stylesheet" href=" css/style.css" id="main-styles-link">
        <link href="https://fonts.googleapis.com/css?family=Tajawal" rel="stylesheet">
    </head>

    </head>

    <body style="direction: rtl ;">
        <style>
            .ie-panel {
                display: none;
                background: #212121;
                padding: 10px 0;
                box-shadow: 3px 3px 5px 0 rgba(0, 0, 0, .3);
                clear: both;
                text-align: center;
                position: relative;
                z-index: 1;
            }
            
            html.ie-10 .ie-panel,
            html.lt-ie-10 .ie-panel {
                display: block;
            }
        </style>

        <div class="ie-panel">
            <a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src=" images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a>
        </div>

        <div class="preloader">
            <div class="preloader-body">
                <div class="preloader-item">
                    <svg width="40" height="40" viewbox="0 0 40 40">
                        <polygon class="rect" points="0 0 0 40 40 40 40 0"></polygon>
                    </svg>
                </div>
            </div>
        </div>

        <div class="page animated">
            <?php include 'include/header.php';?>

                <?php
    $isError = false ;
    $message ="";
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $firstname=$_POST["name1"];
        $lastname=$_POST["name2"];
        $phone=$_POST["phone"];
        $pass1=$_POST["pass1"];
        $pass2=$_POST["pass2"];
        $email=$_POST["email"];
        $spec=$_POST["job-category"];
        $city=$_POST["location"];
        $bio = $_POST['bio'];

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
        } else if(strlen($phone) < 9 ) {
            $message .= " يجب ان لا يكون طول رقم الهاتف اقل من 9 ارقام<br />" ;
            $isError = true ;
        }

        if(empty($pass1)){
            $message .= " من فضلك ادخل كلمة المرور <br /> " ;
            $isError = true ;
        } else if(strlen($pass1) < 8) {
            $message .= " يجب ان لا يكون طول كلمة المرور اقل من 8 احرف <br />" ;
            $isError = true ;
        }

        if(empty($pass2)){
            $message .= "من فضلك ادخل  تأكيد كلمة المرور <br />" ;
            $isError = true ;
        } 

        if($pass1 != $pass2){
            $message .= " من فضلك تأكد من تطابق كلمة المرور <br />" ;
            $isError = true ; 
        }

        if(empty($email)){
            $message .= "من فضلك ادخل البريد الالكتروني <br />" ;
            $isError = true ;
        } else  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message .= "يجب كتابة البريد الاكتروني بصيغة صحيحة <br />" ;
            $isError = true ;
        }

        if (isset($_FILES["userImg"]["name"])) {
            $image = $_FILES['userImg'];
            $imageName = rand(0, 100000) . "_" . $image['name'];
            move_uploaded_file($image['tmp_name'], "images/" . $imageName);
        } else {
            $imageName = "avatar.png";
        }

         if ($isError == false)
         {
             global $con;
             $query = $con->prepare("INSERT INTO user
             SET 
             firstName = ? ,
             lastName =? ,
             email = ? ,
             password =? ,
             phone =?,
             city_ID = ? ,
             userType_ID = 2,
             user_img = ? ;  ");

            $query->execute(
                array(
                    $firstname , $lastname , $email , $pass1 , $phone , $city, $imageName
                ));

                $id = $con->lastInsertId();

            $query = $con->prepare("INSERT INTO technician
                SET 
                user_ID = ?,
                specialization_ID = ?,
                bio = ?;

            ");

            $query->execute(
                array(
                    $id , $spec, $bio
                )
            ); 

              $success = ' <div class="alert alert-success">
                <strong> تهانينا ! </strong> قم بتسجيل دخولك الأن .
                </div>'  ;
                echo $success ;

        }
    }

   ?>
                    <section class="section breadcrumbs-custom breadcrumbs-custom-overlay-2">
                        <div class="breadcrumbs-custom-main bg-image bg-gray-700" style="background-image: url(images/bg-image-8.jpg);">
                            <div class="container">
                                <h2 class="breadcrumbs-custom-title"> التسجيل كموظف </h2>
                            </div>
                        </div>
                    </section>
                    <section class="section section-md text-center">
                        <div class="container">
                            <div class="block-form">
                                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">

                                    <br>
                                    <hr>
                                    <!-- RD Mailform-->
                                    
                                    <div class="rd-form rd-mailform form-lg" novalidate="novalidate">
                                        <div class="alert alert-danger hide_alert <?php
                                          if($isError == true) { echo'show_alert';} ?>" id="erralert" style="display:none;">
                                            <strong> <?php echo $message ?> </strong>
                                        </div>


                                        <div class="row row-40">
                                            <div class="col-md-6">
                                                <div class="form-wrap">
                                                    <label class="form-label-outside"> الإسم الأول </label>
                                                    <div class="form-wrap-inner">
                                                        <input class="form-input" id="name1" type="text" name="name1" data-constraints="@Required" />
                                                        <label class="form-label" for="name1"> ادخل الإسم الأول </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-wrap">
                                                    <label class="form-label-outside"> الإسم الأخير</label>
                                                    <div class="form-wrap-inner">
                                                        <input class="form-input" id="name2" type="text" name="name2" data-constraints="@Required" />
                                                        <label class="form-label" for="name2"> ادخل الإسم الأخير</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-wrap">
                                                    <label class="form-label-outside">البريد الإلكتروني </label>
                                                    <div class="form-wrap-inner">
                                                        <input class="form-input" id="rd-navbar-register-email" type="email" name="email" data-constraints="@Email @Required" />
                                                        <label class="form-label" for="rd-navbar-register-email"> ادخل بريدك الإلكتروني </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-wrap ">
                                                    <label class="form-label-outside" for="rd-navbar-register-address"> المدينة </label>
                                                    <div class="form-group">
                                                        <select class="form-control form-control-has-validation" id="rd-navbar-register-address" name="location" data-constraints="@Selected">
                                                            <option label=" اختر مدينتك " selected="selected"></option>
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
                                            <div class="col-md-6">
                                                <div class="form-wrap">
                                                    <label class="form-label-outside"> كلمة المرور </label>
                                                    <div class="form-wrap-inner">
                                                        <input class="form-input" id="pass1" type="password" name="pass1" data-constraints="@Required" />
                                                        <label class="form-label" for="pass1"> ادخل كلمة المرور </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-wrap">
                                                    <label class="form-label-outside"> تأكيد كلمة المرور
                                                        <label id="lab"> </label>
                                                    </label>
                                                    <div class="form-wrap-inner">
                                                        <input class="form-input" id="pass2" type="password" name="pass2" data-constraints="@Required" />
                                                        <label class="form-label" for="pass2">تأكيد كلمة المرور </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-wrap ">
                                                    <label class="form-label-outside" for="general-information-job-category">مجال العمل </label>
                                                    <div class="form-group">
                                                        <select class="form-control form-control-has-validation" id="general-information-job-category" data-placeholder="اختر الصنف " name="job-category" data-constraints="@Selected">
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
                                            <div class="col-md-6">
                                                <div class="form-wrap">
                                                    <label class="form-label-outside"> رقم الهاتف </label>
                                                    <div class="form-wrap-inner">
                                                        <input class="form-input" id="rd-navbar-register-num" name="phone" data-constraints="@Required" type="text"><span class="form-validation"></span>
                                                        <label class="form-label" for="rd-navbar-register-num"> مثال : 0912345678</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-wrap">
                                                    <label class="form-label-outside" for="general-information-description"> نبذة عنك </label>
                                                    <div class="form-wrap-inner">
                                                        <label class="form-label rd-input-label" for="general-information-description">يرجى تقديم وصف وظيفي كامل</label>
                                                        <textarea class="form-input form-control-has-validation form-control-last-child" id="general-information-description" name="bio" data-constraints="@Required"></textarea><span class="form-validation"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="block-form">
                                                    <h4>اضف شعارك </h4>
                                                    <hr>
                                                    <label class="button button-sm button-primary-outline button-icon button-icon-left">
                                                        <input name="userImg" type="file" /><span class="icon mdi mdi-account-box"></span> رفع صورة
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <div class="block-form">
                                <hr>
                                <br>
                                <p>من خلال الاستمرار ، فإنك توافق على شروط استخدام سياسة الخصوصية الخاصة بنا.</p>
                                <button class="button button-block button-primary button-anorak" type="submit" id="btn"> تسجيل </button>
                            </div>

                            </form>
                        </div>
        </div>
        </section>

        <!-- Page Footer-->
        <?php include 'include/footer.php';?>
            </div>
            <div class="snackbars" id="form-output-global"></div>
            <script src=" js/core.min.js"></script>
            <script src=" js/script.js"></script>
            <script src=" js/sign-up.js"></script>

            <!--LIVEDEMO_00 -->
            <script type="text/javascript">
                var _gaq = _gaq || [];
                _gaq.push(['_setAccount', 'UA-7078796-5']);
                _gaq.push(['_trackPageview']);
                (function() {
                    var ga = document.createElement('script');
                    ga.type = 'text/javascript';
                    ga.async = true;
                    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                    var s = document.getElementsByTagName('script')[0];
                    s.parentNode.insertBefore(ga, s);
                })();
            </script>
    </body>

    </html>