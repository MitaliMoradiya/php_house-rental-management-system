<?php
  session_start();
   $conn = mysqli_connect('localhost', 'root','', 'db');

    if (!$conn) 
    {
        die("error in connection...");
    }

  

    if(isset($_POST['Insert']))
            {
                // $_SESSION['pid']=$_POST['pr_id'];
                $_SESSION['ptype']=$_POST['prtype'];
                $_SESSION['addr']=$_POST['address'];
                $_SESSION['room']=$_POST['room'];
                $_SESSION['price']=$_POST['price'];
               
                $filename = $_FILES['image']['name'];
                $temp = $_FILES['image']['tmp_name'];
                $dest = "image/".$filename;
                
                            
                if(move_uploaded_file($temp, $dest))
                {
                    $q=
                    "INSERT INTO `property` (`pr_id`, `pr_type`, `address`, `no_of_room`, `price`, `image`) VALUES (NULL, '".$_SESSION['ptype']." ', '".$_SESSION['addr']."', '".$_SESSION['room']."', '".$_SESSION['price']."', '".$dest."')";

                // "insert into property values(null, ".$_SESSION['ptype']." , ".$_SESSION['addr']." , ".$_SESSION['room']." ,".$_SESSION['price'].", ".$filename." ";

                
               $r= mysqli_query($conn,$q);
                
                    echo 'IMAGE INSERT SUCCESSFULLY ...';
                }
                else
                {
                    echo 'IMAGE NOT INSERTED...';
                }
                
            } 

    $q = "select * from property";

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
       <?php require_once './after_slogin.php'; ?>
		
        <div class="cart-main-area ptb-100">
            <div class="container">
                <center>
                <h3 class="page-title">Property</h3>
                </center>
                <div class="row">
                   <?php
            
                        $q = mysqli_query($conn, "select * from property");
                        $i = 0;
                        while ($a = mysqli_fetch_row($q)) {
                        $i = $i + 1;
                        }
            $customer = $i;

     echo "<center>";
     echo "<table border=3px solid black style=text-align:center><tr><th style=width:1200px>Total Product</th><td style=width:400px>$customer</td></tr></table><br></br>";
     echo "</center>";    
     ?>
                        
                  
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                   
                        <form action="#">
                            <div class="table-content table-responsive">
                               
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Image</th>
                                            <th>P_Name</th>
                                            <th>Address</th>
                                            <th>no_of_room</th>
                                            <th>price</th>
                                            <th>update</th>
                                            <th>Delete</th>
                                              
                                         
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                        while($pro= mysqli_fetch_row($r))
                                        {
                                            
                                         
                                     ?>
                                        
                                        
                                        <tr>
                                            <td class="product-name"><?php echo $pro[0]; ?></td>
                                            <td class="product-thumbnail">
                                                <a href="#"><img alt="" src="<?php echo $pro[5];?>" width="150px"></a>
                                            </td>
                                            
                                            
                                            <td class="product-name"><?php echo $pro[1]; ?></td>
                                             <td class="product-name"><?php echo $pro[2]; ?></td>
                                             <td class="product-price"><?php echo $pro[3]; ?></td>
                                            <td class="product-price"><?php echo $pro[4]; ?></td>                                             
                                            
                                            
                                           
                                            <td class="product-addtocart">
                                                
                                                
                                                <a class="btn btn-success" href="update_product.php?pid=<?php echo $pro[0]; ?>">UPDATE</i></a>
                                           </td>
                                           
                                           <td class="product-buynow">
                                                
                                                
                                               <a class="btn btn-danger" href="delete_product.php?pid=<?php echo $pro[0]; ?>">DELETE</i></a>
                                                    
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
       
        <?php require_once './footer-file.php'; ?>
    </body>

</html>