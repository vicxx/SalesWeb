<?php
   session_start();


$con=new mysqli("us-cdbr-iron-east-02.cleardb.net", "b54168242dce39", "2ac0997a", "heroku_fb7865bc2c3f5fc");

$st_check=$con->prepare("insert into temp_order values (?,?,?)");
$st_check->bind_param("sii", $_GET["mobile"], $_GET["itemid"], $_GET["qty"] );
$st_check->execute();