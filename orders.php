<?php

session_start();

$con=new mysqli("us-cdbr-iron-east-02.cleardb.net", "b54168242dce39", "2ac0997a", "heroku_fb7865bc2c3f5fc");

$st=$con->prepare("select bill_no, bill_date, total from bill where mobile = ?");
$st->bind_param("s", $_GET["mobile"]);
$st->execute();
$rs=$st ->get_result();
$arr = array ();
while ($row=$rs->fetch_assoc())
{
    array_push($arr, $row);
}
echo json_encode($arr);