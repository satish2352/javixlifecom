<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form data
  $name = $_POST["name"];
  $email = $_POST["email"];
  $mobile = $_POST["mobile"];
  $message = $_POST["message"];

  // Set recipient email address
  $to = "nikitapatil7699@gmail.com";

  // Set email subject
  $subject = "New Contact Form Submission";

  // Build email body
  $body = "Name: $name\n";
  $body .= "Email: $email\n";
  $body .= "mobile: $mobile\n";
  $body .= "Message:\n$message";

  // Set headers
  $headers = "From: $email" . "\r\n" .
    "Reply-To: $email" . "\r\n" .
    "X-Mailer: PHP/" . phpversion();

  // Send email
  if (mail($to, $subject, $body, $headers)) {
    // If email is sent successfully, redirect to contact.html with success status
    header("Location: contacts.html?status=success");
    exit();
  } else {
    // If email failed to send, redirect to contact.html with error status
    header("Location: contacts.html?status=error");
    exit();
  }
}
?>