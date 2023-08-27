<?php
session_start();
//echo '<pre>';
//            print_r($_SESSION);
//            die(    );
//if(!$_SESSION['reg'])
//{
//    header("Location:index.php");
//}

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
        <?php
        // put your code here
        
        $c= mysqli_connect('localhost','root','','DB');
            if(!$c)
            {
                die('not connected');
            }
            
            $ci = $_SESSION['ci'];
            $total_amount=0;
            
            $Query1="select pr_id from tbl_fav where c_id='$ci'";
            $csql= mysqli_query($c,$Query1);
            
            while($a= mysqli_fetch_row($csql))
            {
                $pid=$a[0];
                
                
                $Query2="select * from tbl_order where c_id='$ci' and pr_id='$pid'";
                $r= mysqli_query($c,$Query2);
                while($row=mysqli_fetch_row($r))
                {
                    $oid=$row[0];
                    $prid=$row[2];
                    $quant=$row[4];
                    $price=$row[5];
                    $total_price= $quant * $price;
                    
                }
                $total_amount=$total_price+$total_amount;
                $_SESSION['total_amount']=$total_amount;
            }
        $dis=0;
        
        $Query3="insert into tbl_order_details values(null,'$oid','$ci','$total_amount')";
             
        $r= mysqli_query($c,$Query3);
        
        echo $Query3;
        $_SESSION['o_d_id']=mysqli_insert_id($c);
//        echo '<pre>';
//         print_r($_SESSION);
//        die();

        
        
        
        
        if($r)
        {
            
            $Query4="select o_d_id,c_id,O_id from tbl_order_details where O_id='$oid'";
            echo $Query4;
            
            echo $Query4;
            $sql= mysqli_query($c,$Query4);
            
            $b= mysqli_fetch_row($sql);
            
            //$_SESSION['o_d_id']=$b[0];
            
            echo $_SESSION[o_d_id];
            
            $Query5="delete from tbl_fav where c_id='$ci'";
            
            
            $result= mysqli_query($c,$Query5);
            
            if($result)
            {
                header("location:choice.php");
            }
        }
        ?>
    </body>
</html>