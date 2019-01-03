<?php
        include 'include/db_connnection.php';
    ?>

    <!DOCTYPE html>
    <html class="wide wow-animation" lang="en">

    <head>
        <title> الوظائف </title>
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
        <div class="page" style="opacity: 1;">
            <!-- Page Header-->
            <?php include 'include/header.php';?>
                <section class="section breadcrumbs-custom breadcrumbs-custom-overlay-4">
                    <div class="breadcrumbs-custom-main bg-image bg-gray-700" style="background-image: url(images/bg-image-6.jpg);">
                        <div class="container">
                            <h2 class="breadcrumbs-custom-title"> الوظائف </h2>
                        </div>
                    </div>
                </section>
                <section class="section section-md">
                    <div class="container">
                        <form class="form-layout-search form-lg">
                            <div class="form-wrap form-wrap-icon">
                                <input class="form-input" id="myInput" type="text" name="employer" onkeyup="myFunction()">
                                <label class="form-label" for="myInput">البحث بواسطة كلمات دالة </label><span class="icon fl-bigmug-line-search74"></span>
                            </div>
                        </form>
                        <br>
                        <br>
                        <div class="row row-50 flex-lg-row-reverse">
                            <div class="col-lg-4 col-xl-3">
                                <div class="row row-30">
                                    <div class="col-sm-6 col-lg-12">
                                        <p class="heading-8"> نوع الوظيفة </p>
                                        <hr>

                                        <ul class="list list-xs">
                                            <li>
                                                <label class="checkbox checkbox_info text-tertiary">
                                                    <input name="vacancy-type-checkbox-1" value="checkbox-1" type="checkbox"> عمل حر
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox checkbox_info text-primary">
                                                    <input name="vacancy-type-checkbox-2" value="checkbox-2" type="checkbox"> دوام كامل
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox checkbox_info text-secondary">
                                                    <input name="vacancy-type-checkbox-3" value="checkbox-3" type="checkbox"> دوام جزئي
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox checkbox_info text-blue-11">
                                                    <input name="vacancy-type-checkbox-4" value="checkbox-4" type="checkbox"> فترة تدريب
                                                </label>
                                            </li>
                                        </ul>

                                    </div>
                                    <div class="col-sm-6 col-lg-12">
                                        <p class="heading-8"> التصنيف </p>
                                        <hr>

                                        <ul class="list list-xs">
                                            <li>
                                                <label class="checkbox checkbox_info">
                                                    <input name="category-checkbox-1" value="checkbox-1" type="checkbox"> التصميم و الجرافيك
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox checkbox_info">
                                                    <input name="category-checkbox-2" value="checkbox-2" type="checkbox"> التسويق الإلكتروني
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox checkbox_info">
                                                    <input name="category-checkbox-3" value="checkbox-3" type="checkbox"> تصميم و تطوير مواقع ويب
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox checkbox_info">
                                                    <input name="category-checkbox-4" value="checkbox-4" type="checkbox"> تجارة و إدارة الاعمال
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox checkbox_info">
                                                    <input name="category-checkbox-5" value="checkbox-5" type="checkbox"> تقنية المعلومات
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox checkbox_info">
                                                    <input name="category-checkbox-6" value="checkbox-6" type="checkbox"> خدمات ترجمة
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox checkbox_info">
                                                    <input name="category-checkbox-7" value="checkbox-7" type="checkbox"> التصوير الفوتوجرافي
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox checkbox_info">
                                                    <input name="category-checkbox-8" value="checkbox-8" type="checkbox"> كتابة المحتوى و المقالات الترويجية
                                                </label>
                                            </li>
                                            <li>
                                                <label class="checkbox checkbox_info">
                                                    <input name="category-checkbox-9" value="checkbox-9" type="checkbox"> التعليم الإلكتروني
                                                </label>
                                            </li>

                                        </ul>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-xl-9">
                                <table class="table-job-listing" id="myTable">
                                    <?php 
                        $sql = "
                            SELECT 
                            request.ID, request.title, request.request_img , request.initialPrice, user.firstname, 
                                user.lastname, job_type.type, city.name
                            FROM request 
                            INNER JOIN city ON request.city_ID = city.ID
                            INNER JOIN customer ON customer.ID = request.customer_ID
                            INNER JOIN job_type ON job_type.ID = request.jobType_ID 
                            INNER JOIN user ON user.ID = customer.user_ID ORDER BY id DESC

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

                    </div>
                </section>
                <!-- Page Footer-->
                <?php include 'include/footer.php';?>
        </div>
        <div class="snackbars" id="form-output-global"></div>
        <script src=" js/core.min.js"></script>
        <script src=" js/script.js"></script>
        <script src=" js/filter.js"></script>
    </body>

    </html>