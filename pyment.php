<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'DB');
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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
        
        <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>


        <div class="login-register-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                        <div class="login-register-wrapper">
                            <div class="login-register-tab-list nav">

                                <a data-toggle="tab" href="#lg2">
                                    <h4> PAYMENT </h4>
                                </a>
                            </div>
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form action="choice.php" method="post" enctype="multipart/form-data">

                                                P_Name : <input type="text" name="pname" value="<?php echo $row['pr_type'] ?>"</br>

                                                <!-- Quantity : </br> 
                                                <div class="col-lg-2">
                                                    <div class="input-group">
                                                        <span class="input-group-btn">
                                                            <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="" id="decerment">
                                                                <span class="glyphicon glyphicon-minus"></span>
                                                            </button>
                                                        </span>
                                                        <input type="number" name="quantity" value="1" id="quantity">
                                                        
                                                        <span class="input-group-btn">
                                                            <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="" id="incerment" onclick="myFunction()">
                                                                <span class="glyphicon glyphicon-plus"></span>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </div> -->


                                                Price : <input type="text" name="price" value="<?php echo $row['price'] ?>"</br>



                                                <input type="submit" name="PayNow" value="PayNow"><span></span></button>   






                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </body>

    <?php
      
    ?>

</html>