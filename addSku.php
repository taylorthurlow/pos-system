<?php

include 'sqlcon-pos.php';

mysqli_query($con, "INSERT INTO skus VALUES ('$_POST[sku]', '$_POST[nameshort]', '$_POST[namelong]', '$_POST[pricefull]', '$_POST[pricesale]', '$_POST[tax]')");

mysqli_close($con);

?>