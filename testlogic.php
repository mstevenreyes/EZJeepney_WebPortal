<?php
// TEST VARIABLES DO NOT PASS ON PROD
$code = 26;
$imei = "008947909523275";
$head = floor(($code / 10));
$end = ($code % 10);

$imeiV1 = array("866262049994261", "008947909523276"); //Array of IMEI V1 Vending Machines

for($i = 0; $i < count($imeiV1); $i++){
    if($imei == $imeiV1[$i]){ // Checks if IMEI is one of the V1 Machines 
        $realcode = "0" . $head . $end; // sets 0 First for V1
        break;
    }else{
        $realcode = $head . "0" . $end; //Middle 0 for V2
    }
}

echo $realcode;