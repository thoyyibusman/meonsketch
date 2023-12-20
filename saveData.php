<!-- saveData.php -->

<?php
// Get form data
$firstName = $_POST['firstName'] ?? '';
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';

// Read existing data from the file, if it exists
$existingData = file_exists('new.json') ? file_get_contents('new.json') : '[]';

// Decode existing data as an array
$existingArray = json_decode($existingData, true);

// Create a new entry with the form data
$newEntry = array(
    'firstName' => $firstName,
    'email' => $email,
    'message' => $message
);

// Add the new entry to the existing data
$existingArray[] = $newEntry;

// Save the updated data back to the file
file_put_contents('new.json', json_encode($existingArray, JSON_PRETTY_PRINT));

// Send a JSON response back to the client
header('location:index.html');
?>
