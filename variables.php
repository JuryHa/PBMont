<?php
error_reporting(E_ALL);
ini_set("display_errors", "On");

$contact_mail_to = "krizomartin@gmail.com";
$calculation_mail_to = "krizomartin@gmail.com";

function validateGatesParams($array)
{
    if (count($array) % 4 != 0) {
        return false;
    }

    $i = 0;
    $key_index = 1;

    foreach ($array as $key => $value) {
        $keys = explode("_", $key);

        if ($i < 4) {
            $order = $i;
        } else {
            $order = $i % 4;
        }

        if (($order == 0 && $keys[1] != "count") || ($order == 1 && $keys[1] != "height") || ($order == 2 && $keys[1] != "width") || ($order == 3 && $keys[1] != "type")) {
            return false;
        }

        if ($key_index != $keys[2] && $order != 0) {
            return false;
        }

        $key_index = $keys[2];
        $i++;
    }

    return true;
}
