<?php

if($_POST["message"]) {
    mail("juraj.hlavek@gmail.com", "Here is the subject line",
    $_POST["message"]. "From: an@email.address");
}

?>