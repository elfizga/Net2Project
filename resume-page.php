<?php
        include 'include/db_connnection.php';
    ?>

<?php  
        if(isset($_GET['workerId'])){
            $id=$_GET['workerId'];
            $sql = " 
            SELECT 
            user.firstname, user.lastname, user.date , specialization.Name as spec_name , city.name as city_name , technician.ID as workerId, user.user_img, bio 
            FROM user
            INNER JOIN city ON user.city_ID = city.ID
            INNER JOIN technician ON technician.user_ID = user.ID
            INNER JOIN specialization ON technician.specialization_ID = specialization.ID 
            WHERE
            technician.ID = ?";
                       global $con;
                        $query = $con->prepare($sql);
                        $query->execute(array($id));
                        $workerResult = $query->fetch();

                        if(empty($workerResult)) {
                            header("location: index.php");
                        }

                        
                        ?>
    <!DOCTYPE html>
    <html class="wide wow-animation desktop landscape rd-navbar-static-linked" lang="en">

    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title> الملف الشخصي </title>
        <meta name="viewport" content="width=device-width height=device-height initial-scale=1.0">
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

        <div class="page animated" style="animation-duration: 500ms; opacity: 1">
            <?php 
     $isError = false ;
     $message ="";
        
    ?>
                <!-- Page Header-->
                <?php include 'include/header.php';?>
                    <section class="section parallax-container section-sm bg-gray-700 bg-overlay-4" data-parallax-img="images/bg-image-14.jpg">
                        <div class="material-parallax parallax"><img src="images/bg-image-14.jpg" alt="" style="display: block; transform: translate3d(-50%, 535px, 0px) rotate(0.1deg);"></div>
                        <div class="parallax-content">
                            <div class="container">
                                <div class="layout-2">
                                   
                                        <div class="layout-2-item layout-2-item-main">
                                            <article class="profile-light"><img class="profile-light-image" src="images/<?php echo $workerResult['user_img']; ?>" alt="">
                                                <div class="profile-light-main">
                                                    <h4 class="profile-light-name"><?php echo $workerResult['firstname'] . " " . $workerResult['lastname'] ?></h4>
                                                    <h6 class="profile-light-position"> <?php echo $workerResult['spec_name'] ?> </h6>
                                                    <div class="profile-light-divider"></div>
                                                    <ul class="profile-light-list">
                                                        <li><span class="icon icon-sm mdi mdi-map-marker"></span><span> <?php echo $workerResult['city_name'] ?> , ليبيا </span></li>
                                                    </ul>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="layout-2-item text-center text-lg-left">
                                            <span> تاريخ الإنضمام : </span >
                 <span> <?php echo $workerResult['date'] ; ?> </span>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="section section-md">
                        <div class="container">
                            <div class="row row-50">
                                <div class="col-lg-8">
                                    <div class="row row-50">
                                        <div class="col-12">

                                            <p class="heading-9"> نبذة عني </p>
                                            <div>
                                            </div>
                                            <hr>
                                            <p class="text-style-1">
                                                <?php echo $workerResult['bio']; ?>
                                            </p>
                                        </div>

                                        <div class="col-12">
                                            <p class="heading-9"> اعمالي السابقة </p>
                                            <hr>
                                            <div class="row row-40 offset-top-30px" id="portfolios">

                                                <?php 
                  $sql = " SELECT portfolio.title , portfolio.description , portfolio.imageURL 
                  FROM portfolio
                  INNER JOIN technician ON technician.ID = portfolio.technician_ID 
                  INNER JOIN user ON user.ID = technician.user_ID WHERE technician_ID = ? ; " ;
                  global $con ;
                  $q = $con->prepare($sql);
                  $q->execute(array($_GET['workerId'])) ;
                  $results = $q->fetchAll();
                  if($results != null){
                  foreach($results as $result){
                  ?>

                                                    <div class="col-sm-6">
                                                        <a class="thumbnail-classic" href="#">
                                                            <figure class="thumbnail-classic-figure"><img class="thumbnail-classic-image" src="images/<?php echo $result['imageURL']; ?>" alt="">
                                                            </figure>
                                                            <div class="thumbnail-classic-caption">
                                                                <p class="heading-9 thumbnail-classic-title">
                                                                    <?php echo $result['title'] ?>
                                                                </p>
                                                                <p class=" thumbnail-classic-title">
                                                                    <?php echo $result['description'] ; ?>
                                                                </p>
                                                            </div>
                                                            <div class="thumbnail-classic-dummy"></div>
                                                        </a>
                                                    </div>

                                                    <?php 
                  }}
                  else 
                  {
                      echo " لا يوجد أعمال سابقة " ;
                  }
                    ?>

                                            </div>

                                        </div>

                                        <?php 
                if(isset($_GET['workerId']) && isset($_SESSION['userId']) ) {
                  global $con ;
                  $q = $con->prepare(" SELECT ID FROM technician WHERE user_ID = ? ") ;
                  $q->execute(array($_SESSION['userId']));
                  $result = $q->fetch();
                  $uid = $result['ID'];
                  $wid = $_GET['workerId'];
                  if($uid == $wid) {
                    echo ' <button type="button" class="btn btn-primary col-4 offset-4" data-toggle="modal" data-target="#exampleModalCenter">
                            إضافة أعمال سابقة
                           </button>' ;
                  }
                   else {   echo ' ' ; }
                }
                ?>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle"> إضافة أعمالك السابقة </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post" action="<?php echo $_SERVER['REQUEST_URI'] ?>" id="post-a-portfolio" name="post-a-portfolio" enctype="multipart/form-data">
                                                                <div class="row row-40">
                                                                    <div class="col-md-12">
                                                                        <div class="form-wrap">
                                                                            <label class="form-label-outside" for="general-information-job-title">العنوان </label>
                                                                            <div class="form-wrap-inner">
                                                                                <input class="form-input form-control-has-validation" id="general-information-portfolio-title" form="post-a-portfolio" name="portfolio-title" data-constraints="@Required" type="text"><span class="form-validation"></span>
                                                                                <label class="form-label rd-input-label" for="general-information-portfolio-title"> ادخل العنوان </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-wrap">
                                                                            <label class="form-label-outside" for="general-information-description"> الوصف </label>
                                                                            <div class="form-wrap-inner">
                                                                                <label class="form-label rd-input-label" for="general-information-description"> ادخل وصف لهذا العمل </label>
                                                                                <textarea class="form-input form-control-has-validation form-control-last-child" id="general-information-description" form="post-a-portfolio" name="description" data-constraints="@Required"></textarea><span class="form-validation"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-wrap">
                                                                            <label class="button button-sm button-primary-outline button-icon button-icon-left">
                                                                                <input name="portfolio" form="post-a-portfolio" type="file"><span class="icon mdi mdi-account-box"></span> رفع صورة
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"> إغلاق </button>
                                                            <button type="submit" class="btn btn-primary"> حفظ التغيرات </button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                    </div>
                                    <?php 
            }
            ?>

                                </div>
                                <div class="col-lg-4">
                                    <div class="row row-30 row-lg-50">
                                        <div class="col-md-6 col-lg-12">
                                            <!-- RD Mailform-->
                                            <form class="rd-mailform form-corporate form-spacing-small form-corporate_sm" data-form-output="form-output-global" data-form-type="contact" method="post">
                                                <h4> تواصل معي </h4>
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
                                                    <button class="button button-block button-anorak button-primary" type="submit">أرسل </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </section>
                    <!-- Page Footer-->
                    <?php include 'include/footer.php';?>
                        </div>
                        <div class="snackbars" id="form-output-global"></div>
                        <script type="text/javascript" async="" src="js/ec.js"></script>
                        <script type="text/javascript" async="" src="js/analytics.js"></script>
                        <script async="" src="js/gtm.js"></script>
                        <script src="js/core.js"></script>
                        <script src="js/script.js"></script>
                        <script src="js/resume-page.js"></script>
                        <noscript>
                            <iframe src="//www.googletagmanager.com/ns.html?id=GTM-P9FT69" height="0" width="0" style="display:none;visibility:hidden"></iframe>
                        </noscript>
    </body>
    </html>