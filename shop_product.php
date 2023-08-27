<?php

    session_start();
    
    
    $conn = mysqli_connect('localhost', 'root', '', 'DB');

    if (!$conn) 
    {
        die("error in connction...");
    }


    $q = "select * from property";

    $r= mysqli_query($conn, $q);

    
?>

<!doctype html>
<html class="no-js" lang="zxx">
    
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
        <!-- header start -->
       <?php require_once './after_login_header.php'; ?>
		
        <div class="cart-main-area ptb-100">
            <div class="container">
                <center>
                <h3 class="page-title">Property</h3>
                </center>
                <div class="row">
                   
                        
                  
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                   
                        <form action="#">
                            <div class="table-content table-responsive">
                               
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>p_type</th>
                                            <th>address</th>
                                            <th>no_of_room</th>
                                            <th>price</th>
                                            <th>Fav</th>
                                            <!--    <th>Buy Now</th>-->    
                                         
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                        while($pro= mysqli_fetch_row($r))
                                        {
                                           $query = "select * from tbl_product where p_id = ' " . $pro[0]   ."  '";
                                           $result= mysqli_query($conn, $query);  
                                           
                                           $p= mysqli_fetch_array($result);
                                         
                                     ?>
                                        
                                        
                                        <tr>
                                            <td class="product-thumbnail">
                                                <a href="#"><img alt="" src="<?php echo $pro[5];?>" width="150px"></a>
                                            </td>
                                            <td class="product-name"><?php echo $pro[1]; ?></td>
                                            <td class="product-price"><?php echo $pro[2]; ?></td>
                                            <td class="product-name"><?php echo $pro[3]; ?></td>
                                        <td class="product-name"><?php echo $pro[4]; ?></td>
                                           
                                            <td class="product-addtocart">
                                                
                                                
                                                <a class="btn btn-primary" href="fav.php?pid=<?php echo $pro[0];?>">FAV</i></a>
                                           </td>
                                           
                                           <td class="product-buynow">
                                                
                                                
                                                <!--<a href="payscript.php?pid=<?php echo $pro[0]; ?>">Buy Now</i></a>-->
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
                                            <a href="shop_product.php">Continue Search</a>
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

</html>
<!--<!doctype html>
<html class="no-js" lang="zxx">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="robots" content="noindex, follow" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
         Favicon 
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

         all css here 
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
         header start 
        <?php require_once './after_login_header.php'; ?>
         header end 
         Breadcrumb Area Start 
        <div class="breadcrumb-area bg-image-3 ptb-150">
        
         
        
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h3>SHOP PAGE</h3>
                    <ul>
                        
                    </ul>
                </div>
            </div>
        </div>
         Breadcrumb Area End 
         Shop Page Area Start 
        
        
        
        <div class="shop-page-area ptb-100">
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-lg-9">
                        
                        <div class="grid-list-product-wrapper">
                            <div class="product-grid product-view pb-20">
                                <div class="row">
                                    <?php 
                                        while($pro= mysqli_fetch_row($r))
                                        {
                                            
                                    ?>
                                    <div class="container">
<div class="row">
  <div class="col-sm">
    
    
    <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="<?php echo $pro[5];?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><strong>Name : </strong><?php echo $pro[2];?></h5>
    <h5 class="card-text"><strong>Price : </strong><?php echo $pro[6];?></h5>
    <h5 class="card-text"><strong>Quantity : </strong><?php echo $pro[4];?></h5>
    <h5 class="card-text"><strong>Decripition : </strong><?php echo $pro[7];?></h5>
    <a href="atc.php?pid=<?php echo $pro[0]; ?>" class="btn btn-primary"> Add to cart</a>
    <a href="pyment.php?pid=<?php echo $pro[0]; ?>" class="btn btn-primary">Buy Now</a>
  </div>
    </div>
  </div>
  
</div>
</div>
                                    <div class="product-width col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30">
                                        <div class="product-wrapper">
                                            <div class="product-img">
                                                <a href="product-details.php">
                                                    <img alt="" src="<?php echo $pro[5];?>">
                                                </a>   
                                            </div>
                                            <div class="product-content text-left">
                                                <div class="product-hover-style">
                                                    <div class="product-title">
                                                        <h4>
                                                            <a href="product-details.php"><?php echo $pro[1];?></a>
                                                        </h4>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="product-list-details">
                                                <h4>
                                                    <a href="product-details.php"><?php echo $pro[2];?></a>
                                                </h4>
                                                <div class="product-price-wrapper">
                                                    <span><?php echo $pro[6];?></span>
                                                    
                                                </div>
                                                <p><?php echo $pro[7];?></p>
                                                <div class="shop-list-cart-wishlist">
                                                    <a href="#" title="Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                                    <a href="" title="Add To Cart"><i class="ion-ios-shuffle-strong"></i></a>
                                                    <a href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                                                        <i class="ion-ios-search-strong"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                
                               
                                <?php 
                                    }
                                ?>
                                </div>
                            </div>   
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
       
        <?php require_once './footer-file.php'; ?>
    </body>

</html>-->


