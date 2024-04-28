<?php
require 'dataConnectSignUp.php';
// Ensure post variable exists
if (isset($_GET['sign_up_email'])) {
    // Validate email address
    if (!filter_var($_GET['sign_up_email'], FILTER_VALIDATE_EMAIL)) {
        exit('Please provide a valid email address!');
    }
    // Check if email exists in database
    $stmt = $pdo->prepare('SELECT * FROM sign_up_information WHERE sign_up_email = ?');
    $stmt->execute([ $_GET['email'] ]);
    $subscriber = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($subscriber) {
        // Verify code
        if (sha1($subscriber['id'] . $subscriber['email'])) {
            // Delete the email from the subscribers list
            $stmt = $pdo->prepare('DELETE FROM sign_up_information WHERE sign_up_email = ?');
            $stmt->execute([ $_GET['email'] ]);
            // Output success response
            exit('You\'ve successfully unsubscribed!');
        } else {
            exit('Something went wrong');
        }
    } else {
        exit('You\'re not a subscriber or you\'ve already unsubscribed!');
    }
} else {
    exit('No email address and/or code specified!');
}
?>