<?php
    session_start();
            require_once './after_login_header.php';
            
            $conn = mysqli_connect('localhost','root','root','DB');
            if(!$conn)
            {
                die("ERROR IN CONNECTION...");
            }
            
            $q="select * from tbl_add_to_cart where c_id = '".$_SESSION['ci']."' ";
            
            $r= mysqli_query($conn, $q);
            
            echo "<table border=3px> <tr><th>P_Name</th><th>Company</th><th>Model</th><th>Image</th><th>Price</th><th>Description</th><th>Remove from cart</th><th>Buy Now</th></tr>";
                
            while($pro= mysqli_fetch_row($r))
            {
                
                $query = "select * from tbl_product where p_id = ' " . $pro[2]   ."  '";
                $result= mysqli_query($conn, $query);        
               
                
                $p= mysqli_fetch_array($result);
                      
                echo "<tr><td>$p[1]</td>";
                echo "<td>$p[2]</td>";  
                echo "<td>$p[3]</td>"; 
                echo "<td><img src='$p[5]' width='150px'></td>";  
                echo "<td>$p[6]</td>"; 
                echo "<td>$p[7]</td>"; 
                echo "<td><a href='#?pid=$pro[0]'>Remove from cart</td>";
                echo "<td><a href='pyment.php?pid=$pro[0]'>Buy Now  </td>";

                
                
            }     
            
            
              
         
        
                            
           
        ?>