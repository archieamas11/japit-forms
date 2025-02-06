<?php
session_start();
if (!isset($_SESSION["form_data"])) {
    header("Location: index.html"); // Redirect if accessed directly
    exit();
}

$data = $_SESSION["form_data"];
$age = $_SESSION["age"];

// Format Name
$fullName = "{$data['last_name']}, {$data['first_name']} " . (isset($data['middle_name']) ? strtoupper(substr($data['middle_name'], 0, 1)) . "." : "");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submission Successful</title>
</head>
<body>
    <h1>Submitted Data</h1>
    <p><strong>Name:</strong> <?php echo $fullName; ?></p>
    <p><strong>Age:</strong> <?php echo $age; ?></p>
    <p><strong>Email:</strong> <?php echo $data["email"]; ?></p>
    <p><strong>Phone Number:</strong> <?php echo $data["number"]; ?></p>
    <p><strong>Nationality:</strong> <?php echo $data["nationality"]; ?></p>

    <h2>Address</h2>
    <p><strong>Home Address:</strong> <?php echo "{$data['street_home']}, {$data['city_home']}, {$data['province_home']}"; ?></p>

    <a href="index.html">Go Back</a>
</body>
</html>
