<?php
require_once "../config/database.php";
require_once "validate.php";

// Initialize variables
$firstName = $lastName = $middleName = $dob = $gender = $civil_status = $nationality = $religion = $email = $tel = $number = $rm = $house = $street = $subdivision = $barangay = $city = $province = $country = $zip = $rm_home = $house_home = $street_home = $subdivision_home = $barangay_home = $city_home = $province_home = $country_home = $zip_home = $father_last_name = $father_first_name = $father_middle_name = $mother_last_name = $mother_first_name = $mother_middle_name = "";
$lastNameError = $firstNameError = $middleNameError = $dobError = $genderError = $civil_statusError = $nationalityError = $religionError = $emailError = $telError = $numberError = $rmError = $houseError = $streetError = $subdivisionError = $barangayError = $cityError = $provinceError = $countryError = $zipError = $rm_homeError = $house_homeError = $street_homeError = $subdivision_homeError = $barangay_homeError = $city_homeError = $province_homeError = $country_homeError = $zip_homeError = $father_last_nameError = $father_first_nameError = $father_middle_nameError = $mother_last_nameError = $mother_first_nameError = $mother_middle_nameError = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = isset($_POST['id']) ? mysqli_real_escape_string($conn, $_POST['id']) : '';
    // Get POST data
    $firstName = mysqli_real_escape_string($conn, $_POST['first_name'] ?? '');
    $middleName = mysqli_real_escape_string($conn, $_POST['middle_name'] ?? '');
    $lastName = mysqli_real_escape_string($conn, $_POST['last_name'] ?? '');
    $dob = mysqli_real_escape_string($conn, $_POST['dob'] ?? '');
    $gender = mysqli_real_escape_string($conn, $_POST['gender'] ?? '');
    $civil_status = mysqli_real_escape_string($conn, $_POST['civil_status'] ?? '');
    $nationality = mysqli_real_escape_string($conn, $_POST['nationality'] ?? '');
    $religion = mysqli_real_escape_string($conn, $_POST['religion'] ?? '');
    $email = mysqli_real_escape_string($conn, $_POST['email'] ?? '');
    $tel = mysqli_real_escape_string($conn, $_POST['tel'] ?? '');
    $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number'] ?? '');
    $rm = mysqli_real_escape_string($conn, $_POST['rm'] ?? '');
    $house = mysqli_real_escape_string($conn, $_POST['house'] ?? '');
    $street = mysqli_real_escape_string($conn, $_POST['street'] ?? '');
    $subdivision = mysqli_real_escape_string($conn, $_POST['subdivision'] ?? '');
    $barangay = mysqli_real_escape_string($conn, $_POST['barangay'] ?? '');
    $city = mysqli_real_escape_string($conn, $_POST['city'] ?? '');
    $province = mysqli_real_escape_string($conn, $_POST['province'] ?? '');
    $country = mysqli_real_escape_string($conn, $_POST['country'] ?? '');
    $zip = mysqli_real_escape_string($conn, $_POST['zip'] ?? '');
    $rm_home = mysqli_real_escape_string($conn, $_POST['rm_home'] ?? '');
    $house_home = mysqli_real_escape_string($conn, $_POST['house_home'] ?? '');
    $street_home = mysqli_real_escape_string($conn, $_POST['street_home'] ?? '');
    $subdivision_home = mysqli_real_escape_string($conn, $_POST['subdivision_home'] ?? '');
    $barangay_home = mysqli_real_escape_string($conn, $_POST['barangay_home'] ?? '');
    $city_home = mysqli_real_escape_string($conn, $_POST['city_home'] ?? '');
    $province_home = mysqli_real_escape_string($conn, $_POST['province_home'] ?? '');
    $country_home = mysqli_real_escape_string($conn, $_POST['country_home'] ?? '');
    $zip_home = mysqli_real_escape_string($conn, $_POST['zip_home'] ?? '');
    $father_first_name = mysqli_real_escape_string($conn, $_POST['father_first_name'] ?? '');
    $father_middle_name = mysqli_real_escape_string($conn, $_POST['father_middle_name'] ?? '');
    $father_last_name = mysqli_real_escape_string($conn, $_POST['father_last_name'] ?? '');
    $mother_first_name = mysqli_real_escape_string($conn, $_POST['mother_first_name'] ?? '');
    $mother_middle_name = mysqli_real_escape_string($conn, $_POST['mother_middle_name'] ?? '');
    $mother_last_name = mysqli_real_escape_string($conn, $_POST['mother_last_name'] ?? '');

    // $isValid = validateFormData(
    //     $firstName, $middleName, $lastName, $dob, $gender, $civil_status, $nationality, $religion,
    //     $email, $tel, $number, $rm, $house, $street, $subdivision, $barangay, $city, $province,
    //     $country, $zip, $rm_home, $house_home, $street_home, $subdivision_home, $barangay_home,
    //     $city_home, $province_home, $country_home, $zip_home, $father_first_name, $father_middle_name,
    //     $father_last_name, $mother_first_name, $mother_middle_name, $mother_last_name,
    //     $firstNameError, $middleNameError, $lastNameError, $dobError, $genderError, $civil_statusError,
    //     $nationalityError, $religionError, $emailError, $telError, $numberError, $rmError, $houseError,
    //     $streetError, $subdivisionError, $barangayError, $cityError, $provinceError, $countryError,
    //     $zipError, $rm_homeError, $house_homeError, $street_homeError, $subdivision_homeError,
    //     $barangay_homeError, $city_homeError, $province_homeError, $country_homeError, $zip_homeError,
    //     $father_first_nameError, $father_middle_nameError, $father_last_nameError, $mother_first_nameError,
    //     $mother_middle_nameError, $mother_last_nameError
    // );

    // if ($isValid) {
        $sql = "UPDATE users SET 
            first_name = '$firstName', 
            middle_name = '$middleName', 
            last_name = '$lastName', 
            dob = '$dob', 
            gender = '$gender', 
            civil_status = '$civil_status', 
            nationality = '$nationality', 
            religion = '$religion', 
            email = '$email', 
            tel = '$tel', 
            phone_number = '$phone_number', 
            rm = '$rm', 
            house = '$house', 
            street = '$street', 
            subdivision = '$subdivision', 
            barangay = '$barangay', 
            city = '$city', 
            province = '$province', 
            country = '$country', 
            zip = '$zip', 
            rm_home = '$rm_home', 
            house_home = '$house_home', 
            street_home = '$street_home', 
            subdivision_home = '$subdivision_home', 
            barangay_home = '$barangay_home', 
            city_home = '$city_home', 
            province_home = '$province_home', 
            country_home = '$country_home', 
            zip_home = '$zip_home', 
            father_first_name = '$father_first_name', 
            father_middle_name = '$father_middle_name', 
            father_last_name = '$father_last_name', 
            mother_first_name = '$mother_first_name', 
            mother_middle_name = '$mother_middle_name', 
            mother_last_name = '$mother_last_name' 
            WHERE id = '$id'";
        
        if (mysqli_query($conn, $sql)) {
            echo "Query executed. Affected rows: " . mysqli_affected_rows($conn) . "<br>";
            if (mysqli_affected_rows($conn) > 0) {
                header("Location: index.php");
                exit();
            } else {
                echo "No records updated. Record may not exist or no changes made.<br>";
            }
        // } else {
        //     echo "Update Error: " . mysqli_error($conn) . "<br>";
        // }
    }
}

// Fetch existing record for display
$id = isset($_GET['id']) ? mysqli_real_escape_string($conn, $_GET['id']) : '';

$query = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
if (!$query) {
    echo "Select Query Error: " . mysqli_error($conn) . "<br>";
}
$row = mysqli_fetch_assoc($query);
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
<?php if ($row): ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="wrapper">
            <div class="container">
                <div class="title" style="margin: 0 auto;">
                    <h1>Edit Record</h1>
                </div>
                <div class="header" style="display: flex; justify-content: space-between; align-items: center;">
                    <h1>Personal Data</h1>
                    <button type="button" class="btn btn-secondary"><a href="index.php">Back</a></button>
                </div> 
                <div class="inputs">
                    <label for="last_name">Last Name</label> <br>
                    <input type="text" name="last_name" id="last_name" value="<?php echo htmlspecialchars($row['last_name']); ?>" placeholder="Enter your last name">
                    <span class="error"><?php echo $lastNameError; ?></span>
                </div>

                <div class="inputs">
                    <label for="first_name">First Name</label> <br>
                    <input type="text" name="first_name" id="first_name"
                        value="<?php echo htmlspecialchars($row['first_name']); ?>" placeholder="Enter your first name">
                    <span class="error"><?php echo $firstNameError; ?></span>
                </div>

                <div class="inputs">
                    <label for="middle_name">Middle Name</label> <br>
                    <input type="text" name="middle_name" id="middle_name"
                        value="<?php echo htmlspecialchars($row['middle_name']); ?>" placeholder="Enter your middle name">
                    <span class="error"><?php echo $middleNameError; ?></span>
                </div>

                <div class="inputs">
                    <label for="dob">Date of Birth</label> <br>
                    <input type="date" name="dob" id="dob" value="<?php echo htmlspecialchars($row['dob']); ?>"
                        placeholder="Enter your date of birth">
                    <span class="error"><?php echo $dobError; ?></span>
                </div>

                <div class="inputs">
                    <label for="gender">Sex</label> <br>
                    <div class="radio-group">
                        <input type="radio" name="gender" id="male" value="male" <?php echo ($row['gender'] == 'male') ? 'checked' : ''; ?>>
                        <label for="male">Male</label>
                        <input type="radio" name="gender" id="female" value="female" <?php echo ($row['gender'] == 'female') ? 'checked' : ''; ?>>
                        <label for="female">Female</label>
                    </div>
                    <span class="error"><?php echo $genderError; ?></span>
                </div>

                <div class="inputs">
                    <label for="civil_status">Civil Status</label> <br>
                    <select name="civil_status" id="civil_status" required>
                        <option value="single" <?php echo ($row['civil_status'] == 'single') ? 'selected' : ''; ?>>Single</option>
                        <option value="married" <?php echo ($row['civil_status'] == 'married') ? 'selected' : ''; ?>>Married</option>
                        <option value="widowed" <?php echo ($row['civil_status'] == 'widowed') ? 'selected' : ''; ?>>Widowed</option>
                        <option value="legally seperated" <?php echo ($row['civil_status'] == 'legally seperated') ? 'selected' : ''; ?>>Separated</option>
                        <option value="others" <?php echo ($row['civil_status'] == 'others') ? 'selected' : ''; ?>>Other</option>
                    </select>
                    <span class="error"><?php echo $civil_statusError; ?></span>
                </div>
                <div class="inputs" id="other-status-container" style="display: none;">
                    <label for="other_status">Other Status</label> <br>
                    <input type="text" name="other_status" id="other_status" placeholder="Enter your custom status">
                    <span class="error" id="otherStatusError"></span>
                </div>

                <div class="inputs">
                    <label for="nationality">Nationality</label> <br>
                    <input type="text" name="nationality" id="nationality"
                        value="<?php echo htmlspecialchars($row['nationality']); ?>" placeholder="Enter your nationality"
                        required>
                    <span class="error"><?php echo $nationalityError; ?></span>
                </div>

                <div class="inputs">
                    <label for="religion">Religion</label> <br>
                    <input type="text" name="religion" id="religion" value="<?php echo htmlspecialchars($row['religion']); ?>"
                        placeholder="Enter your religion">
                    <span class="error"><?php echo $religionError; ?></span>
                </div>

                <div class="inputs">
                    <label for="email">Email Address</label> <br>
                    <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($row['email']); ?>"
                        placeholder="Enter your email address" required>
                    <span class="error"><?php echo $emailError; ?></span>
                </div>

                <div class="inputs">
                    <label for="tel">Telephone Number</label> <br>
                    <input type="tel" name="tel" id="tel" value="<?php echo htmlspecialchars($row['tel']); ?>"
                        placeholder="Enter your telephone number">
                    <span class="error"><?php echo $telError; ?></span>
                </div>

                <div class="inputs">
                    <label for="phone_number">Phone Number</label> <br>
                    <input type="number" name="phone_number" id="phone_number" value="<?php echo htmlspecialchars($row['phone_number']); ?>"
                        placeholder="Enter your phone number" required>
                    <span class="error"><?php echo $numberError; ?></span>
                </div>
            </div>

            <!-- place of birth -->
            <div class="container">
                <h1>Place of Birth</h1>
                <div class="inputs">
                    <label for="rm">RM/FLR/Unit No. & Bldg. Name</label> <br>
                    <input type="text" name="rm" id="rm" value="<?php echo htmlspecialchars($row['rm']); ?>"
                        placeholder="Enter your RM/FLR/Unit No. & Bldg. Name" required>
                    <span class="error"><?php echo $rmError; ?></span>
                </div>

                <div class="inputs">
                    <label for="house">House/Lot & Blk. No</label> <br>
                    <input type="text" name="house" id="house" value="<?php echo htmlspecialchars($row['house']); ?>"
                        placeholder="Enter your House/Lot & Blk. No" required>
                    <span class="error"><?php echo $houseError; ?></span>
                </div>

                <div class="inputs">
                    <label for="street">Street Name</label> <br>
                    <input type="text" name="street" id="street" value="<?php echo htmlspecialchars($row['street']); ?>"
                        placeholder="Enter your street name" required>
                    <span class="error"><?php echo $streetError; ?></span>
                </div>

                <div class="inputs">
                    <label for="subdivision">Subdivision</label> <br>
                    <input type="text" name="subdivision" id="subdivision" value="<?php echo htmlspecialchars($row['subdivision']); ?>" placeholder="Enter your subdivision">
                    <span class="error"><?php echo $subdivisionError; ?></span>
                </div>

                <div class="inputs">
                    <label for="barangay">Barangay/District/Locality</label> <br>
                    <input type="text" name="barangay" id="barangay" value="<?php echo htmlspecialchars($row['barangay']); ?>" placeholder="Enter your barangay/district/locality">
                    <span class="error"><?php echo $barangayError; ?></span>
                </div>

                <div class="inputs">
                    <label for="city">City/Municipality</label> <br>
                    <input type="text" name="city" id="city" value="<?php echo htmlspecialchars($row['city']); ?>" placeholder="Enter your city/municipality">
                    <span class="error"><?php echo $cityError; ?></span>
                </div>

                <div class="inputs">
                    <label for="province">Province</label> <br>
                    <input type="text" name="province" id="province" value="<?php echo htmlspecialchars($row['province']); ?>" placeholder="Enter your province">
                    <span class="error"><?php echo $provinceError; ?></span>
                </div>

                <div class="inputs">
                    <label for="country">Country</label> <br>
                    <input type="text" name="country" id="country" value="<?php echo htmlspecialchars($row['country']); ?>" placeholder="Enter your country">
                    <span class="error"><?php echo $countryError; ?></span>
                </div>

                <div class="inputs">
                    <label for="zip">Zip Code</label> <br>
                    <input type="text" name="zip" id="zip" value="<?php echo htmlspecialchars($row['zip']); ?>" placeholder="Enter your zip code">
                    <span class="error"><?php echo $zipError; ?></span>
                </div>
            </div>
            <!-- home address -->
            <div class="container">
                <h1>Home Address</h1>
                <div class="inputs">
                    <label for="rm_home">RM/FLR/Unit No. & Bldg. Name</label> <br>
                    <input type="text" name="rm_home" id="rm_home" value="<?php echo htmlspecialchars($row['rm_home']); ?>" placeholder="Enter your RM/FLR/Unit No. & Bldg. Name" required>
                    <span class="error"><?php echo $rm_homeError; ?></span>
                </div>

                <div class="inputs">
                    <label for="house_home">House/Lot & Blk. No</label> <br>
                    <input type="text" name="house_home" id="house_home" value="<?php echo htmlspecialchars($row['house_home']); ?>" placeholder="Enter your House/Lot & Blk. No" required>
                    <span class="error"><?php echo $house_homeError; ?></span>
                </div>

                <div class="inputs">
                    <label for="street_home">Street Name</label> <br>
                    <input type="text" name="street_home" id="street_home" value="<?php echo htmlspecialchars($row['street_home']); ?>" placeholder="Enter your street name" required>
                    <span class="error"><?php echo $street_homeError; ?></span>
                </div>

                <div class="inputs">
                    <label for="subdivision_home">Subdivision</label> <br>
                    <input type="text" name="subdivision_home" id="subdivision_home" value="<?php echo htmlspecialchars($row['subdivision_home']); ?>" placeholder="Enter your subdivision" required>
                    <span class="error"><?php echo $subdivision_homeError; ?></span>
                </div>

                <div class="inputs">
                    <label for="barangay_home">Barangay/District/Locality</label> <br>
                    <input type="text" name="barangay_home" id="barangay_home" value="<?php echo htmlspecialchars($row['barangay_home']); ?>" placeholder="Enter your barangay/district/locality" required>
                    <span class="error"><?php echo $barangay_homeError; ?></span>
                </div>

                <div class="inputs">
                    <label for="city_home">City/Municipality</label> <br>
                    <input type="text" name="city_home" id="city_home" value="<?php echo htmlspecialchars($row['city_home']); ?>" placeholder="Enter your city/municipality" required>
                    <span class="error"><?php echo $city_homeError; ?></span>
                </div>

                <div class="inputs">
                    <label for="province_home">Province</label> <br>
                    <input type="text" name="province_home" id="province_home" value="<?php echo htmlspecialchars($row['province_home']); ?>" placeholder="Enter your province" required>
                    <span class="error"><?php echo $province_homeError; ?></span>
                </div>

                <div class="inputs">
                    <label for="country_home">Country</label> <br>
                    <input type="text" name="country_home" id="country_home" value="<?php echo htmlspecialchars($row['country_home']); ?>" placeholder="Enter your country">
                    <span class="error"><?php echo $country_homeError; ?></span>
                </div>

                <div class="inputs">
                    <label for="zip_home">Zip Code</label> <br>
                    <input type="text" name="zip_home" id="zip_home" value="<?php echo htmlspecialchars($row['zip_home']); ?>" placeholder="Enter your zip code" required>
                    <span class="error"><?php echo $zip_homeError; ?></span>
                </div>
            </div>
            <!-- father and mother name -->
            <div class="container">
                <h1>Father's Name</h1>
                <div class="inputs">
                    <label for="father_last_name">Last Name</label> <br>
                    <input type="text" name="father_last_name" id="father_last_name" value="<?php echo htmlspecialchars($row['father_last_name']); ?>" placeholder="Enter your father's last name" required>
                    <span class="error"><?php echo $father_last_nameError; ?></span>
                </div>
                <div class="inputs">
                    <label for="father_first_name">First Name</label> <br>
                    <input type="text" name="father_first_name" id="father_first_name" value="<?php echo htmlspecialchars($row['father_first_name']); ?>" placeholder="Enter your father's first name" required>
                    <span class="error"><?php echo $father_first_nameError; ?></span>
                </div>

                <div class="inputs">
                    <label for="father_middle_name">Middle Name</label> <br>
                    <input type="text" name="father_middle_name" id="father_middle_name" value="<?php echo htmlspecialchars($row['father_middle_name']); ?>" placeholder="Enter your father's middle name">
                    <span class="error"><?php echo $father_middle_nameError; ?></span>
                </div>
            </div>
            <!-- mother and mother name -->
            <div class="container">
                <h1>Mother's Name</h1>
                <div class="inputs">
                    <label for="mother_last_name">Last Name</label> <br>
                    <input type="text" name="mother_last_name" id="mother_last_name" value="<?php echo htmlspecialchars($row['mother_last_name']); ?>" placeholder="Enter your mother's last name" required>
                    <span class="error"><?php echo $mother_last_nameError; ?></span>
                </div>
                <div class="inputs">
                    <label for="mother_first_name">First Name</label> <br>
                    <input type="text" name="mother_first_name" id="mother_first_name" value="<?php echo htmlspecialchars($row['mother_first_name']); ?>" placeholder="Enter your mother's first name" required>
                    <span class="error"><?php echo $mother_first_nameError; ?></span>
                </div>

                <div class="inputs">
                    <label for="mother_middle_name">Middle Name</label> <br>
                    <input type="text" name="mother_middle_name" id="mother_middle_name" value="<?php echo htmlspecialchars($row['mother_middle_name']); ?>" placeholder="Enter your mother's middle name">
                    <span class="error"><?php echo $mother_middle_nameError; ?></span>
                </div>
                <div class="footer" style="display: flex; justify-content: flex-end; margin-top: 20px;">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
    <?php endif; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Show/hide the "Other Status" field based on selection
    var civilStatusSelect = document.getElementById('civil_status');
    var otherStatusContainer = document.getElementById('other-status-container');
    
    civilStatusSelect.addEventListener('change', function() {
        if (this.value === 'others') {
            otherStatusContainer.style.display = 'block';
        } else {
            otherStatusContainer.style.display = 'none';
        }
    });
    
    // Trigger the change event to initialize properly
    if (civilStatusSelect.value === 'others') {
        otherStatusContainer.style.display = 'block';
    }
});
</script>
<script src="../fill.js"></script>
<script src="../js/countries.js"></script>
<script>if (window.history.replaceState) {window.history.replaceState(null, null, window.location.href);}</script>
</body>
</html>