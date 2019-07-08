<?php

session_start();

$con=new mysqli("us-cdbr-iron-east-02.cleardb.net", "b54168242dce39", "2ac0997a", "heroku_fb7865bc2c3f5fc");
$st=$con->prepare("select name from users where email= ?");
$st->bind_param("s", $_GET["email"]);
$st->execute();
$rs=$st->get_result();
$row=$rs->fetch_assoc();

echo json_encode($row);