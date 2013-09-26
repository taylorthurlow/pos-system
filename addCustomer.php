<?php

include 'sqlcon-pos.php';

mysqli_query($con, "INSERT INTO customers VALUES ('$_POST[firstName]', '$_POST[lastName]', '$_POST[address]', '$_POST[city]', '$_POST[state]', '$_POST[zip]'), '$_POST[phone1]'), '$_POST[phone2]')");

mysqli_close($con);

?>
