<?php

$con=new mysqli("us-cdbr-iron-east-02.cleardb.net", "b54168242dce39", "2ac0997a", "heroku_fb7865bc2c3f5fc");

$st_check=$con->prepare("delete from temp_order where mobile = ?");
$st_check->bind_param("s", $_GET["mobile"] );
$st_check->execute();

