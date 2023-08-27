<?php 
    session_start();
    
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
        <script src="assets/js/vendor/modernizr-2.8.3.min.js">
       
        
        
        
        </script>
    </head>
    <body>
 
        <div class="login-register-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                        <div class="login-register-wrapper">
                            <div class="login-register-tab-list nav">
                                
                                <a data-toggle="tab" href="#lg2">
                                    <h4> register </h4>
                                </a>
                            </div>
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form action="" method="post">
                                                Name : <input type="text" name="c_name" pattern="[A-Z a-z]*" required><br></br>
                        
                                                Contact  : <input type="text" name="c_contact" pattern="[6789][0-9]*" min="10" max="12" requried=""><br></br>
                        
                                                City  : <input type="text" name="c_city" requried="" pattern="[a-z]*" required=""><br></br>
                        
                                                Email  : <input type="email" name="email" requried="" pattern=".+@gmail\.com" size="30" required><br></br>
                                                
                                                password   : <input type="password" name="password" requried="" ><br></br>
                                                
                                                
                                                <input type="submit" name="Registration" value="Registration"><span></span></button>   
                                                
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
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    require('PHPMailer/src/PHPMailer.php');
    require('PHPMailer/src/Exception.php');
    require('PHPMailer/src/SMTP.php');
        $conn= mysqli_connect('localhost','root','','DB');
            
            if(!$conn)
            {
                die("error in connction...");
            }
            
            
            if(isset($_POST['Registration']))
            {
                $_SESSION['reg']='true';
                //$_SESSION['cid']=$_POST['c_id'];
                $_SESSION['cn']=$_POST['c_name'];
                $_SESSION['ccon']=$_POST['c_contact'];
                $_SESSION['cc']=$_POST['c_city'];
                $_SESSION['em']=$_POST['email'];
                $_SESSION['pw']=$_POST['password'];
                
                $pass=$_POST['password'];
                $hash = password_hash($pass, PASSWORD_DEFAULT); 
                $otp = rand(100000, 999999);
        
                        $mail = new PHPMailer(true);
        
                        try {
        
                            //Server settings
        
                            $mail->isSMTP();
                            $mail->Host       = 'smtp.gmail.com';
                            $mail->SMTPAuth   = true;
                            $mail->Username   = 'rentalhouse470@gmail.com';
                            $mail->Password   = 'fwpsxmsoyyromovw';
                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                            $mail->Port       = 465;
        
        
        
                            //Recipients
                            $mail->setFrom('rentalhouse470@gmail.com', 'house rental');
                            $mail->addAddress($_POST['email']);     //Add a recipient
        
                            $mail->isHTML(true);
                            //$msg=file_get_contents("beefree-wbrjvkqo22s.php");
        
                            $mail->Subject = 'Sign Up Verification';
        
                            $mail->Body    = "Thanks For Registering! <br> Here is the One Time Password for  " . $otp;
        
                            $mail->MsgHTML = ('h');
        
        
        
                            $mail->send();
                             
                    
                $q="insert into tbl_reg values(null, '$_SESSION[cn]' , '$_SESSION[ccon]' , '$_SESSION[cc]' , '$_SESSION[em]' , '$hash')";
                $r= mysqli_query($conn, $q);
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }  
                if($r)
                {
                    echo 'login successfully';
                    header("location:ologin.php");
                }
                else
                {
                    header("location:index.php");
                    echo 'error';
                }
                echo 'finish';
                header("location:olgin.php");
                
            }
    ?>

</html>
