<?php
    session_start();
                    
    
            require_once './after_login_header.php';
            require_once './after_login_header.php';
            
            $conn= mysqli_connect('localhost','root','','DB');
            
            if(!$conn)
            {
                die("error in connction...");
            }
            
//            echo $_SESSION['pri'];
//            exit();
            
            $pid = $_REQUEST['pid'];

            $sql = "select * from property  where pr_id='$pid'";
            $result = mysqli_query($conn, $sql);
            
            while($pri=mysqli_fetch_row($result))
            {
                $add=$pri[2];
                $p=$pri[4];
            }
            
            $ci = $_SESSION['ci'];
            
            
           
            

  
            $Query="insert into tbl_fav values(null,'$ci','$pid','$add','$p')";
        
            $r= mysqli_query($conn, $Query);
            
            
            if($r)
            {
                
                echo "<script> alert('favorite suceesfully'   );</script>";
                // header('Location: http://localhost/project%201/shop_product.php');
                ?>
                <script>
                window.location.href = "http://localhost/project%201/cart-page.php"
                </script>
                <?php
            }
            else
            {
                echo 'error';
            } 
            
           
?>


