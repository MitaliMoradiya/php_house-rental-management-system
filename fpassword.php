<?php
        session_start();
            $conn=mysqli_connect('localhost','root','','DB');
            
            if(!$conn)
            {
                die("error in connaction");
            }
            
            if(isset($_REQUEST['send']))
            {
                $_SESSION['getmail']=$_POST['email'];
                if(isset($_SESSION['getmail'])){
                    $q="select token,email from tbl_reg where email= ".$_SESSION['getmail']."" ;
                    $r= mysqli_query($conn, $q);

                    $row= mysqli_fetch_row($r);
                    $token=$row[0];
                    //echo "$_SESSION[getmail]";

                    require 'Email.php';
                    
                    

                    $from='ritulkanani7102@gmail.com';
                    $subject="Email verify";
                    $message="Hey,click here to activate your account //http://localhost:8888/project/flink.php?tokan";
                    $to=$_SESSION['getmail'];
                    try{
                        
                     Email::send($from, $subject, $message, $to);
                     
                    } catch (phpmailerException $e) {
                        echo $e->errorMessage(); //Pretty error messages from PHPMailer
                    } catch (Exception $e) {
                      echo $e->getMessage(); //Boring error messages from anything else!
                    }  
                    echo "mail sent successfullly";
                }
                
                
                
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
    </head>
    <body>
        <center>
            <form action="" method="post">
                <table border="3">
                    <tr>
                        <td>
                            <h3>Forgot password</h3>
                            <hr>
                            
                            Enter mail_id : <input type="email" name="email" required>
                            
                            <center>
                            
                            <input type="submit" name="send" value="send">
                            </center>
                        </td>                    
                    </tr>
            </form>
        </center>
        
    </body>
</html>
