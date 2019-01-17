    <?php include 'include/db_connnection.php'; ?>
    <!DOCTYPE html>
    <html class="wide wow-animation" lang="ar">

    <head>
        <title>تفاصيل الوظيفة </title>
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

        <?php 
                            $isError = false ;
                            $message ="";
                            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                                $name=$_POST["name"];
                                $phone=$_POST["phone"];
                                $msg=$_POST["message"];
                                $email=$_POST["email"];
                                $myEmail =$_POST["mymail"];
                                if(empty($msg)){
                                    $message .= " من فضلك ضع رسالة تقديم طلب  <br />" ;
                                    $isError = true ;
                                } 
                                if(empty($email)){
                                    $message .= "  من فضلك ادخل عنوان بريدك الإلكتروني <br />" ;
                                    $isError = true ;
                                } else  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                    $message .= "يجب كتابة البريد الاكتروني بصيغة صحيحة <br />" ;
                                    $isError = true ; } 

                                
                                  $body =  " تم إرسال الرسالة بواسطة  " . $email . "\r\n" .
                                   "الإسم :" . $name . "\r\n" .
                                   " الرسالة : " . $msg . "\r\n" ;
                                 
                                 
                                 $subject =" Job Request From Koop  " ;

                            if ($isError == false ){
                                mail($myEmail , $subject , $body , $email ) ;
                                $name = "" ;
                                $phone = "" ;
                                $msg = "" ;
                                $email= "" ;

                                $success="<div class='alert alert-success'> تم إرسال رسالتك بنجاح </div>" ; }}

                            ?>
            <div class="page" style="opacity: 1;">
                <!-- Page Header-->
                <?php include 'include/header.php';?>
                    <section class="section breadcrumbs-custom breadcrumbs-custom-overlay-2">
                        <div class="breadcrumbs-custom-main bg-image bg-gray-700" style="background-image: url(  images/bg-image-9.jpg);">
                            <div class="container">
                                <h3 class="breadcrumbs-custom-title"> تفاصيل الوظيفة </h3>
                            </div>
                        </div>
                    </section>
                    <?php  
            if(isset($_GET['jobId'])){
            $id=$_GET['jobId'];
            $sql = " 
            SELECT request.title ,  request.time , request.request_img  , request.initialPrice , request.discription ,request.url , request.email , user.firstname, user.lastname, city.name as city_name , specialization.Name as spec_name 
            FROM request 
            INNER JOIN city ON request.city_ID = city.ID
            INNER JOIN customer ON customer.ID = request.customer_ID
            INNER JOIN job_type ON job_type.ID = request.jobType_ID 
            INNER JOIN user ON user.ID = customer.user_ID
            INNER JOIN specialization ON request.specialization_ID = specialization.ID WHERE request.ID = ?" ;

                        global $con;
                        $query = $con->prepare($sql);
                        $query->execute(array($id));
                        $result = $query->fetch();
                        ?>
                        <section class="section section-md">
                            <div class="container">
                                <div class="row row-50">
                                    <div class="col-lg-8">
                                        <div class="layout-details">
                                            <article class="company-light company-light_1">
                                                <figure class="company-light-logo"><img class="company-light-logo-image" src="images/<?php echo $result['request_img']; ?>" alt="" style=" max-width: 100%;max-height: 100%;" />
                                                </figure>
                                                <div class="company-light-main">
                                                    <h5 class="company-light-title"><?php echo $result['firstname'] . " " . $result['lastname'] ; ?></h5>
                                                    <div class="company-light-info">
                                                        <div class="row row-15 row-bordered">
                                                            <div class="col-sm-6">
                                                                <ul class="list list-xs">
                                                                    <li>
                                                                        <p class="object-inline object-inline_sm"><span class="icon icon-1 text-primary mdi mdi-map-marker"></span><span><?php echo $result['city_name']  ?> , ليبيا </span></p>
                                                                    </li>
                                                                    <li>
                                                                        <p class="object-inline object-inline_sm"><span class="icon icon-default text-primary mdi mdi-clock"></span><span>تاريخ النشر  : <?php echo $result['time'] ?> </span></p>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <ul class="list list-xs">
                                                                    <li>
                                                                        <p class="object-inline object-inline_sm"><span class="icon icon-sm text-primary mdi mdi-cash"></span><span> السعر  : <?php echo $result['initialPrice'] ?>   د.ل</span></p>
                                                                    </li>
                                                                    <li>
                                                                        <p class="object-inline object-inline_sm">
                                                                            <?php echo '<span class="icon icon-1 text-primary mdi mdi-web"></span><span><a href="#">'. $result["spec_name"] . '</a></span>' ; ?></p>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                        <br>
                                        <h4> <?php echo $result['title'] ; ?> </h4>
                                        <br>
                                        <p class="text-style-1">
                                            <?php echo $result['discription'] ; ?>
                                        </p>
                                        <div class="layout-1">
                                            <div class="layout-1-inner">
                                                <p>مشاركة</p>
                                                <div>
                                                    <ul class="list-inline list-inline-xs">
                                                        <li>
                                                            <a class="icon icon-xxs icon-filled icon-filled-brand icon-circle fa fa-facebook" href="#"></a>
                                                        </li>
                                                        <li>
                                                            <a class="icon icon-xxs icon-filled icon-filled-brand icon-circle fa fa-google-plus" href="#"></a>
                                                        </li>
                                                        <li>
                                                            <a class="icon icon-xxs icon-filled icon-filled-brand icon-circle fa fa-twitter" href="#"></a>
                                                        </li>
                                                        <li>
                                                            <a class="icon icon-xxs icon-filled icon-filled-brand icon-circle fa fa-pinterest-p" href="#"></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="block offset-top-2">
                                            <h4> وظائف ذات صلة</h4>
                                            <table class="table-job-listing table-responsive">
                                                <?php 
                        $sql = "
                            SELECT 
                            request.ID, request.title, request.email , request.initialPrice, user.firstname, 
                                user.lastname, job_type.type, city.name , request.request_img
                            FROM request 
                            INNER JOIN city ON request.city_ID = city.ID
                            INNER JOIN customer ON customer.ID = request.customer_ID
                            INNER JOIN job_type ON job_type.ID = request.jobType_ID 
                            INNER JOIN user ON user.ID = customer.user_ID ORDER BY id DESC LIMIT 3 ;
                        ";
                        global $con;
                        $query = $con->prepare($sql);
                        $query->execute();
                        $results = $query->fetchAll();
                        foreach($results as $result) { ?>
                                                    <tr>
                                                        <td class="table-job-listing-main">
                                                            <!-- Company Minimal-->
                                                            <article class="company-minimal">
                                                                <figure class="company-minimal-figure"><img class="company-minimal-image" src="images/<?php echo $result['request_img']; ?>" alt="" />
                                                                </figure>
                                                                <div class="company-minimal-main">
                                                                    <h5 class="company-minimal-title"><a href="job-details.php?jobId=<?php echo $result['ID']; ?>" > <?php echo $result['title']; ?> </a></h5>
                                                                    <p>
                                                                        <?php echo $result['firstname'] . ' ' . $result['lastname'] . ', ' . $result['name']; ?>
                                                                    </p>
                                                                </div>
                                                            </article>
                                                        </td>
                                                        <td class="table-job-listing-date"><span><?php echo $result['initialPrice'] . 'د.ل' ?> </span></td>
                                                        <td class="table-job-listing-badge"><span class="badge "><?php
                                    echo $result['type'];
                                ?></span></td>
                                                    </tr>

                                                    <?php
                        }

                        ?>
                                            </table>
                                        </div>
                                    </div>
                                    <?php 

                     }

                            ?>

                                        <div class="col-lg-4">
                                            <div class="row row-30 row-lg-50">
                                                <div class="col-md-6 col-lg-12">
                                                    <?php
                                                      if(isset($_SESSION['userId']) && $_SESSION['userId'] > 0) {
                                                        if($_SESSION['userType'] == 2) { ?>

                                                        <form class="contact-form " action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">

                                                            <div class="alert alert-danger hide_alert <?php
                                                              if($isError == true) { echo 'show_alert'; } ?>" id="erralert">
                                                                <strong> <?php echo $message; ?> </strong>
                                                            </div>
                                                             <?php if (isset($success)) {
                                                            echo $success ;
                                                             } ?>

                                                                <h4> تقديم طلب وظيفة  </h4>
                                                                <br>

                                                                <div class="form-wrap">
                                                                    <label class="form-label" for="contact-name">الإسم </label>
                                                                    <input class="form-input" id="contact-name" type="text" name="name" data-constraints="@Required">
                                                                </div>
                                                                <div class="form-wrap">
                                                                    <label class="form-label" for="contact-email">البريد الإلكتروني</label>
                                                                    <input class="form-input" id="contact-email" type="email" name="email" data-constraints="@Required @Email">
                                                                </div>
                                                                <div class="form-wrap">
                                                                    <label class="form-label" for="contact-phone">رقم الهاتف ( اختياري )</label>
                                                                    <input class="form-input" id="contact-phone" type="text" name="phone" data-constraints="@PhoneNumber">
                                                                </div>
                                                                <div class="form-wrap">
                                                                    <label class="form-label" for="contact-message">رسالتك </label>
                                                                    <textarea class="form-input" id="contact-message" name="message" data-constraints="@Required"></textarea>
                                                                </div>
                                                                <div class="form-wrap">
                                                                    <input type="hidden" value="<?php echo $result['email'] ; ?>" name="mymail" />
                                                                </div>
                                                                <div class="form-wrap">
                                                                    <button class="button button-block button-anorak button-primary" type="submit"> أرسل </button>
                                                                </div>
                                                        </form>
                                                </div>
                                            </div>
                                        </div>
                                        <?php                      
                        } 
                      }
                    ?>
                        </section>

                        <?php include 'include/footer.php';?>
                            </div>

                            <div class="snackbars" id="form-output-global"></div>
                            <script src=" js/core.min.js"></script>
                            <script src=" js/script.js"></script>
    </body>
    </html>