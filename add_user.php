<?php

session_start();




$con=new mysqli("us-cdbr-iron-east-02.cleardb.net", "b54168242dce39", "2ac0997a", "heroku_fb7865bc2c3f5fc");

$mobile=$_POST['mobile'];
$email=$_POST['email'];
$password=$_POST['password'];
$name=$_POST['name'];
$address=$_POST['address'];
$ac=bin2hex(openssl_random_pseudo_bytes(64));
$salted="AHB524bave".$password."038HDSBpmcn";
$hashed_password=hash('sha512',$salted);

$st_check=$con->prepare("select * from users where mobile = ?");
$st_check->bind_param("s", $mobile);
$st_check->execute();
$rs=$st_check->get_result();

if ($rs->num_rows==0)
{

$st=$con->prepare("insert into users values(?,?,?,?,?,?)");
$st->bind_param("ssssss", $mobile,$email,$hashed_password, $name, $address, $ac);
$st->execute();
echo "1";
}


else 
    echo "0";


