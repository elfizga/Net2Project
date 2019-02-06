<?php
        include 'include/db_connnection.php';

    ?>

    <!DOCTYPE html>
    <html class="wide wow-animation" lang="en">

    <head>
        <title> الملف الذاتي </title>
        <meta name="viewport" content="width=device-width height=device-height initial-scale=1.0">
        <meta charset="utf-8">
        <link rel="icon" href=" images/koop_logo.png" type="image/x-icon">
        <link rel="stylesheet" href=" css/bootstrap.css">
        <link rel="stylesheet" href=" css/fonts.css">
        <link rel="stylesheet" href=" css/style.css" id="main-styles-link">
        <link href="https://fonts.googleapis.com/css?family=Tajawal" rel="stylesheet">
    </head>
    </head>

    <body style="direction: rtl ; ">
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
        <div class="page" style="opacity: 1;">
            <!-- Page Header-->
            <?php include 'include/header.php';?>
                <?php
        if(isset($_GET['customerId'])){
            $id=$_GET['customerId'];
            $sql = "
            SELECT
            user.firstname, user.lastname , city.name as city_name , customer.ID as customerId, user.user_img, bio
            FROM user
            INNER JOIN city ON user.city_ID = city.ID
            INNER JOIN customer ON customer.user_ID = user.ID
            WHERE
            customer.ID = ?";
                       global $con;
                        $query = $con->prepare($sql);
                        $query->execute(array($id));
                        $result = $query->fetch();
        }
      ?>
                    <section class="section breadcrumbs-custom breadcrumbs-custom-overlay-2">
                        <div class="breadcrumbs-custom-main bg-image bg-gray-700" style="background-image: url(  images/bg-image-9.jpg);">
                            <div class="container">
                                <h3 class="breadcrumbs-custom-title"> الملف الشخصي  </h3>
                            </div>
                        </div>
                    </section>
                    <section class="section section-md">

                        <div class="container">
                            <div class="row row-50">
                                <div class="col-lg-8">
                                    <div class="layout-info">
                                        <div class="layout-info-main">
                                            <article class="company-light">
                                                <figure class="company-light-logo"><img class="company-light-logo-image" src="images/<?php echo $result['user_img']; ?>" alt="" />
                                                </figure>
                                                <div class="company-light-main">
                                                    <h5 class="company-light-title"><?php echo $result['firstname'] . " " . $result['lastname']; ?></h5>

                                                    <p class="object-inline object-inline_sm"><span><?php echo $result['city_name']; ?> ليبيا</span></p>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="layout-info-aside">
                                            <div class="layout-info-aside-item">
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
                                    <h4 class="heading-decorated_1"> نبذة </h4>
                                    <p class="text-style-1" style="width">
                                        <?php echo $result['bio']; ?>
                                    </p>
                                    <h4 class="heading-decorated_1">وظائف تم نشرها بواسطة هذا الزبون </h4>
                                    <table class="table-job-listing table-responsive">

                                        <?php
                        $sql = "
                            SELECT
                            request.ID, request.title, request.initialPrice, user.firstname,
                                user.lastname, job_type.type, city.name , request.request_img
                            FROM request
                            INNER JOIN city ON request.city_ID = city.ID
                            INNER JOIN customer ON customer.ID = request.customer_ID
                            INNER JOIN job_type ON job_type.ID = request.jobType_ID
                            INNER JOIN user ON user.ID = customer.user_ID
                            WHERE customer_ID = ?
                            ;
                        ";
                        global $con;
                        $query = $con->prepare($sql);
                        $query->execute( array($_GET['customerId']) );
                        $results = $query->fetchAll();
                        foreach($results as $result) { ?>
                                            <tr>
                                                <td class="table-job-listing-main">
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
                                <div class="col-lg-4">
                                    <div class="row row-30 row-lg-50">
                                        <div class="col-md-6 col-lg-12">
                                            <!-- RD Mailform-->
                                            <form class="rd-mailform form-corporate form-spacing-small form-corporate_sm" data-form-output="form-output-global" data-form-type="contact" method="post">
                                                <h4> تواصل معنا  </h4>
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
                        </div>
                    </section>
                    <!-- Page Footer-->
                    <?php include 'include/footer.php';?>
        </div>
        <div class="snackbars" id="form-output-global"></div>
        <script src=" js/core.min.js"></script>
        <script src=" js/script.js"></script>
    </body>
    </html>
