<?php

$con=new mysqli("us-cdbr-iron-east-02.cleardb.net", "b54168242dce39", "2ac0997a", "heroku_fb7865bc2c3f5fc");

$mobile=$_POST['mobile'];
$password=$_POST['password'];
$salted="AHB524bave".$password."038HDSBpmcn";
$hashed_password= hash('sha512',$salted);

$st_check=$con->prepare("select * from users where mobile ='$mobile' and password ='$hashed_password'");
//$st_check->bind_param("ss", $mobile,$password);
$st_check->execute();
$rs=$st_check->get_result();

if ($rs->num_rows!=0) 
{
   $act = bin2hex(openssl_random_pseudo_bytes(64));
	$st=$con->prepare("update users set access_token=? where mobile = ?");
	$st->bind_param("ss",$act, $mobile);
	$st->execute();
	echo $act;
}
else 
    echo "0";

