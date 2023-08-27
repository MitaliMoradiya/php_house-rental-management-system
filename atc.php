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
                // $qty=$pri[4];
                // $pr=$pri[6];
            }
            
            $ci = $_SESSION['ci'];
            
           
            

  
            $Query="insert into tbl_add_to_cart values(null,'$ci','$pid')";
          
            $r= mysqli_query($conn, $Query);
            
            
            if($r)
            {
                header("Location:order.php");
            }
            else
            {
                echo 'error';
            } 
            
           
?>


