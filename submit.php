<?php
    function phpAlert($msg) {
        echo '<script type="text/javascript">alert("' . $msg . '")</script>';
    }

    if(!isset($_POST['submit'])){
        phpAlert("Must Submit Form.");
        echo '<script type="text/javascript">' . "\n";
        echo 'window.location="contact.html";';
        echo '</script>';
    }

    $from_name = $_POST['full_name'];
    $from_email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $to = "simeon.j.lam@gmail.com";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8\r\n";
    $headers .= "From: $from_name <$from_email>";

    if (mail($to, $subject, $message, $headers)){
        phpAlert("Email Sent Successfully.");
        echo '<script type="text/javascript">' . "\n";
        echo 'window.location="index.html";';
        echo '</script>';
    }
    else {
        phpAlert("Email Failed: Try Again.");
        echo '<script type="text/javascript">' . "\n";
        echo 'window.location="contact.html";';
        echo '</script>';
    }
?>