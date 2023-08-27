<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'DB');

if (!$conn) {
    die("error in connaction");
}

if (isset($_POST['Set'])) {
    $Email = $_SESSION['email'];
    $newpassword = $_POST['npassword'];
    $confrompassword = $_POST['cpassword'];
//                
//                $hash = password_hash($newpassword, PASSWORD_DEFAULT);
//                $query="update tbl_reg set password='$hash' where email='$Email'";
//                echo $query;
//                $result = mysqli_query($conn, $query);
//                
//                if($result)
//                {
//                    echo 'update successfully...';
//                    header("location:index.php");
//                }
//                else
//                {
//                    echo 'error';
//                }
    if ($newpassword == $confrompassword) 
    {
   
        $hash = password_hash($newpassword, PASSWORD_DEFAULT);
        $query1 = "update tbl_reg set password='$hash' where email='".$_SESSION['getmail']."'";
        $r = mysqli_query($conn, $query1);
        echo $query1;    
        if ($r) 
        {
            header("location:index.php");
        } 
        else 
        {
            echo 'alert';
            header("location:login.php");
        }
    } 
    else 
    {
        echo 'error';
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
                        <h3>Set password</h3>
                        <hr> 

                        Enter New Password : <input type="password" name="npassword"></br>

                        Enter Conform Password : <input type="password" name="cpassword"></br>

                <center>
                    <hr>
                    <input type="submit" name="Set" value="Set">
                </center>
                </td>                    
                </tr>
            </table>
        </form>
    </center>
</body>
</html>