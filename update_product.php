    <?php
require_once './after_slogin.php';

$conn = mysqli_connect('localhost', 'root','', 'DB');
if (!$conn) {
    die("ERROR IN CONNECTION...");
}

$pid = $_REQUEST['pid'];

$q = "select * from property where pr_id='$pid'";

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
        <title>HOUSE RENTAL</title>
        <meta name="description" content="">
        <meta name="robots" content="noindex, follow" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
    

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
                                    <h4> PRODUCT </h4>
                                </a>

                            </div>
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <center>
                                                <form action="" method="post" enctype="multipart/form-data">

                                                    
                                                       

                                                        pr_type : <input type="text" name="pname" value="<?php echo $row['pr_type'] ?>"</br>

                                                        address : <input type="text" name="company" value="<?php echo $row['address'] ?>"</br>

                                                        no_of_room : <input type="text" name="model" value="<?php echo $row['no_of_room'] ?>"</br>

                
                                                        Price : <input type="text" name="price" value="<?php echo $row['price'] ?>"</br>

                                                        image :<img src="<?php echo $row['image'] ?>" width="100px"> 
                                                        <input type="file" name="image" value="<?php echo $row['image'] ?>"</br>

                                                       
                                                       
                                                        
                                                        
                                                            <input type="submit" name="Update" value="Update">





                                                        
                                                        

                                                </form>
                                            </center>
                                        </div>
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

    $pn = $_POST['pname'];
    $cp = $_POST['company'];
    $m = $_POST['model'];

    //$i=$_POST['image'];
    $p = $_POST['price'];
  

    $q = "update property set pr_type='$pn' , address='$cp' , no_of_room='$m' , price='$p'   where pr_type='$pn' ";
    if(mysqli_query($conn, $q))
    {
        echo "s";
        ?>
    <script>
        window.location.href = "http://localhost/project%201/product_check.php";
   </script>
   <?php
    }
    else
    {
        echo mysqli_error($conn);
    }

  
}
?>
    </body>
    <?php 
require_once './footer-file.php';
        ?>
</html>