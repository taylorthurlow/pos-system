?php

// Create connection
$con = mysqli_connect("pos.db", "frizkie", "INSERTPASSWORD", "pos");

// Check connection
if(mysqli_connect_errno($con)) {
    echo "Failed to connect to MySQL database. Please contact a network admin. " . mysqli_connect_error();
}

?>
