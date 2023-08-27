<?php
    session_start();
            
            
            $conn = mysqli_connect('localhost','root','','DB');
            if(!$conn)
            {
                die("ERROR IN CONNECTION...");
            }
            
            $q="select * from tbl_fav where c_id = '".$_SESSION['ci']."' ";
            
            $r= mysqli_query($conn, $q);
                
            

        ?>
<!doctype html>
<html class="no-js" lang="zxx">
    
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
        <!-- header start -->
       <?php require_once './after_login_header.php'; ?>
		
        <div class="cart-main-area ptb-100">
            <div class="container">
                <h3 class="page-title">Your cart items</h3>
                <!-- <div class="col-lg-4 col-md-12">
                    
                                <div class="grand-totall">
                                    <a href="order.php">Add to fav</a>
                                </div>
                            </div> -->
                <hr>    
                <div class="row">
                   
                        
                  
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                   
                        <form action="#">
                            <div class="table-content table-responsive">
                               
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>property Name</th>
                                            <th>addess</th>
                                            <th>RENT</th>
                                            <th>Delete</th>
                                            <th>CONFORM</th>    
                                         
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                        while($pro= mysqli_fetch_row($r))
                                        {
                                           $query = "select * from property where pr_id = ' " . $pro[2]   ."  '";
                                           $result= mysqli_query($conn, $query);  
                                           
                                           $p= mysqli_fetch_array($result);
                                         
                                     ?>
                                        
                                        <?php 
                                            
                                        ?>
                                        <tr>
                                            <td class="product-thumbnail">
                                                <a href="#"><img alt="" src="<?php echo $p[5];?>" width="200px"></a>
                                            </td>
                                            <td class="product-name"><?php echo $p[1]; ?></td>
                                            <td class="product-price"><?php echo $p[2]; ?></td>
                                            <!-- <?php
                                                $_SESSION['pprice']=$p[2];
                                            ?> -->
                                            
                                            <!-- <td class="product-quantity">
                                                <div class="pro-dec-cart">
                                                    <input class="cart-plus-minus-box" type="text" value="1" name="qtybutton">
                                                </div>
                                            </td> -->
                                            <td class="product-total"><?php echo $p[4]; ?></td>
                                            <td class="product-remove">
                                                
                                                
                                                <a class="btn btn-danger" href="delete_cart.php?pid=<?php echo $p[0]; ?>"><i class="fa fa-times">Delete</i></a>
                                           </td>
                                           
                                           <td class="product-buynow">
                                                
                                                
                                                <a class="btn btn-success" href="conform.php?pid=<?php echo $p[0]; ?>">CONFORM</i></a>
                                           </td>
                                        </tr>
                                        
                                       
                                    </tbody>
                                    <?php 
                                        }
                                    ?>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="cart-shiping-update-wrapper">
                                        <div class="cart-shiping-update">
                                            <a href="shop_product.php">Continue Searching</a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </form>
                          
                    </div>
                </div>
            </div>
        </div>
       
        <?php require_once './footer-file.php'; ?>
    </body>

</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h6>working in progess</h6>
</body>
</html>