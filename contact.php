<?php
if (isset($_POST['submit'])) {
    // Sanitize and validate inputs
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $ToEmail = 'wockhouse@gmail.com';
        $EmailSubject = "Contact Form Inquiry"; // Updated as 'subject' wasn't in the form
        
        $mailheader = "From: ".$email."\r\n";
        $mailheader .= "Reply-To: ".$email."\r\n";
        $mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n";

        // Create the message body
        $MESSAGE_BODY = "Name: $name<br>";
        $MESSAGE_BODY .= "Email: $email<br>";
        $MESSAGE_BODY .= "Phone: $phone<br>";
        $MESSAGE_BODY .= "Message: ".nl2br($message)."<br>";

        // Attempt to send the email
        if (mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader)) {
            echo "<script>alert('Mail was sent!');</script>";
            echo "<script>window.location.href='http://localhost/luxury/';</script>";
        } else {
            echo "<script>alert('Mail was not sent. Please try again later.');</script>";
        }
    } else {
        echo "<script>alert('Invalid email address. Please try again.');</script>";
    }
}
?>
