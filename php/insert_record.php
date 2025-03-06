<?php
    session_start();
    require_once "../config/database.php";
    require_once "validate.php";

    $lastName = $firstName = $middleName = $dob = $gender = $civil_status = $nationality = $religion = $email = $tel = $number = $rm = $house = $street = $subdivision = $barangay = $city = $province = $countries = $zip = $rm_home = $house_home = $street_home = $subdivision_home = $barangay_home = $city_home = $province_home = $countries_home = $zip_home = $father_last_name = $father_first_name = $father_middle_name = $mother_last_name = $mother_first_name = $mother_middle_name = "";
    $lastNameError = $firstNameError = $middleNameError = $dobError = $genderError = $civil_statusError = $nationalityError = $religionError = $emailError = $telError = $numberError = $rmError = $houseError = $streetError = $subdivisionError = $barangayError = $cityError = $provinceError = $countriesError = $zipError = $rm_homeError = $house_homeError = $street_homeError = $subdivision_homeError = $barangay_homeError = $city_homeError = $province_homeError = $countries_homeError = $zip_homeError = $father_last_nameError = $father_first_nameError = $father_middle_nameError = $mother_last_nameError = $mother_first_nameError = $mother_middle_nameError = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $lastName  = trim($_POST["last_name"]);
        $firstName  = trim($_POST["first_name"]);
        $middleName = trim($_POST["middle_name"]);
        $dob        = $_POST["dob"];
        $gender = $_POST["gender"];
        $civil_status = $_POST["civil_status"];
        $nationality = $_POST["nationality"];
        $religion = $_POST["religion"];
        $email = $_POST["email"];
        $tel = $_POST["tel"];
        $number = $_POST["number"];
        $rm = $_POST["rm"];
        $house = $_POST["house"];
        $street = $_POST["street"];
        $subdivision = $_POST["subdivision"];
        $barangay = $_POST["barangay"];
        $city = $_POST["city"];
        $province = $_POST["province"];
        $countries = $_POST["countries"];
        $zip = $_POST["zip"];
        $rm_home = $_POST["rm_home"];
        $house_home = $_POST["house_home"];
        $street_home = $_POST["street_home"];
        $subdivision_home = $_POST["subdivision_home"];
        $barangay_home = $_POST["barangay_home"];
        $city_home = $_POST["city_home"];
        $province_home = $_POST["province_home"];
        $countries_home = $_POST["countries_home"] ?? '';
        $zip_home = $_POST["zip_home"];
        $father_last_name = $_POST["father_last_name"];
        $father_first_name = $_POST["father_first_name"];
        $father_middle_name = $_POST["father_middle_name"];
        $mother_last_name = $_POST["mother_last_name"];
        $mother_first_name = $_POST["mother_first_name"];
        $mother_middle_name = $_POST["mother_middle_name"];
        $isValid    = true;

        $isValid = validateFormData(
            $firstName, $middleName, $lastName, $dob, $gender, $civil_status, $nationality, $religion,
            $email, $tel, $number, $rm, $house, $street, $subdivision, $barangay, $city, $province,
            $country, $zip, $rm_home, $house_home, $street_home, $subdivision_home, $barangay_home,
            $city_home, $province_home, $country_home, $zip_home, $father_first_name, $father_middle_name,
            $father_last_name, $mother_first_name, $mother_middle_name, $mother_last_name,
            $firstNameError, $middleNameError, $lastNameError, $dobError, $genderError, $civil_statusError,
            $nationalityError, $religionError, $emailError, $telError, $numberError, $rmError, $houseError,
            $streetError, $subdivisionError, $barangayError, $cityError, $provinceError, $countryError,
            $zipError, $rm_homeError, $house_homeError, $street_homeError, $subdivision_homeError,
            $barangay_homeError, $city_homeError, $province_homeError, $country_homeError, $zip_homeError,
            $father_first_nameError, $father_middle_nameError, $father_last_nameError, $mother_first_nameError,
            $mother_middle_nameError, $mother_last_nameError
        );
        // If valid, store data in session and redirect
        if ($isValid) {
            // Prepare and bind
            $stmt = $conn->prepare("INSERT INTO users 
                (first_name, middle_name, last_name, dob, gender, civil_status, nationality, religion, email, tel, phone_number, rm, house, street, subdivision, barangay, city, province, country, zip, 
                rm_home, house_home, street_home, subdivision_home, barangay_home, city_home, province_home, country_home, zip_home, 
                father_first_name, father_middle_name, father_last_name, mother_first_name, mother_middle_name, mother_last_name, created_at) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");
            
            if (!$stmt) {
                echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
                exit();
            }
        
            // Assign values from $_POST
            $firstName  = trim($_POST["first_name"] ?? '');
            $middleName = trim($_POST["middle_name"] ?? '');
            $lastName   = trim($_POST["last_name"] ?? '');
            $dob        = $_POST["dob"] ?? '';
            $gender     = $_POST["gender"] ?? '';
            $civil_status = $_POST["civil_status"] ?? '';
            $nationality = $_POST["nationality"] ?? '';
            $religion    = $_POST["religion"] ?? '';
            $email       = $_POST["email"] ?? '';
            $tel         = $_POST["tel"] ?? '';
            $number      = $_POST["number"] ?? '';
            $rm          = $_POST["rm"] ?? '';
            $house       = $_POST["house"] ?? '';
            $street      = $_POST["street"] ?? '';
            $subdivision = $_POST["subdivision"] ?? '';
            $barangay    = $_POST["barangay"] ?? '';
            $city        = $_POST["city"] ?? '';
            $province    = $_POST["province"] ?? '';
            $countries   = $_POST["countries"] ?? '';
            $zip         = $_POST["zip"] ?? '';
        
            $rm_home       = $_POST["rm_home"] ?? '';
            $house_home    = $_POST["house_home"] ?? '';
            $street_home   = $_POST["street_home"] ?? '';
            $subdivision_home = $_POST["subdivision_home"] ?? '';
            $barangay_home = $_POST["barangay_home"] ?? '';
            $city_home     = $_POST["city_home"] ?? '';
            $province_home = $_POST["province_home"] ?? '';
            $countries_home = $_POST["countries_home"] ?? '';
            $zip_home      = $_POST["zip_home"] ?? '';
        
            $father_first_name = $_POST["father_first_name"] ?? '';
            $father_middle_name = $_POST["father_middle_name"] ?? '';
            $father_last_name = $_POST["father_last_name"] ?? '';
            $mother_first_name = $_POST["mother_first_name"] ?? '';
            $mother_middle_name = $_POST["mother_middle_name"] ?? '';
            $mother_last_name = $_POST["mother_last_name"] ?? '';
        
            // Bind parameters AFTER assigning values
            $stmt->bind_param(
                "sssssssssssssssssssssssssssssssssss", 
                $firstName, $middleName, $lastName, $dob, $gender, $civil_status, $nationality, $religion, $email, $tel, $number, 
                $rm, $house, $street, $subdivision, $barangay, $city, $province, $countries, $zip, 
                $rm_home, $house_home, $street_home, $subdivision_home, $barangay_home, $city_home, $province_home, $countries_home, $zip_home, 
                $father_first_name, $father_middle_name, $father_last_name, 
                $mother_first_name, $mother_middle_name, $mother_last_name
            );
        
            if ($stmt->execute()) {
                echo "<h1>Saved successfully</h1>";
                exit();
            } else {
                $errors['database'] = "Error: " . $stmt->error;
            }
        
            $stmt->close();
        }
    }        
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Form</title>
    <link rel="stylesheet" href="../css/index.css">
    <style>
    .error {
        color: red;
        font-size: 14px;
    }
    </style>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="title" style="margin: 0 auto;">
            <h1>Insert Record</h1>
        </div>
        <?php include 'forms.php' ?>
    </form>
</body>
<script src="../js/countries.js"></script>
</html>