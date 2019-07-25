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
    // $to = "simeon.j.lam@gmail.com";
    // $headers = "MIME-Version: 1.0" . "\r\n";
    // $headers .= "Content-type:text/html;charset=UTF-8\r\n";
    // $headers .= "From: $from_name <$from_email>";

    // if (mail($to, $subject, $message, $headers)){
    //     phpAlert("Email Sent Successfully.");
    //     echo '<script type="text/javascript">' . "\n";
    //     echo 'window.location="index.html";';
    //     echo '</script>';
    // }
    // else {
    //     phpAlert("Email Failed: Try Again.");
    //     echo '<script type="text/javascript">' . "\n";
    //     echo 'window.location="contact.html";';
    //     echo '</script>';
    // }
    date_default_timezone_set('Etc/UTC');

    // Edit this path if PHPMailer is in a different location.
    require './PHPMailer/PHPMailerAutoload.php';
    
    $mail = new PHPMailer;
    $mail->isSMTP();

    $mail->Host = 'smtp.gmail.com'; // Which SMTP server to use.
    $mail->Port = 587; // Which port to use, 587 is the default port for TLS security.
    $mail->SMTPSecure = 'tls'; // Which security method to use. TLS is most secure.
    $mail->SMTPAuth = true; // Whether you need to login. This is almost always required.
 

    /*
    * Message Configuration
    */

    $mail->setFrom($from_email, $from_name); // Set the sender of the message.
    $mail->addAddress('simeon.j.lam@gmail.com', 'Simeon Lam'); // Set the recipient of the message.
    $mail->Subject = $subject; // The subject of the message.

    /*
    * Message Content - Choose simple text or HTML email
    */
    
    // Choose to send either a simple text email...
    $mail->Body = $message; // Set a plain text body.

    // ... or send an email with HTML.
    //$mail->msgHTML(file_get_contents('contents.html'));
    // Optional when using HTML: Set an alternative plain text message for email clients who prefer that.
    //$mail->AltBody = 'This is a plain-text message body'; 

    if ($mail->send()) {
        phpAlert("Your message was sent successfully!");
        echo '<script type="text/javascript">' . "\n";
        echo 'window.location="index.html";';
        echo '</script>';
    } else {
        phpAlert("Mailer Error.");
        echo '<script type="text/javascript">' . "\n";
        echo 'window.location="contact.html";';
        echo '</script>';
    }
?>
