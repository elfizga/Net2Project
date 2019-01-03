<header class="section page-header">
    <div class="rd-navbar-wrap rd-navbar-classic-light">
        <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-lg-stick-up-offset="46px">
            <div class="rd-navbar-main-outer">
                <div class="rd-navbar-main">

                    <div class="rd-navbar-panel">
                        <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                        <div>
                            <a class="brand" href="index.php"><img src="images/koop_logo.png" alt="" width="70" height="30" /></a>
                        </div>
                    </div>
                    <div class="rd-navbar-main-element">
                        <div class="rd-navbar-nav-wrap">
                            <ul class="rd-navbar-nav">

                                <li class="rd-nav-item"><a class="rd-nav-link" href="index.php"> الرئيسية</a>
                                </li>
                                <?php
                                        if(isset($_SESSION['userId']) && $_SESSION['userId'] > 0) {
                                            if($_SESSION['userType'] == 1) {
                                                $sql = " 
												SELECT 
												ID FROM customer WHERE user_ID = ?";
														   global $con;
															$query = $con->prepare($sql);
															$query->execute(array($_SESSION['userId']));
															$result = $query->fetch();
                                                echo '<li class="rd-nav-item"><a class="rd-nav-link" href="companies-page.php?customerId=' . $result['ID'] . '"> الملف الشخصي  </a></li>';
                                            } else {
												$sql = " 
												SELECT 
												ID FROM technician WHERE user_ID = ?";
														   global $con;
															$query = $con->prepare($sql);
															$query->execute(array($_SESSION['userId']));
															$result = $query->fetch();
                                                echo '<li class="rd-nav-item"><a class="rd-nav-link" href="resume-page.php?workerId=' . $result['ID'] . '"> الملف الشخصي  </a></li>';
                                            }
                                            ?>

                                    <?php 
                                        }
                                    ?>
                                        <li class="rd-nav-item"><a class="rd-nav-link" href="about-us.php"> عن كوب </a>
                                        </li>
                                        <li class="rd-nav-item"><a class="rd-nav-link" href="job-listing.php"> بحث عن وظائف </a>
                                        </li>
                                        <li class="rd-nav-item"><a class="rd-nav-link" href="companies.php"> بحث عن موظفين </a>
                                        </li>
                                        <?php
                                        if(isset($_SESSION['userId']) && $_SESSION['userId'] > 0) {
                                            if($_SESSION['userType'] == 1) {
                                                echo 
                                                '<li class="rd-nav-item"><a class="rd-nav-link" href="post-a-job.php"> نشر وظيفة   </a></li>'
                                                ;
                                            } else {
                                                echo '';
                                            }
                                            ?>

                                            <?php 
                                        }
                                    ?>
                            </ul>
                        </div>
                    </div>
                    <div class="rd-navbar-aside">
                        <?php 
                            if(isset($_SESSION['userId']) && $_SESSION['userId'] > 0) {
                                ?>
                            <div class="rd-navbar-aside-item" id="logout">
                                <form action="logout.php" method="post">
                                    <button type="submit" class="button button-xs button-primary-outline button-icon button-icon-left button-anorak rd-navbar-popup-toggle"><span class="icon mdi mdi-account"></span> تسجيل خروج </button>
                                </form>
                            </div>
                            <?php
                            } else {
                                ?>
                                <div class="rd-navbar-aside-item">
                                    <button class="button button-xs button-primary button-icon button-icon-left button-anorak rd-navbar-popup-toggle" data-rd-navbar-toggle="#rd-navbar-login"><span class="icon mdi mdi-import"></span>تسجيل الدخول </button>
                                    <div class="rd-navbar-popup bg-gray-100" id="rd-navbar-login">
                                        <h5 class="rd-navbar-popup-title"> تسجيل الدخول </h5>
                                        <form class="rd-form form-compact" action="login.php" method="post">
                                            <div class="form-wrap">
                                                <input class="form-input" id="rd-navbar-login-email" type="email" name="email" data-constraints="@Email @Required" />
                                                <label class="form-label" for="rd-navbar-login-email">البريد الإلكتروني </label>
                                            </div>
                                            <div class="form-wrap">
                                                <input class="form-input" id="rd-navbar-login-password" type="password" name="password" data-constraints="@Required" />
                                                <label class="form-label" for="rd-navbar-login-password">كلمة المرور </label>
                                            </div>
                                            <div class="form-wrap">
                                                <button class="button button-block button-primary button-anorak" type="submit">دخول</button>
                                            </div>
                                            <div class="footer" style="text-align: center;">
                                                <br> <span> لا تمتلك حساب بعد ؟ انضم إلينا </span>
                                                <br> <a href="sign-up.php" class="button button-primary"> موظـف </a>
                                                <a href="sign-up-company.php" class="button button-primary "> زبـون  </a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <?php
                            } 
                            ?>

                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>