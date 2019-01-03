<?php
        include 'include/db_connnection.php';
    ?>
    <!DOCTYPE html>
    <html class="wide wow-animation" lang="en">

    <head>
        <title> عن كوب </title>
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

                <section class="section breadcrumbs-custom breadcrumbs-custom-overlay-2">
                    <div class="breadcrumbs-custom-main bg-image bg-gray-700" style="background-image: url(  images/bg-image-9.jpg);">
                        <div class="container">
                            <h3 class="breadcrumbs-custom-title">عن كوب </h3>
                        </div>
                    </div>
                </section>
                <!-- Welcome to Lavoro-->
                <section class="section section-md">
                    <div class="container">
                        <div class="row row-30">
                            <div class="col-lg-6 height-fill">
                                <figure class="figure-responsive"><img src="images/about-us-1-573x368.jpg" alt="" />
                                </figure>
                            </div>
                            <div class="col-lg-6 height-fill">
                                <article class="box-info-2">
                                    <h3> من نحن ؟ </h3>
                                    <br>
                                    <br>
                                    <p class="text-color-default"> يعمل كوب على وصل الشركات وأصحاب المشاريع بأفضل العاملين المحترفين لمساعدتهم على تنفيذ أفكارهم ومشاريعهم، وبنفس الوقت يتيح للموظفين و اصحاب الاعمال الحرة مكانا لإيجاد مشاريع يعملون عليها ويكسبون من خلالها. تستطيع من خلال كوب إضافة مشروعك الذي ترغب بتنفيذه مجاناً لتحصل على عشرات العروض من أفضل العاملين الليبين , تضمن لك منصة كوب حقوقك كصاحب مشروع أو موظف حيث تبقى وسيط بين الطرفين الى أن يتم تسليم العمل كاملاً.</p>

                                </article>
                            </div>
                        </div>
                    </div>
                    <div class="container offset-top-1 text-center">
                        <h3>مئات الوظائف تنشر يوميا من جميع انحاء ليبيا</h3>
                        <p>بإستخدام منصتنا يمكنك البحث و ايجاد العمل المناسب لك في ثواني </p>
                        <div class="row row-50 row-bordered justify-content-center">
                            <div class="col-sm-6 col-md-4">
                                <!-- Box Line-->
                                <article class="box-line">
                                    <div class="box-line-icon icon mercury-icon-target"></div>
                                    <div class="box-line-divider"></div>
                                    <h5 class="box-line-title">نفذ مشاريعك بتكاليف أقل , وظّف أفضل الناشطين حسبما يتناسب مع ميزانيتك .</h5>
                                </article>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <!-- Box Line-->
                                <article class="box-line">
                                    <div class="box-line-icon icon mercury-icon-group"></div>
                                    <div class="box-line-divider"></div>
                                    <h5 class="box-line-title">ابنِ فريق عمل متكامل متكون من خبراء في مختلف المجالات ومن مختلف المدن  . </h5>
                                </article>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <!-- Box Line-->
                                <article class="box-line">
                                    <div class="box-line-icon icon mercury-icon-partners"></div>
                                    <div class="box-line-divider"></div>
                                    <h5 class="box-line-title"> تواصل مع موظفيك عن بعد و احصل على مشاريعك دون تعب </h5>
                                </article>
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