<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $occupation = $_POST['occupation'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    // Data to save
    $data = "Name: $name\nOccupation: $occupation\nDelivery Address: $address\nPhone Number: $phone\n";

    // File path
    $filename = 'user_data.txt';

    // Save data to the file
    if (file_put_contents($filename, $data) !== false) {
        echo "Changes saved successfully!";
    } else {
        echo "Error: Unable to save changes.";
    }
}
?>