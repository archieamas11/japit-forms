<?php
include '../config/database.php';
require_once "validate.php";

// Initialize variables
$lastName = $firstName = $middleName = $dob = $gender = $civil_status = $nationality = $religion = $email = $tel = $number = $rm = $house = $street = $subdivision = $barangay = $city = $province = $countries = $zip = $rm_home = $house_home = $street_home = $subdivision_home = $barangay_home = $city_home = $province_home = $countries_home = $zip_home = $father_last_name = $father_first_name = $father_middle_name = $mother_last_name = $mother_first_name = $mother_middle_name = "";
$lastNameError = $firstNameError = $middleNameError = $dobError = $genderError = $civil_statusError = $nationalityError = $religionError = $emailError = $telError = $numberError = $rmError = $houseError = $streetError = $subdivisionError = $barangayError = $cityError = $provinceError = $countriesError = $zipError = $rm_homeError = $house_homeError = $street_homeError = $subdivision_homeError = $barangay_homeError = $city_homeError = $province_homeError = $countries_homeError = $zip_homeError = $father_last_nameError = $father_first_nameError = $father_middle_nameError = $mother_last_nameError = $mother_first_nameError = $mother_middle_nameError = "";

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize POST data
    $id = trim($_POST['id'] ?? '');
    $firstName = trim($_POST['first_name'] ?? '');
    $middleName = trim($_POST['middle_name'] ?? '');
    $lastName = trim($_POST['last_name'] ?? '');
    $dob = $_POST['dob'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $civil_status = $_POST['civil_status'] ?? '';
    $nationality = $_POST['nationality'] ?? '';
    $religion = $_POST['religion'] ?? '';
    $email = $_POST['email'] ?? '';
    $tel = $_POST['tel'] ?? '';
    $number = $_POST['number'] ?? '';
    $rm = $_POST['rm'] ?? '';
    $house = $_POST['house'] ?? '';
    $street = $_POST['street'] ?? '';
    $subdivision = $_POST['subdivision'] ?? '';
    $barangay = $_POST['barangay'] ?? '';
    $city = $_POST['city'] ?? '';
    $province = $_POST['province'] ?? '';
    $countries = $_POST['countries'] ?? '';
    $zip = $_POST['zip'] ?? '';
    $rm_home = $_POST['rm_home'] ?? '';
    $house_home = $_POST['house_home'] ?? '';
    $street_home = $_POST['street_home'] ?? '';
    $subdivision_home = $_POST['subdivision_home'] ?? '';
    $barangay_home = $_POST['barangay_home'] ?? '';
    $city_home = $_POST['city_home'] ?? '';
    $province_home = $_POST['province_home'] ?? '';
    $countries_home = $_POST['countries_home'] ?? '';
    $zip_home = $_POST['zip_home'] ?? '';
    $father_first_name = $_POST['father_first_name'] ?? '';
    $father_middle_name = $_POST['father_middle_name'] ?? '';
    $father_last_name = $_POST['father_last_name'] ?? '';
    $mother_first_name = $_POST['mother_first_name'] ?? '';
    $mother_middle_name = $_POST['mother_middle_name'] ?? '';
    $mother_last_name = $_POST['mother_last_name'] ?? '';

    // Validation
    $isValid = true;
    $errors = [];

    $isValid = validateFormData(
        $firstName, $middleName, $lastName, $dob, $gender, $civil_status, $nationality, $religion,
        $email, $tel, $number, $rm, $house, $street, $subdivision, $barangay, $city, $province,
        $countries, $zip, $rm_home, $house_home, $street_home, $subdivision_home, $barangay_home,
        $city_home, $province_home, $countries_home, $zip_home, $father_first_name, $father_middle_name,
        $father_last_name, $mother_first_name, $mother_middle_name, $mother_last_name,
        $firstNameError, $middleNameError, $lastNameError, $dobError, $genderError, $civil_statusError,
        $nationalityError, $religionError, $emailError, $telError, $numberError, $rmError, $houseError,
        $streetError, $subdivisionError, $barangayError, $cityError, $provinceError, $countriesError,
        $zipError, $rm_homeError, $house_homeError, $street_homeError, $subdivision_homeError,
        $barangay_homeError, $city_homeError, $province_homeError, $countries_homeError, $zip_homeError,
        $father_first_nameError, $father_middle_nameError, $father_last_nameError, $mother_first_nameError,
        $mother_middle_nameError, $mother_last_nameError
    );

    if (empty($id)) {
        $errors['id'] = "No user ID provided for update.";
        $isValid = false;
    }

    // If validation passes, update the database
    if ($isValid) {
        $stmt = $conn->prepare("
            UPDATE users SET 
                first_name = ?, middle_name = ?, last_name = ?, dob = ?, gender = ?, civil_status = ?, 
                nationality = ?, religion = ?, email = ?, tel = ?, phone_number = ?, rm = ?, house = ?, 
                street = ?, subdivision = ?, barangay = ?, city = ?, province = ?, country = ?, zip = ?, 
                rm_home = ?, house_home = ?, street_home = ?, subdivision_home = ?, barangay_home = ?, 
                city_home = ?, province_home = ?, country_home = ?, zip_home = ?, 
                father_first_name = ?, father_middle_name = ?, father_last_name = ?, 
                mother_first_name = ?, mother_middle_name = ?, mother_last_name = ?
            WHERE id = ?
        ");

        if (!$stmt) {
            $errors['database'] = "Prepare failed: (" . $conn->errno . ") " . $conn->error;
        } else {
            $stmt->bind_param(
                "sssssssssssssssssssssssssssssssssssi",
                $firstName, $middleName, $lastName, $dob, $gender, $civil_status, $nationality, $religion,
                $email, $tel, $number, $rm, $house, $street, $subdivision, $barangay, $city, $province,
                $countries, $zip, $rm_home, $house_home, $street_home, $subdivision_home, $barangay_home,
                $city_home, $province_home, $countries_home, $zip_home, $father_first_name, $father_middle_name,
                $father_last_name, $mother_first_name, $mother_middle_name, $mother_last_name, $id
            );

            if ($stmt->execute()) {
                if ($stmt->affected_rows > 0) {
                    echo "<h1>Updated successfully</h1>";
                } else {
                    $errors['database'] = "No rows updated. Either the ID doesn’t exist or no changes were made.";
                }
            } else {
                $errors['database'] = "Update failed: " . $stmt->error;
            }
            $stmt->close();
        }
    }

    // Display errors if any
    if (!empty($errors)) {
        foreach ($errors as $key => $error) {
            echo "<p class='error'>$key: $error</p>";
        }
    }
}

// Fetch existing data for the form
$id = $_GET['id'] ?? '';
if ($id) {
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();

        if ($row) {
            $firstName = $row['first_name'] ?? '';
            $middleName = $row['middle_name'] ?? '';
            $lastName = $row['last_name'] ?? '';
            $dob = $row['dob'] ?? '';
            $gender = $row['gender'] ?? '';
            $civil_status = $row['civil_status'] ?? '';
            $nationality = $row['nationality'] ?? '';
            $religion = $row['religion'] ?? '';
            $email = $row['email'] ?? '';
            $tel = $row['tel'] ?? '';
            $number = $row['phone_number'] ?? '';
            $rm = $row['rm'] ?? '';
            $house = $row['house'] ?? '';
            $street = $row['street'] ?? '';
            $subdivision = $row['subdivision'] ?? '';
            $barangay = $row['barangay'] ?? '';
            $city = $row['city'] ?? '';
            $province = $row['province'] ?? '';
            $countries = $row['country'] ?? '';
            $zip = $row['zip'] ?? '';
            $rm_home = $row['rm_home'] ?? '';
            $house_home = $row['house_home'] ?? '';
            $street_home = $row['street_home'] ?? '';
            $subdivision_home = $row['subdivision_home'] ?? '';
            $barangay_home = $row['barangay_home'] ?? '';
            $city_home = $row['city_home'] ?? '';
            $province_home = $row['province_home'] ?? '';
            $countries_home = $row['country_home'] ?? '';
            $zip_home = $row['zip_home'] ?? '';
            $father_first_name = $row['father_first_name'] ?? '';
            $father_middle_name = $row['father_middle_name'] ?? '';
            $father_last_name = $row['father_last_name'] ?? '';
            $mother_first_name = $row['mother_first_name'] ?? '';
            $mother_middle_name = $row['mother_middle_name'] ?? '';
            $mother_last_name = $row['mother_last_name'] ?? '';
        } else {
            echo "<p>No record found for ID: $id</p>";
        }
    } else {
        echo "<p>Prepare failed: " . $conn->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link rel="stylesheet" href="../css/index.css">
    <style>
        .error { color: red; font-size: 14px; }
    </style>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="title" style="margin: 0 auto;">
            <h1>Update Record</h1>
        </div>
        <?php include 'forms.php'; ?>
    </form>
</body>
<script src="../js/countries.js"></script>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
</html>