<?php
require_once './after_slogin.php';

$conn = mysqli_connect('localhost', 'root', '', 'DB');
if (!$conn) {
    die("ERROR IN CONNECTION...");
}

$pid = $_REQUEST['pid'];

$q = "delete from property where pr_id='$pid'";

$r = mysqli_query($conn, $q);

if($r)
{
    ?>
    <script>
        window.location.href = "http://localhost/project%201/product_check.php";
   </script>
   <?php
    // header("location:product_check.php");
}
else
{
    echo "error";
}

require_once './footer-file.php';

?>


        
        