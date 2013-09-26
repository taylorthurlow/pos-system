<?php

include 'sqlcon-pos.php';

$skus = $_POST['skus'];
$size = $_POST['size'];

$i = 0;

foreach($skus as $key => $value) {

    $query = "SELECT * FROM `skus` WHERE sku = $value";
    $result = mysqli_query($con, $query);
    $data = mysqli_fetch_array($result);

    $printSku = $data['sku'];
    $printNameshort = $data['name-short'];
    $printNamelong = $data['name-long'];
    $printPricefull = $data['price-full'];
    $printPricesale = $data['price-sale'];
    $tax = $data['tax'];

    if($tax == 1) {
        // Assuming tax rate of 9%
        $printTax = $printPricefull * 0.09;

    } else {
        $printTax = 0;
    }


    $printSku = str_pad($printSku, 7, 0, STR_PAD_LEFT);



    if(($i % 2) == 0) {
        echo '<div class="item-even"><div class="item-text-align-left">';
        echo $printSku . '</div><div class="item-text-align-right">' . $printNamelong;
        echo '<br>$' . $printPricefull . ' ($' . $printTax . ' tax)</div></div>';
    } else {
        echo '<div class="item-odd"><div class="item-text-align-left">';
        echo $printSku . '</div><div class="item-text-align-right">' . $printNamelong;
        echo '<br>$' . $printPricefull . ' ($' . $printTax . ' tax)</div></div>';
    }

    echo '<div style="float: clear;"></div>';

    $i++;
}



mysqli_close($con);



?>
