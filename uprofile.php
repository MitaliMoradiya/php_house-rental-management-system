<?php
require_once './after_login_header.php';

$conn = mysqli_connect('localhost', 'root', '', 'DB');
if (!$conn) {
    die("ERROR IN CONNECTION...");
}

$cid = $_REQUEST['cid'];

$q = "select * from tbl_reg where c_id='$cid'";

$r = mysqli_query($conn, $q);

$row = mysqli_fetch_array($r);
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
        <div class="login-register-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                        <div class="login-register-wrapper">
                            <div class="login-register-tab-list nav">
                                <a class="active" data-toggle="tab" href="#lg1">
                                    <h4> UPDATE PROFILE </h4>
                                </a>

                            </div>
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <center>
                                                <form action="" method="post" enctype="multipart/form-data">

                                                    <table border="3">

                                                        

                                                        c_name : <input type="text" name="cname" value="<?php echo $row['c_name'] ?>"></br>

                                                        c_contact : <input type="text" name="ccon" value="<?php echo $row['c_contact'] ?>"></br>

                                                        c_city : <input type="text" name="ccity" value="<?php echo $row['c_city'] ?>"></br>

                                                        email : <input type="text" readonly name="email" value="<?php echo $row['email'] ?>"></br>

                                                        <hr>
                                                        <center>
                                                            <input type="submit" name="Update" value="Update">






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
        if (isset($_POST['Update'])) {

            $cid = $_REQUEST['cid'];            
            $cn = $_POST['cname'];
            $ccon = $_POST['ccon'];
            $ccity = $_POST['ccity'];
            $em = $_POST['email'];

            $q = "update tbl_reg set c_name='$cn' , c_contact='$ccon' , c_city='$ccity' , email='$em'  where c_id='$cid' ";
            $r = mysqli_query($conn, $q);

            // $row = mysqli_fetch_all($r);

            if ($r) {
                ?>
                <script>
                window.location.href = "http://localhost/project%202/profile.php";
                </script>
                <?php
                
            } else {
                
                echo "error";
                
            }
        }
        ?>
</body>
</html>


