<?php

$con=new mysqli("us-cdbr-iron-east-02.cleardb.net", "b54168242dce39", "2ac0997a", "heroku_fb7865bc2c3f5fc");

$st_check=$con->prepare("select * from users where mobile = ? and password = ?");
$st_check->bind_param("ss", $_GET["mobile"], $_GET["password"]);
$st_check->execute();
$rs=$st_check->get_result();

if ($rs->num_rows==0)
    echo "0";
else 
    echo "1";
    

