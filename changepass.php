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
                        <h4>CHENGE PASSWORD</h4>
                        <hr>

                        Old Password : <input type="password" name="old"></br>

                        New Password : <input type="password" name="new"></br>

                        Conform Password : <input type="password" name="cnew"></br>
                <center>

                    <input type="submit" name="submit" value="submit">
                </center>
                </td>
                </tr>
            </table>
        </form>
    </center>

    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'DB');
    if (!$conn) {
        die("ERROR IN CONNECTION...");
    }

    ob_start();

    if (isset($_POST['submit'])) 
    {
        session_start();
        $Email = $_SESSION['email'];
        $oldpassword = $_POST['old'];
        $newpassword = $_POST['new'];
        $repassword = $_POST['cnew'];

        $query = "select * from tbl_reg where Email='$Email'";
        $result = mysqli_query($conn, $query);
        $num = mysqli_num_rows($result);
        if ($num > 0) 
        {
            while ($row1 = mysqli_fetch_assoc($result))
            {
                if (password_verify($oldpassword, $row1['password'])) 
                {
                    if ($newpassword == $repassword) 
                    {
                        $hash = password_hash($newpassword, PASSWORD_DEFAULT);
                        $query1 = "update tbl_reg set password='$hash' where email='$Email'";
                        $r = mysqli_query($conn, $query1);
                        if ($r) 
                        {
                            header("location:index.php");
                        } else 
                        {
                            echo "<script> alert('password does\'t update !! please try again');</script>";
                            header("location:login.php");
                        }
                    } 
                    else 
                    {
                        echo "<script> alert('Password does\'t match !! please try again');</script>";
                    }
                } 
                else
                {
                    echo "<script> alert('old Password does\'t match !! please try again');</script>";
                }
            }
        } 
        else 
        {
            echo "<script> alert('no !! please try again'   );</script>";
        }
    }
    ob_flush();
    ?>
</body>
</html>


