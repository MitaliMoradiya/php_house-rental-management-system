<?php
    session_start();
    
     $c= mysqli_connect('localhost','root','','DB');
     if(!$c)
    {
        die('not connected');
    }
           
    
   
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
                                
                                <a data-toggle="tab" href="#lg2">
                                    <h4> CHOOSE YOUR PAYMENT METHOD </h4>
                                </a>
                            </div>
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form action="" method="post">
                                                Payment Type:<select name="type">
                                                    
                                                <option value="Cash on delivery">Cash On delivery</option>
                                                <option value="Online">Net-Banking</option>
                                            </select><br></br>
                                              <input type="submit" name="done" value="Done">
                                                
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
                
            

            if(isset($_POST['done']))
            {
                
//                echo '<pre>';
//            print_r($_SESSION);
//            die(    );
                $_SESSION['type']=$_POST['type'];
                $odid=$_SESSION['o_d_id'];
                
                
                if($_SESSION['type']=='Cash on delivery')
                {
                   
                   $status='Pending';
                   
                   $qu1="insert into tbl_bill values(null,'$odid','$status')";
                   echo $qu1;
                   $r= mysqli_query($c,$qu1);
                                      
                    if($r)
                    {
                        header("Location:amount.php");
                    }
                }
                else
                {
                    $status1='Complete';
                    $odid1=$_SESSION['o_d_id'];
                   
                    $qu2="insert into tbl_bill values(null,'$odid','$status1')";
                    echo $qu2;
                    $r= mysqli_query($c,$qu2);
                    if($r)
                    {
                        $qu3="select Bill_id from tbl_bill where O_d_id='$odid1'";
                        echo $qu3;
                        
                        $sql= mysqli_query($c,$qu3);
                        
                        $b= mysqli_fetch_row($sql);
                        $_SESSION['bid']=$b[0];
                        header("Location:payscript.php");
                    }
                }
               
                
                
            }
           
        ?>
    </body>
</html>