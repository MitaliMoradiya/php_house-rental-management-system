<?php
session_start();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="robots" content="noindex, follow" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

        <!-- all css here -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/slick.css">
        <link rel="stylesheet" href="assets/css/chosen.min.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/themify-icons.css">
        <link rel="stylesheet" href="assets/css/ionicons.min.css">
        <link rel="stylesheet" href="assets/css/jquery-ui.css">
        <link rel="stylesheet" href="assets/css/meanmenu.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
        <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
    <?php require_once './after_login_header.php'; ?>

        <div class="login-register-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                        <div class="login-register-wrapper">
                            <div class="login-register-tab-list nav">
                                <a class="active" data-toggle="tab" href="#lg1">
                                    <h4> CHANGE PASSWORD </h4>
                                </a>

                            </div>
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <center>
                                                <form action="" method="post" enctype="multipart/form-data">

                                                    <table border="3">

                                                        

                                                    Old Password : <input type="password" name="old"></br>

                                                    New Password : <input type="password" name="new"></br>

                                                    Conform Password : <input type="password" name="new"></br>

                                                        <hr>
                                                        <center>
                                                            <input type="submit" name="submit" value="submit">

                                                            </table>

                                                            </form>
                                                        </center>                                        </div>
                                                        </div>
                                                        </div>
                                                        <div id="lg2" class="tab-pane">
                                                            <div class="login-form-container">
                                                                <div class="login-register-form">

                                                            </div>
                                                      </div>
                                              </div>
                                      </div>
                               </div>
                         </div>
                </div>
         </div>
  </div>

                                                        <?php
    $conn = mysqli_connect('localhost', 'root', '', 'DB');
    if (!$conn) {
        die("ERROR IN CONNECTION...");
    }

    ob_start();

    if (isset($_POST['submit'])) 
    {
        
        $Email = $_SESSION['email'];
        $oldpassword = $_POST['old'];
        $newpassword = $_POST['new'];
        $repassword = $_POST['cnew'];

        $query = "select * from tbl_reg where Email='$Email'";
        $result = mysqli_query($conn, $query);
        $num = mysqli_num_rows($result);
        if ($num > 0) 
        {
            while ($row1 = mysqli_fetch_assoc($result))
            {
                if (password_verify($oldpassword, $row1['password'])) 
                {
                    if ($newpassword == $repassword) 
                    {
                        $hash = password_hash($newpassword, PASSWORD_DEFAULT);
                        $query1 = "update tbl_reg set password='$hash' where email='$Email'";
                        $r = mysqli_query($conn, $query1);
                        if ($r) 
                        {
                            ?>
                <script>
                window.location.href = "http://localhost/project%201/index.php";
                </script>
                <?php
                            // header("location:index.php");
                        } else 
                        {
                            echo "<script> alert('password does\'t update !! please try again');</script>";
                            ?>
                            <script>
                            window.location.href = "http://localhost/project%201/index.php";
                            </script>
                            <?php
                            // header("location:login.php");
                        }
                    } 
                    else 
                    {
                        echo "<script> alert('Password does\'t match !! please try again');</script>";
                    }
                } 
                else
                {
                    echo "<script> alert('old Password does\'t match !! please try again');</script>";
                }
            }
        } 
        else 
        {
            echo "<script> alert('no !! please try again'   );</script>";
        }
    }
    ob_flush();
    ?>
</body>
</html>


