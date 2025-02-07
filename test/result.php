<?php
session_start();
if (!isset($_SESSION["firstName"]) || !isset($_SESSION["dob"])) {
    header("Location: index.php");
    exit();
}

// Calculate age
$dobTimestamp = strtotime($_SESSION["dob"]);
$age = (date("Y") - date("Y", $dobTimestamp));

// Format name
$name = htmlspecialchars($_SESSION["lastname"]) . ", " . htmlspecialchars($_SESSION["firstName"]) . " " . htmlspecialchars($_SESSION["middleName"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
</head>
<body>
    <h1>Submitted Data</h1>

    <h2>Personal Data</h2>
    <p><strong>Name:</strong> <?php echo $name; ?></p>
    <p><strong>Date of Birth:</strong> <?php echo htmlspecialchars($_SESSION["dob"]); ?></p>
    <p><strong>Age:</strong> <?php echo htmlspecialchars($age); ?></p>
    <p><strong>Gender:</strong> <?php echo htmlspecialchars($_SESSION["gender"]); ?></p>
    <p><strong>Civil Status:</strong> <?php echo htmlspecialchars($_SESSION["civil_status"]); ?></p>
    <p><strong>Nationality:</strong> <?php echo htmlspecialchars($_SESSION["nationality"]); ?></p>
    <p><strong>Religion:</strong> <?php echo htmlspecialchars($_SESSION["religion"]); ?></p>
    <h2>Place of Birth</h2>
    <p><strong>RM/FLR/Unit No. & Bldg. Name:</strong> <?php echo htmlspecialchars($_SESSION["rm"]); ?></p>
    <p><strong>House/Lot & Blk. No:</strong> <?php echo htmlspecialchars($_SESSION["house"]); ?></p>
    <p><strong>Street Name:</strong> <?php echo htmlspecialchars($_SESSION["street"]); ?></p>
    <p><strong>Subdivision:</strong> <?php echo htmlspecialchars($_SESSION["subdivision"]); ?></p>
    <p><strong>Barangay/District/Locality:</strong> <?php echo htmlspecialchars($_SESSION["barangay"]); ?></p>
    <p><strong>City/Municipality:</strong> <?php echo htmlspecialchars($_SESSION["city"]); ?></p>
    <p><strong>Province:</strong> <?php echo htmlspecialchars($_SESSION["province"]); ?></p>
    <p><strong>Country:</strong> <?php echo htmlspecialchars($_SESSION["countries"]); ?></p>
    <p><strong>Zip Code:</strong> <?php echo htmlspecialchars($_SESSION["zip"]); ?></p>
    <h2>Home Address</h2>
    <p><strong>RM/FLR/Unit No. & Bldg. Name (Home):</strong> <?php echo htmlspecialchars($_SESSION["rm_home"]); ?></p>
    <p><strong>House/Lot & Blk. No (Home):</strong> <?php echo htmlspecialchars($_SESSION["house_home"]); ?></p>
    <p><strong>Street Name (Home):</strong> <?php echo htmlspecialchars($_SESSION["street_home"]); ?></p>
    <p><strong>Subdivision (Home):</strong> <?php echo htmlspecialchars($_SESSION["subdivision_home"]); ?></p>
    <p><strong>Barangay/District/Locality (Home):</strong> <?php echo htmlspecialchars($_SESSION["barangay_home"]); ?></p>
    <p><strong>City/Municipality (Home):</strong> <?php echo htmlspecialchars($_SESSION["city_home"]); ?></p>
    <p><strong>Province (Home):</strong> <?php echo htmlspecialchars($_SESSION["province_home"]); ?></p>
    <p><strong>Country (Home):</strong> <?php echo htmlspecialchars($_SESSION["countries_home"]); ?></p>
    <p><strong>Zip Code (Home):</strong> <?php echo htmlspecialchars($_SESSION["zip_home"]); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION["email"]); ?></p>
    <p><strong>Telephone Number:</strong> <?php echo htmlspecialchars($_SESSION["tel"]); ?></p>
    <p><strong>Phone Number:</strong> <?php echo htmlspecialchars($_SESSION["number"]); ?></p>
    <h2>Father Name</h2>
    <p><strong>Father's Last Name:</strong> <?php echo htmlspecialchars($_SESSION["father_last_name"]); ?></p>
    <p><strong>Father's First Name:</strong> <?php echo htmlspecialchars($_SESSION["father_first_name"]); ?></p>
    <p><strong>Father's Middle Name:</strong> <?php echo htmlspecialchars($_SESSION["father_middle_name"]); ?></p>
    <h2>Mother Name</h2>
    <p><strong>Mother's Last Name:</strong> <?php echo htmlspecialchars($_SESSION["mother_last_name"]); ?></p>
    <p><strong>Mother's First Name:</strong> <?php echo htmlspecialchars($_SESSION["mother_first_name"]); ?></p>
    <p><strong>Mother's Middle Name:</strong> <?php echo htmlspecialchars($_SESSION["mother_middle_name"]); ?></p>
</body>
</html>