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
        <?php
             $conn=mysqli_connect('localhost','root','','DB');
           
            if(!$conn)
            {
                die("error in connction...");
            }
           
           
            if(isset($_POST['Login']))
            {
                $email=$_POST['email'];
                $password=$_POST['password'];
                
                
               
//              $q="select * from tbl_reg where email='$Email' and password='$Password'";
               
                $q="select email,password from tbl_staff where email='$email'";
                
                $r= mysqli_query($conn, $q);
                
               
               
                if(mysqli_num_rows($r)>0)
                {
                    $row=mysqli_fetch_assoc($r);
                    
                    if($row['email']==$email)
                    {
                       if(password_verify($password,  $row['password']))
                       {
                           header("location:after_slogin.php");
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
       
    </body>
</html>
