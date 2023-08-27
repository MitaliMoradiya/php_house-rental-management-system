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
        <meta charset="UTF-8">
        <title></title>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        
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
        <form action="" method="post">
        <?php
        // put your code here
            $c= mysqli_connect('localhost','root','','DB');
            if(!$c)
            {
                die('not connected');
            }
//            echo '<pre>';
//            print_r($_SESSION);
//            die(    );

                $pid = $_REQUEST['pid'];

                $q = "select * from property where pr_id='$pid'";
                $r = mysqli_query($c, $q);
                $row = mysqli_fetch_array($r);
                $ci = $_SESSION['ci'];
                $price = $row['price'];
                $odate = date('Y/m/d');
         
                // while($row= mysqli_fetch_row($r))
                {
                    // $product_id=$row[2];
                    
                    // $price=$row[4];
                
                    $q2="insert into tbl_conform values(null,'$ci','$pid','$price','$odate')";
                    $result= mysqli_query($c,$q2);
                    if($result)
                {
                    // header("location:order_detail.php");
                    echo "booking    successfully";
                }
                else
                {
                    echo "<script>alert('Not Buy Now')</script>";
                }
                    
                }
                
                
                
                
        ?>
    </body>
</html>