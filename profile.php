<?php 
    session_start(); 
    
    
            $conn = mysqli_connect('localhost','root','','DB');
            if(!$conn)
            {
                die("ERROR IN CONNECTION...");
            }
                
           
            // $email=$_POST['email'];
            $q = "select * from tbl_reg where email='".$_SESSION['email']."'";

            $r= mysqli_query($conn, $q);
            
            
//            
//            {
//                echo "<tr><td>$reg[1]</td>";
//                echo "<td>$reg[2]</td>";  
//                echo "<td>$reg[3]</td>";  
//                echo "<td>$reg[4]</td>";  
//                
//                echo "<td><a href='Uprofile.php?cname=$reg[1]'>Update Profile</td>";
//                echo "<td><a href='changepassword.php'>Changepassword</td></tr><BR>";
//                
//                            
//            }
       
?>
<!-- comment --><!DOCTYPE html>
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
        
        
        <?php require_once './after_login_header.php'; ?>
		
        <div class="cart-main-area ptb-100">
            <div class="container">
                <center>
                <h3 class="page-title">Profile update</h3>
                </center>
                <div class="row">
                   
                        
                  
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                   
                        <form action="#">
                            <div class="table-content table-responsive">
                               
                                <table>
                                    <thead>
                                        <tr>
                                            
                                            <th>C_Name</th>
                                            <th>CONTACT NUMBER</th>
                                            <th>CITY</th>
                                            <th>EMAIL</th>
                                            <th>CHANGE PASSWORD</th>
                                            <th>UPDATE PROFILE</th>    
                                               
                                         
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                        while($pro= mysqli_fetch_array($r))
                                        {
                                            
                                         
                                     ?>
                                        
                                        
                                        <tr>
                                            
                                            
                                            <td class="product-name"><?php echo $pro[1]; ?></td>
                                            <td class="product-name"><?php echo $pro[2]; ?></td>
                                            <td class="product-price"><?php echo $pro[3]; ?></td>
                                            <td class="product-price"><?php echo $pro[4]; ?></td>
                                            
                                            
                                            
                                           
                                            <td class="product-addtocart">
                                                
                                                
                                                <a href="changepassword.php" class="btn btn-success">CHANGE PASSWORD</i></a>
                                                
                                           </td>
                                           
                                           <td class="product-buynow">
                                                
                                                
                                               <a class="btn btn-primary" href="uprofile.php?cid=<?php echo $pro[0]; ?>">UPDATE PROFILE</i></a>
                                                    
                                           </td>
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
        
        
        
        
        
        
    </body>
</html>
