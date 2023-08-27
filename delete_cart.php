<?php
require_once './after_login_header.php';

$conn = mysqli_connect('localhost', 'root', '', 'DB');
if (!$conn) {
    die("ERROR IN CONNECTION...");
}

$pid = $_REQUEST['pid'];

$q = "delete from tbl_fav where pr_id='$pid'";

$r = mysqli_query($conn, $q);

if($r)
{
    echo "<script> alert('DELETE suceesfully'   );</script>";
                ?>
                <script>
                window.location.href = "http://localhost/project%201/cart-page.php"
                </script>
                <?php
}
else
{
    echo "error";
}
?>

        
        <?php 
require_once './footer-file.php';
        ?>
    </body>
</html>