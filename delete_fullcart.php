<?php

require_once './after_login_header.php';

$conn = mysqli_connect('localhost', 'root', 'root', 'DB');
if (!$conn) {
    die("ERROR IN CONNECTION...");
}

$pid = $_REQUEST['pid'];

$q = "delete from tbl_add_to_cart where P_Id='$pid'";

$r = mysqli_query($conn, $q);

if($r)
{
    echo 'DELETE PRODUCT SUCCESSFULLY';
}
else
{
    echo "error";
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

