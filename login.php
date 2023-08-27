<?php 
    session_start();
    
    $conn=mysqli_connect('localhost','root','','DB');
           
            if(!$conn)
            {
                die("error in connection...");
            }
           
           
            if(isset($_POST['Login']))
            {
                
                $email=$_POST['email'];
                $password=$_POST['password'];
                
                
               
//              $q="select * from tbl_reg where email='$Email' and password='$Password'";
               
                $q="select email,password,c_id from tbl_reg where email='$email'";
                
                $r= mysqli_query($conn, $q);
                
               
               
                if(mysqli_num_rows($r)>0)
                {
                    $row=mysqli_fetch_assoc($r);
                    
                    if($row['email']==$email)
                    {
                       if(password_verify($password,$row['password']))
                       {
                           $_SESSION['ci']=$row['c_id'];
                           
                           $_SESSION['email'] = $email;
                           
                           
                           header("location:after_home.php");
                       }
                       else
                       {
                           echo 'PASSWORD IS INVALIED...';
                       }
                    }
                    

                }
                else
                {
                    echo 'email and password is invalid...';
                }
                
                
            }
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
    <?php require_once './header-file.php'; ?>
        <div class="login-register-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                        <div class="login-register-wrapper">
                            <div class="login-register-tab-list nav">
                                <a class="active" data-toggle="tab" href="#lg1">
                                    <h4> login </h4>
                                </a>
                                
                            </div>
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form action="" method="post">
                                                Email : <input type="email" name="email"><br></br>
                       
                                                Password  : <input type="password" name="password"><br></br>
                                                <div class="button-box">
                                                    <!-- <div class="login-toggle-btn">
                                                        <input type="checkbox">
                                                        <label>Remember me</label>
                                                        <a href="fpassword.php">Forgot Password?</a>
                                                    </div> -->
                                                    <button type="submit" name="Login" ><span>Login</span></button>
                                                </div>
                                            </form>
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
       

    </body>
    
    
   

</html>

 