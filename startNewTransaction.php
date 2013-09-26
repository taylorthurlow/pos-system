<?php

include 'sqlcon-pos.php';
session_start();
mysqli_query($con, "INSERT INTO transactions (loc) VALUES ('$_POST[loc]')");
$result2 = mysqli_query($con, "SELECT MAX(tran) AS tran FROM transactions");
$data2 = mysqli_fetch_array($result2);
$newTran = $data2['tran'];
$_SESSION['cur'] = $newTran;
mysqli_close($con);

include 'sqlcon-pos-trans.php';
mysqli_query($con, "CREATE TABLE IF NOT EXISTS `" . $newTran . "` (`sku` int(7))");
mysqli_close($con);

include 'sqlcon-pos.php';
$result3 = mysqli_query($con, "SELECT * FROM `transactions` ORDER BY `tran` DESC LIMIT 1");
$data3 = mysqli_fetch_array($result3);
$printTrans = $data3['tran'];
$datetime = $data3['datetime'];
echo $printTrans . ' (' . $datetime . ')';
mysqli_close($con);

?>
