<?php
if (isset($_POST["submit"])) {
    // Sanitize inputs
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Email setup
    $to = 'sci.adityarjpt@gmail.com';
    $from = "From: $name <$email>\r\n";
    $body = "You have received a new message from your website contact form:\n\n".
            "Name: $name\n".
            "Email: $email\n".
            "Subject: $subject\n".
            "Message:\n$message";

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    // Send email
    if (mail($to, $subject, $body, $from)) {
        header("Location: thank-you.html");
        exit();
    } else {
        die("Mail sending failed.");
    }
}
?>
