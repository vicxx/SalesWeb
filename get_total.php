<?php

$con=new mysqli("us-cdbr-iron-east-02.cleardb.net", "b54168242dce39", "2ac0997a", "heroku_fb7865bc2c3f5fc");

$st=$con->prepare("SELECT price,qty FROM items INNER JOIN bill_det on items.id=bill_det.itemid WHERE bill_det.bill_no=?");
$st->bind_param("i", $_GET["bill_no"]);
$st->execute();
$rs=$st->get_result();
$total=0;
while ($row=$rs->fetch_assoc())
{
    $total = $total + ($row["price"]*$row["qty"]);
}

$st2=$con->prepare("update bill set total =? where bill_no=?");
$st2->bind_param("di", $total, $_GET["bill_no"]);
$st2->execute();

echo $total;