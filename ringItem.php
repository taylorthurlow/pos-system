<?php

include 'sqlcon-pos-trans.php';

$inSku = $_POST['inSku'];

session_start();
$cur = $_SESSION['cur'];

mysqli_query($con, "INSERT INTO `$cur` (`sku`) VALUES ($inSku)");

mysqli_close($con);

?>

