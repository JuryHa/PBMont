<?php
require "variables.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $actual_link = $_SERVER["HTTP_REFERER"];

    $name = str_replace(['\r', '\n'], [" ", " "], strip_tags(trim($_POST["name"])));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $place = str_replace(['\r', '\n'], [" ", " "], strip_tags(trim($_POST["place"])));

    if (empty($name) or !filter_var($email, FILTER_VALIDATE_EMAIL) or empty($place)) {
        http_response_code(400);
        echo "Vyplňte prosím všetky polia a skúste znovu.";
    }

    $content = "<b>Link na ponuku:</b> " . $actual_link . "<br/><br/><b>Meno:</b> " . $name . "<br/><b>Email:</b> " . $email . "<br/><b>Miesto montáže:</b> " . $place;

    $num = md5(time());

    $headers = "From: office@pb-mont.sk\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";

    $success = mail($contact_mail_to, "PB Mont - Žiadosť o cenovú ponuku", $content, $headers);
    if ($success) {
        http_response_code(200);
        echo "Ďakujeme! Vaša správa bola odoslaná.";
    } else {
        http_response_code(500);
        echo "Oops! Niečo sa pokazilo. Skúste to prosím ešte raz.";
    }
} else {
    http_response_code(403);
    echo "Pri odoslaní došlo k chybe, skúste to prosím neskôr.";
}
?>
