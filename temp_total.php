<?php

session_start();

$con=new mysqli("localhost", "root", "", "salesweb");

$st=$con->prepare("SELECT bill_det.bill_no, bill_det.qty, items.name, items.price from bill_det inner join items on bill_det.itemid = items.itemid where bill_no=?");
$st->bind_param("i", $_GET["bill_no"]);
$st->execute();
$rs=$st->get_result();
$total=0;
while ($row=$rs->fetch_assoc())
{
    $total = $total + ($row["price"]*$row["qty"]);
}
$arr = array ();
array_push($arr,$total);
echo json_encode($arr);