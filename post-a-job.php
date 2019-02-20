<?php
        include 'include/db_connnection.php';
    ?>
    <!DOCTYPE html>
    <html class="wide wow-animation desktop landscape rd-navbar-static-linked" lang="ar">

    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title> نشر وظيفة </title>
        <meta charset="utf-8">
        <link rel="icon" href="images/koop_logo.png" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="css/css.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/fonts.css">
        <link rel="stylesheet" href="css/style.css" id="main-styles-link">
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
            <a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." width="820" height="42"></a>
        </div>
        <div class="preloader loaded">
            <div class="preloader-body">
                <div class="preloader-item">
                    <svg width="40" height="40" viewBox="0 0 40 40">
                        <polygon class="rect" points="0 0 0 40 40 40 40 0"></polygon>
                    </svg>
                </div>
            </div>
        </div>
        <?php 
     $isError = false ;
     $message =""; 
     if ($_SERVER["REQUEST_METHOD"] == "POST"){
         $title=$_POST["job-title"];
         $type=$_POST["job-type"];
         $price=$_POST["salary"];
         $email=$_POST["email"];
         $spec=$_POST["job-category"];
         $desc=$_POST["description"];
         $city=$_POST["location"]; 
         $url=$_POST["url"];
         $image = $_FILES['logo'];

        if(empty($title)){
            echo "error in title";
            $message .= " من فضلك ادخل عنوان الوظيفة <br />" ;
            $isError = true ;
        }

        if(empty($type)){
            echo "error in type";
            $message .= "  من فضلك اختر نوع الوظيفة <br />" ;
            $isError = true ;
        }

        if(empty($price)){
            echo "error in price";
            $message .= " من فضلك حدد سعر الوظيفة <br />" ;
            $isError = true ;
        }

        if(empty($email)){
            echo "error in email";
            $message .= "  من فضلك ادخل عنوان بريدك الإلكتروني <br />" ;
            $isError = true ;
        } else  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message .= "يجب كتابة البريد الاكتروني بصيغة صحيحة <br />" ;
            $isError = true ; }

        if(empty($spec)){
            echo "error in spec";
            $message .= "  من فضلك اختر مجال العمل  <br />" ;
            $isError = true ;
        }

        if(empty($desc)){
            echo "error in desc";
            $message .= "  من فضلك ضع وصف للوظيفة  <br />" ;
            $isError = true ;
        } else if(strlen($desc) < 100 ) {
            $message .= " يجب ان لا يكون طول وصف الوظيفة اقل من 100 حرف  <br />" ;
            $isError = true ;
        }

        if(empty($city)){
            echo "error in location";
            $message .= "  من فضلك حدد المدينة <br />" ;
            $isError = true ;
        }

        if( !empty($image['name']) ) {
            $imageName = rand(0, 100000) . "_" . $image['name'];
            move_uploaded_file($image['tmp_name'], "images/" . $imageName);
          } else {
            $imageName = "jobs.jpg";
          } 

        if ($isError == false && isset($_SESSION['userId']) )
        {
            global $con;

            $query1 = $con->prepare(
                "SELECT ID FROM customer WHERE user_ID = ?"
            );

            $query1->execute(array( $_SESSION['userId'] ));
            $result = $query1->fetch();

            $id = $result['ID'];

            $query = $con->prepare("INSERT INTO request
            SET 
            title = ? ,
            discription =? ,
            email = ? ,
            initialPrice =? ,
            jobType_ID =?,
            specialization_ID = ? ,
            city_ID = ?, 
            url = ?, 
            customer_ID = ? ,
            request_img = ?;");

        $query->execute(
             array( $title , $desc , $email , $price , $type , $spec , $city , $url, $id , $imageName ));

         }

        }

    ?>

            <div class="page animated" style="animation-duration: 500ms;">
                <!-- Page Header-->
                <?php include 'include/header.php';?>
                    <section class="section breadcrumbs-custom breadcrumbs-custom-overlay-2">
                        <div class="breadcrumbs-custom-main bg-image bg-gray-700" style="background-image: url(images/bg-image-8.jpg);">
                            <div class="container">
                                <h2 class="breadcrumbs-custom-title">نشر وظيفة</h2>
                            </div>
                        </div>
                    </section>
                    <section class="section section-md">
                        <div class="container">
                            <div class="block-form">
                                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="post-a-job-form" name="post-a-job-form" enctype="multipart/form-data">
                                    <hr>
                                    <hr>
                                    <!-- RD Mailform-->
                                    <div class="rd-form rd-mailform form-lg">
                                        <div class="alert alert-danger hide_alert <?php
                         if($isError == true) { echo'show_alert';} ?>" id="erralert" style="display:none;">
                                            <strong> <?php echo $message ?> </strong>
                                        </div>
                                        <div class="row row-40">
                                            <div class="col-md-6">
                                                <div class="form-wrap">
                                                    <label class="form-label-outside" for="general-information-job-title">العنوان </label>
                                                    <div class="form-wrap-inner">
                                                        <input class="form-input form-control-has-validation" id="general-information-job-title" form="post-a-job-form" name="job-title" data-constraints="@Required" type="text"><span class="form-validation"></span>
                                                        <label class="form-label rd-input-label" for="general-information-job-title">ادخل عنوان الوظيفة</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-wrap">
                                                    <label class="form-label-outside" for="general-information-email">البريد الإلكتروني </label>
                                                    <div class="form-wrap-inner">
                                                        <input class="form-input form-control-has-validation" id="general-information-email" form="post-a-job-form" name="email" data-constraints="@Email @Required" type="email"><span class="form-validation"></span>
                                                        <label class="form-label rd-input-label" for="general-information-email">ادخل عنوان بريدك الإلكتروني </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-wrap ">
                                                    <label class="form-label-outside" for="general-information-address"> المدينة </label>
                                                    <div class="form-group">
                                                        <select class="form-control form-control-has-validation" id="general-information-address" data-placeholder="اختر الصنف " name="location" data-constraints="@Selected">
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
                                                    <label class="form-label-outside" for="general-information-salary">السعر </label>
                                                    <div class="form-wrap-inner">
                                                        <input class="form-input form-control-has-validation" id="general-information-salary" form="post-a-job-form" name="salary" data-constraints="@Required" type="text"><span class="form-validation"></span>
                                                        <label class="form-label rd-input-label" for="general-information-salary"> مثال : 50-100 د.ل</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-wrap ">
                                                    <label class="form-label-outside" for="general-information-job-category">مجال العمل </label>
                                                    <div class="form-group">
                                                        <select class="form-control form-control-has-validation" id="general-information-job-category" data-placeholder="اختر الصنف " name="job-category" data-constraints="@Selected">
                                                            <option label=" اختر مجال العمل " selected="selected"></option>
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
                                                    <label class="form-label-outside" for="general-information-job-type"> نوع الوظيفة </label>
                                                    <div class="form-group">
                                                        <select class="form-control form-control-has-validation" id="general-information-job-type" data-placeholder=" اختر نوع الوظيفة " name="job-type" data-constraints="@Selected">
                                                            <option label=" اختر نوع الوظيفة " selected="selected"></option>
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

                                            <div class="col-md-12">
                                                <div class="form-wrap">
                                                    <label class="form-label-outside" for="general-information-url">موقع ويب ( اختياري )</label>
                                                    <div class="form-wrap-inner">
                                                        <input class="form-input" id="general-information-url" form="post-a-job-form" name="url" type="text">
                                                        <label class="form-label rd-input-label" for="general-information-url"> مثال : www.koop.ly </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-wrap">
                                                    <label class="form-label-outside" for="general-information-description"> وصف الوظيفة </label>
                                                    <div class="form-wrap-inner">
                                                        <label class="form-label rd-input-label" for="general-information-description">يرجى تقديم وصف وظيفي كامل</label>
                                                        <textarea class="form-input form-control-has-validation form-control-last-child" id="general-information-description" form="post-a-job-form" name="description" data-constraints="@Required"></textarea><span class="form-validation"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                            </div>
                            <div class="block-form">
                                <h4>اضف شعارك </h4>
                                <hr>
                                <label class="button button-sm button-primary-outline button-icon button-icon-left">
                                    <input name="logo" form="post-a-job-form" type="file"><span class="icon mdi mdi-account-box"></span> رفع صورة
                                </label>
                            </div>
                            <div class="block-form">
                                <hr>
                                <button class="button button-secondary" type="submit" id="btn"> نشر الوظيفة </button>
                            </div>
                            </form>
                        </div>
            </div>
            </section>
            <!-- Page Footer-->
            <?php include 'include/footer.php';?>
                <div class="snackbars" id="form-output-global"></div>
                <script type="text/javascript" async="" src="js/ec.js"></script>
                <script type="text/javascript" async="" src="js/analytics.js"></script>
                <script async="" src="js/gtm.js"></script>
                <script src="js/post-a-job.js"></script>
                <script src="js/core.js"></script>
                <script src="js/script.js"></script>

                <noscript>
                    <iframe src="//www.googletagmanager.com/ns.html?id=GTM-P9FT69" height="0" width="0" style="display:none;visibility:hidden"></iframe>
                </noscript>
    </body>
    </html>