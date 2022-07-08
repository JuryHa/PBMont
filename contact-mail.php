<?php
require "variables.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = str_replace(['\r', '\n'], [" ", " "], strip_tags(trim($_POST["name"])));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    if (empty($name) or !filter_var($email, FILTER_VALIDATE_EMAIL) or empty($message)) {
        http_response_code(400);
        echo "Vyplňte prosím všetky polia a skúste znovu.";
    }

    $content = "<b>Meno:</b> " . $name . "<br/><b>Email:</b> " . $email . "<br/><br/><b>Správa:</b><br/> " . $message;

    $num = md5(time());

    $headers = "From: office@pb-mont.sk\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";

    $success = mail($contact_mail_to, "PB Mont - Kontaktný formulár", $content, $headers);
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
