<?php
session_start();
ob_start();
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        include 'include/db_connnection.php';

        
        $email = '';
        $password = '';

        if(isset($_POST['email'])) {
            $email = $_POST['email'];
        } else {
            header("Location: index.php");
        }

        if(isset($_POST['password'])) {
            $password = $_POST['password'];
        } else {
            header("Location: index.php");
        }

        global $con;
        $query = $con->prepare("SELECT * from user WHERE email = ? AND password = ?;");
        $query->execute(
            array( $email, $password)
        );
        $count = $query->rowCount();

        $result = $query->fetch();

        if($count > 0) {
            $_SESSION['userId'] = $result['ID'];
            $_SESSION['userType'] = $result['userType_ID'];
            header("Location: index.php");
        } else {
            echo " تأكد من البريد الإلكتروني او كلمة المررور ";
        }

    } else {
        header("Location: index.php");
		die();
    }

?>