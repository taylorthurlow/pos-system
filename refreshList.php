<?php

include 'sqlcon-pos-trans.php';

session_start();
$cur = $_SESSION['cur'];


$query = "SELECT `sku` from `$cur`";

$result = mysqli_query($con, $query);

$column = array();

while($row = mysqli_fetch_array($result, MYSQL_NUM)) {
    $column[] = $row[0];
}
$size = sizeof($column);

//Send string for parsing to refreshList()
for($i = 0; $i < $size; $i++) {
    echo $column[$i] . "|";
}


mysqli_close($con);

?>
