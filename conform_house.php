<?php //
        $conn= mysqli_connect('localhost','root','','DB');
        if(!$conn)
        {
           die("error");
        }
        $q = "SELECT tbl_reg.c_name,property.pr_type,tbl_conform.price,tbl_conform.date FROM tbl_conform JOIN tbl_reg ON tbl_conform.c_id = tbl_reg.c_id JOIN property ON tbl_conform.p_id = property.pr_id;";

        $r= mysqli_query($conn, $q);

//        echo "<table border=3px> <tr><th>cname</th><th>contact</th><th>city</th><th>email</th></tr>";
//
//        while($reg= mysqli_fetch_row($r))
//        {
//            echo "<tr><td>$reg[1]</td>";
//            echo "<td>$reg[2]</td>";  
//            echo "<td>$reg[3]</td>";  
//            echo "<td>$reg[4]</td>";  
//
//        }
       
       
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
        
        
    <?php require_once './after_slogin.php'; ?>
		
        <div class="cart-main-area ptb-100">
            <div class="container">
                <center>
                <h3 class="page-title">CONFORM HOUSE</h3>
               
                <div class="row">
                   
                        
                  
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                   <?php
            
                        $q = mysqli_query($conn, "SELECT tbl_reg.c_name,property.pr_type,tbl_conform.price,tbl_conform.date FROM tbl_conform JOIN tbl_reg ON tbl_conform.c_id = tbl_reg.c_id JOIN property ON tbl_conform.p_id = property.pr_id;");
                        $i = 0;
                        while ($a = mysqli_fetch_row($q)) {
                        $i = $i + 1;
                        }
            $customer = $i;

     echo "<center>";
     echo "<table border=3px solid black style=text-align:center><tr><th style=width:600px>Total house</th><td style=width:350px>$customer</td></tr></table><br></br>";
     echo "</center>";    
     ?>
                        <form action="#">
                            <div class="table-content table-responsive">
                               
                                <table>
                                    <thead>
                                        <tr>
                                            <th>C_ID</th>
                                            <th>P_ID</th>
                                           
                                           
                                            <th>TOTAL</th>
                                            <th>O_DATE</th>
                                             
                                         
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                        while($pro= mysqli_fetch_row($r))
                                        {
                                           
                                         
                                     ?>
                                        
                                        
                                        <tr>
                                            
                                            <td class="product-name"><?php echo $pro[0]; ?></td>
                                            <td class="product-price"><?php echo $pro[1]; ?></td>
                                            <td class="product-price"><?php echo $pro[2]; ?></td>
                                          
                                            <td class="product-price"><?php echo $pro[3]; ?></td>
                                            
                                          
                                           
                                           
                                        </tr>
                                        
                                       
                                    </tbody>
                                    <?php 
                                        }
                                    ?>
                                </table>
                            </div>
                           
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
        </center>
        <?php require_once './footer-file.php'; ?>
    </body>    
        
       
        
        
    </body>
</html>



     