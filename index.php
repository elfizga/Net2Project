<?php
        include 'include/db_connnection.php';
    ?>

    <!DOCTYPE html>
    <html class="wide wow-animation" lang="ar">

    <head>
        <title> كوب </title>
        <meta name="viewport" content="width=device-width height=device-height initial-scale=1.0">
        <meta charset="utf-8">
        <link rel="icon" href="images/koop_logo.png" type="image/x-icon">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/fonts.css">
        <link rel="stylesheet" href="css/style.css" id="main-styles-link">
        <link href="https://fonts.googleapis.com/css?family=Tajawal" rel="stylesheet">
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
            <a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a>
        </div>

        <div class="page" style="opacity: 1;">
            <?php include 'include/header.php';

    ?>
                <section class="section jumbotron-classic bg-blue-13" style="background-image: url(images/bg-14.jpg); background-repeat: repeat;">
                    <div class="jumbotron-classic-inner">
                        <!--.jumbotron-classic-image-left: +png('custom-slide-left-423x629').wow.slideInLeft-->
                        <!--.jumbotron-classic-image-right: +png('custom-slide-right-325x629').wow.slideInRight-->
                        <div class="container">
                            <div class="jumbotron-classic-header">
                                <h2 class="font-weight-light"> منصة العمل الحر الليبية , احصل على وظيفة 
                           <b> الأن !</b>  
                        </h2>
                            </div>
                            <div class="jumbotron-classic-main">
                                <form class="form-layout-search form-lg">
                                    <div class="form-wrap form-wrap-icon">
                                        <input class="form-input" id="keywords" type="text">
                                        <label class="form-label" for="keywords"> التصنيف </label><span class="icon fl-bigmug-line-search74"></span>
                                    </div>
                                    <div class="form-wrap form-wrap-button">
                                        <div class="col-12 text-center"><a class="button button-lg button-primary button-anorak" href="job-listing.php"> بحث </a></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Popular Categories-->
                <section class="section section-md text-center">
                    <div class="container">
                        <h3> التصنيفات  </h3>
                        <p> 557 وظيفة تم نشرها في هذا الاسبوع </p>
                        <div class="row row-30">
                            <div class="col-md-4">
                                <ul class="list-block">
                                    <li><a href="job-listing.php"><span class="list-block-title">  التصميم و الجرافيك</span><span class="list-block-meta">2590</span></a></li>
                                    <li><a href="job-listing.php"><span class="list-block-title">  تسويق الكتروني </span><span class="list-block-meta">1567</span></a></li>
                                    <li><a href="job-listing.php"><span class="list-block-title">  تصميم و تطوير مواقع ويب  </span><span class="list-block-meta">3235</span></a></li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <ul class="list-block">
                                    <li><a href="job-listing.php"><span class="list-block-title"> تجارة و إدارة الاعمال </span><span class="list-block-meta">1467</span></a></li>
                                    <li><a href="job-listing.php"><span class="list-block-title">   تقنية المعلومات </span><span class="list-block-meta">4090</span></a></li>
                                    <li><a href="job-listing.php"><span class="list-block-title"> خدمات ترجمة </span><span class="list-block-meta">214</span></a></li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <ul class="list-block">
                                    <li><a href="job-listing.php"><span class="list-block-title"> تصوير فوتوجرافي </span><span class="list-block-meta">653</span></a></li>
                                    <li><a href="job-listing.php"><span class="list-block-title"> كتابة  محتوى و مقالات ترويجية </span><span class="list-block-meta">453</span></a></li>
                                    <li><a href="job-listing.php"><span class="list-block-title"> تعليم إلكتروني </span><span class="list-block-meta">234</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="section section-md bg-gray-100">
                    <div class="container">
                        <div class="row row-40">
                            <div class="col-12 text-center">
                                <h3> أحدث الوظائف التي تم نشرها </h3>
                            </div>
                            <div class="col-12">
                                <div class="table-job-listing-2-outer">
                                    <table class="table-job-listing-2 table-responsive">

                                    <!-- view recent jobs -->

                                        <?php 
                        $sql = "
                            SELECT 
                            request.ID, request.title, request.request_img , request.initialPrice, user.firstname, 
                                user.lastname, job_type.type, city.name
                            FROM request 
                            INNER JOIN city ON request.city_ID = city.ID
                            INNER JOIN customer ON customer.ID = request.customer_ID
                            INNER JOIN job_type ON job_type.ID = request.jobType_ID 
                            INNER JOIN user ON user.ID = customer.user_ID ORDER BY id DESC LIMIT 5 ;
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
                                                <td class="table-job-listing-badge"><span class="badge "><?php echo $result['type'];?></span></td>
                                            </tr>

                                            <?php } ?>
                                    </table>
                                </div>
                            </div>
                            <div class="col-12 text-center"><a class="button button-lg button-primary button-anorak" href="job-listing.php"> عرض المزيد من الوظائف </a></div>
                        </div>
                    </div>
                </section>

                <br>
                <br>
                <section class="section section-md bg-gray-100">
                    <div class="container">
                        <div class="row row-30">
                            <div class="col-lg-6 height-fill">
                                <figure class="figure-responsive"><img src="images/meeting.png" alt="" height="300" />
                                </figure>
                            </div>
                            <div class="col-lg-6 height-fill">
                                <article class="box-info-2">
                                    <h3> ماذا توفر لك منصة عمل كوب ؟ </h3>
                                    <br>
                                    <br>
                                    <p class="text-color-default"> يعمل كوب على وصل الشركات وأصحاب المشاريع بأفضل العاملين المحترفين لمساعدتهم على تنفيذ أفكارهم ومشاريعهم، وبنفس الوقت يتيح للموظفين و اصحاب الاعمال الحرة مكانا لإيجاد مشاريع يعملون عليها ويكسبون من خلالها. تستطيع من خلال كوب إضافة مشروعك الذي ترغب بتنفيذه مجاناً لتحصل على عشرات العروض من أفضل العاملين الليبين , تضمن لك منصة كوب حقوقك كصاحب مشروع أو موظف حيث تبقى وسيط بين الطرفين الى أن يتم تسليم العمل كاملاً.</p>

                                </article>
                            </div>
                        </div>
                        <div class="row row-30 list-progress">
                            <div class="col-sm-6 col-md-12 col-xl-3 height-fill align-items-center">
                                <article class="box-info-3">
                                    <br>
                                    <h3>  كيف يعمل كوب من أجلك </h3>
                                </article>
                            </div>
                            <div class="col-sm-6 col-md-4 col-xl-3">
                                <div class="lp-item">
                                    <div class="lp-item-header">
                                        <div class="icon lp-item-icon thin-icon-email-search"></div>
                                        <div class="lp-item-counter"></div>
                                    </div>
                                    <h6 class="lp-item-title"> أداة بحث مثالية </h6>
                                    <p> زُر ملفات العاملين اطلع على أعمالهم السابقة وظف الأفضل , اطرح مشروعك واترك تنفيذه لأفضل خبراء المجال .</p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-xl-3">
                                <div class="lp-item">
                                    <div class="lp-item-header">
                                        <div class="icon lp-item-icon mercury-icon-target-2"></div>
                                        <div class="lp-item-counter"></div>
                                    </div>
                                    <h6 class="lp-item-title"> وظائف مدفوعة </h6>
                                    <p> نفذ مشاريعك بتكاليف أقل , وظّف أفضل الموظفين حسبما يتناسب مع ميزانيتك . </p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-xl-3">
                                <div class="lp-item">
                                    <div class="lp-item-header">
                                        <div class="icon lp-item-icon lp-item-icon-sm mercury-icon-e-mail-o"></div>
                                        <div class="lp-item-counter"></div>
                                    </div>
                                    <h6 class="lp-item-title"> التواصل الفعال </h6>
                                    <p> ابنِ فريق عمل متكامل متكون من خبراء في مختلف المجالات ومن مختلف المدن .</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Page Footer-->
                <?php include 'include/footer.php';?>
        </div>
        <div class="snackbars" id="form-output-global"></div>
        <script src="js/core.min.js"></script>
        <script src="js/script.js"></script>

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