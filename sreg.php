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
        <form action="" method="post" enctype="multipart/form-data">
            <table border="3">
                <tr>
                    
                    <td>
                        <h4>STAFF REGISTRATION</h4>
                    
                <hr>
                                     
            Name : <input type="text" name="name" pattern="[A-Za-z]*"><br></br>
            
            Gender : <input type="text" name="gender" pattern="[a-z]*" max="6" ><br></br>
                        
            Contact  : <input type="text" name="c_contact" pattern="[6789][0-9]*" min="10" max="12" requried=""><br></br>
                        
            City  : <input type="text" name="c_city" requried="" pattern="[a-z]*"><br></br>
            
            iproof  : <input type="file" name="iproof" requried=""><br></br>
            
            Address  : <input type="text" name="add" requried=""><br></br>
            
            Age  : <input type="text" name="age" requried="" pattern="[0-9]*"><br></br>
                        
            Email  : <input type="email" name="email" requried="" pattern=".+@gmail\.com" size="30"><br></br>
                        
            password   : <input type="password" name="password" requried=""><br></br>
                                                
                <center>                                
            <input type="submit" name="Registration" value="Registration"><span></span></button>   
                </center>
            </td>
            </tr>
            </<table>
                                                
                </form>
        </center>   
     <?php
            $conn= mysqli_connect('localhost','root','','DB');
            
            if(!$conn)
            {
                die("error in connction...");
            }
            
            
            if(isset($_POST['Registration']))
            {
                $sn=$_POST['name'];
                $g=$_POST['gender'];
                $cn=$_POST['c_contact'];
                $c=$_POST['c_city'];
                $ip=$_POST['iproof'];
                $ad=$_POST['add'];
                $age=$_POST['age'];
                $em=$_POST['email'];
                $pw=$_POST['password'];
                
                
                $pass=$_POST['password'];
                $hash = password_hash($pass,PASSWORD_DEFAULT);
                
                $filename = $_FILES['iproof']['name'];
                $temp = $_FILES['iproof']['tmp_name'];
                $dest = "iproof/".$filename;
                
                
                
                if(move_uploaded_file($temp, $dest))
                    echo 'IMAGE INSERT SUCCESSFULLY ...';
                else
                    echo 'IMAGE NOT INSERTED...';
                
                $q="insert into tbl_staff values(null , '$sn','$g','$cn','$c','$ip','$ad','$age','$em','$hash')";
                header("location:slogin.php");
                
               $r= mysqli_query($conn,$q);
                
                
                
            }
     ?>
    </body>
</html>
