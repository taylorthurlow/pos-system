<?php

include 'sqlcon-pos-trans.php';

$result = mysqli_query($con, "SELECT table_name FROM information_schema.tables WHERE table_schema = 'pos-trans' ORDER BY create_time DESC LIMIT 1");

$data = mysqli_fetch_array($result);

session_start();
$value = intval($data['table_name']);
$value++;
$_SESSION['cur'] = $value;

echo $_SESSION['cur'];
error_log('set cur to:' . $_SESSION['cur']);
mysqli_close($con);

?>