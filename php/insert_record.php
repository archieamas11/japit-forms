<?php
    session_start();
    require_once "../config/database.php";

    $firstName = $lastname = $middleName = $dob = $gender = $civil_status = $nationality = $religion = $email = $tel = $number = $rm = $house = $street = $subdivision = $barangay = $city = $province = $countries = $zip = $rm_home = $house_home = $street_home = $subdivision_home = $barangay_home = $city_home = $province_home = $countries_home = $zip_home = $father_last_name = $father_first_name = $father_middle_name = $mother_last_name = $mother_first_name = $mother_middle_name = "";
    $lastNameError = $firstNameError = $middleNameError = $dobError = $genderError = $civil_statusError = $nationalityError = $religionError = $emailError = $telError = $numberError = $rmError = $houseError = $streetError = $subdivisionError = $barangayError = $cityError = $provinceError = $countriesError = $zipError = $rm_homeError = $house_homeError = $street_homeError = $subdivision_homeError = $barangay_homeError = $city_homeError = $province_homeError = $countries_homeError = $zip_homeError = $father_last_nameError = $father_first_nameError = $father_middle_nameError = $mother_last_nameError = $mother_first_nameError = $mother_middle_nameError = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $lastname  = trim($_POST["last_name"]);
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

        function hasMoreThanTwoSpaces($string) {
            return preg_match('/\s{2,}/', $string);
        }

        // First Name validation: Only letters and spaces allowed
        if (empty($firstName)) {
            $firstNameError = "First Name is required.";
            $isValid        = false;
        } elseif (! preg_match("/^[A-Za-z ]+$/", $firstName)) {
            $firstNameError = "Only letters and spaces allowed.";
            $isValid        = false;
        }

        // Middle Name validation: Only letters and spaces allowed
        if (!empty($middleName) && ! preg_match("/^[A-Za-z ]+$/", $middleName)) {
            $middleNameError = "Only letters and spaces allowed.";
            $isValid         = false;
        }

        // Last Name validation: Only letters and spaces allowed
        if (empty($lastname)) {
            $lastNameError = "Last Name is required.";
            $isValid        = false;
        } elseif (! preg_match("/^[A-Za-z ]+$/", $lastname) || (hasMoreThanTwoSpaces($lastname))) {
            $lastNameError = "Invalid Last Name.";
            $isValid        = false;
        }

        // First Name validation: Only letters and spaces allowed
        if (empty($firstName)) {
            $firstNameError = "First Name is required.";
            $isValid        = false;
        } elseif (! preg_match("/^[A-Za-z ]+$/", $firstName) || (hasMoreThanTwoSpaces($firstName))) {
            $firstNameError = "Invalid First Name.";
            $isValid        = false;
        }
        // Middle Name validation: Only letters and spaces allowed
        if (!empty($middleName)) {
            if (! preg_match("/^[A-Za-z ]+$/", $middleName) || (hasMoreThanTwoSpaces($middleName))) {
                $middleNameError = "Invalid Middle Name.";
                $isValid         = false;
            }
        }

        // Date of Birth validation
        if (empty($dob)) {
            $dobError = "Date of Birth is required.";
            $isValid  = false;
        } else {
            $dobTimestamp = strtotime($dob);
            $age          = (date("Y") - date("Y", $dobTimestamp));
            if ($age < 18) {
                $dobError = "You must be at least 18 years old.";
                $isValid  = false;
            }
        }

        // Gender Validation
        if (empty($gender)) {
            $genderError = "Gender is required.";
            $isValid = false;
        }

        // Civil Status Validation
        if (empty($civil_status)) {
            $civil_statusError = "Civil Status is required.";
            $isValid = false;
        }

        // Nationality Validation
        if (empty($nationality)) {
            $nationalityError = "Nationality is required.";
            $isValid = false;
        } elseif (! preg_match("/^[A-Za-z ]+$/", $nationality) || (hasMoreThanTwoSpaces($nationality))) {
            $nationalityError = "Invalid Nationality.";
            $isValid        = false;
        }

        // Religion Validation
         if (!empty($religion)) {
            if (! preg_match("/^[A-Za-z ]+$/", $religion)) {
                $religionError = "Religion is required.";
                $isValid         = false;
            } else if((hasMoreThanTwoSpaces($religion))){
                $religionError = "Invalid Religion.";
                $isValid = false;
            }
        }

        // Email Validation
        if (empty($email)) {
            $emailError = "Email is required.";
            $isValid = false;
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailError = "Invalid email format";
            $isValid = false;
        }

        // Telephone Number Validation
        if (!empty($tel)) {
            if (!preg_match("/^[0-9]+$/", $tel)) {
                $telError = "Only numbers are allowed.";
                $isValid = false;
            }
        }

        // Phone Number Validation
        if (empty($number)) {
            $numberError = "Phone number is required.";
            $isValid = false;
        } elseif (!preg_match("/^[0-9]+$/", $number)) {
            $numberError = "Only numbers are allowed.";
            $isValid = false;
        }

        // RM Validation
        if (empty($rm)) {
            $rmError = "RM is required.";
            $isValid = false;
        } else if (hasMoreThanTwoSpaces($rm)) {
            $rmError = "Invalid RM.";
            $isValid = false;
        }

        // House Validation
        if (empty($house)) {
            $houseError = "House is required.";
            $isValid = false;
        }  elseif (hasMoreThanTwoSpaces($house)) {
            $houseError = "Invalid House.";
            $isValid        = false;
        }

        // Street Validation
        if (empty($street)) {
            $streetError = "Street is required.";
            $isValid = false;
        }  elseif (hasMoreThanTwoSpaces($street)) {
            $streetError = "Invalid Street.";
            $isValid        = false;
        }
        // Subdivision Validation
        if (!empty($subdivision)) {
            if (hasMoreThanTwoSpaces($subdivision)) {
            $subdivisionError = "Invalid Subdivision.";
            $isValid        = false;
            }
        }

        // Barangay Validation
        if (!empty($barangay)) {
            if (hasMoreThanTwoSpaces($barangay)) {
            $barangayError = "Invalid Barangay.";
            $isValid        = false;
            }
        }

        // City Validation
        if (!empty($city)) {
            if (hasMoreThanTwoSpaces($city)) {
            $cityError = "Invalid City.";
            $isValid        = false;
            }
        }

        // Province Validation
        if (!empty($province)) {
            if (hasMoreThanTwoSpaces($province)) {
            $provinceError = "Invalid Province.";
            $isValid        = false;
            }
        }

        // Countries Validation
        if (!empty($countries)) {
            if (hasMoreThanTwoSpaces($countries)) {
            $countriesError = "Invalid Country.";
            $isValid        = false;
            }
        }

        // Zip Validation
        if (!empty($zip)) {
            if (!preg_match("/^[0-9]+$/", $zip)) {
            $zipError = "Only numbers are allowed.";
            $isValid = false;
            }
        }

        // RM Home Validation
        if (empty($rm_home)) {
            $rm_homeError = "RM is required.";
            $isValid = false;
        }  elseif (hasMoreThanTwoSpaces($rm_home)) {
            $rm_homeError = "Invalid RM.";
            $isValid        = false;
        }

        // House Home Validation
        if (empty($house_home)) {
            $house_homeError = "House is required.";
            $isValid = false;
        }  elseif (hasMoreThanTwoSpaces($house_home)) {
            $house_homeError = "Invalid House.";
            $isValid        = false;
        }

        // Street Home Validation
        if (empty($street_home)) {
            $street_homeError = "Street is required.";
            $isValid = false;
        }  elseif (hasMoreThanTwoSpaces($street_home)) {
            $street_homeError = "Invalid Street.";
            $isValid        = false;
        }

        // Subdivision Home Validation
        if (!empty($subdivision_home)) {
            if (hasMoreThanTwoSpaces($subdivision_home)) {
            $subdivision_homeError = "Invalid Subdivision.";
            $isValid        = false;
            }
        }

        // Barangay Home Validation
        if (!empty($barangay_home)) {
            if (hasMoreThanTwoSpaces($barangay_home)) {
            $barangay_homeError = "Invalid Barangay.";
            $isValid        = false;
            }
        }

        // City Home Validation
        if (!empty($city_home)) {
            if (hasMoreThanTwoSpaces($city_home)) {
            $city_homeError = "Invalid City.";
            $isValid        = false;
            }
        }

        // Province Home Validation
        if (!empty($province_home)) {
            if (hasMoreThanTwoSpaces($province_home)) {
            $province_homeError = "Invalid Province.";
            $isValid        = false;
            }
        }

        // Countries Home Validation
        if (!empty($countries_home)) {
            if (hasMoreThanTwoSpaces($countries_home)) {
            $countries_homeError = "Invalid Country.";
            $isValid        = false;
            }
        }

        // Zip Home Validation
        if (!empty($zip_home)) {
            if (!preg_match("/^[0-9]+$/", $zip_home)) {
            $zip_homeError = "Only numbers are allowed.";
            $isValid = false;
            }
        }

        // Father Last Name Validation
        if (!empty($father_last_name)) {
            if (! preg_match("/^[A-Za-z ]+$/", $father_last_name)) {
            $father_last_nameError = "Only letters and spaces allowed.";
            $isValid         = false;
            } elseif (hasMoreThanTwoSpaces($father_last_name)) {
            $father_last_nameError = "Invalid Last Name.";
            $isValid        = false;
            }
        }

        // Father First Name Validation
        if (!empty($father_first_name)) {
            if (! preg_match("/^[A-Za-z ]+$/", $father_first_name)) {
            $father_first_nameError = "Only letters and spaces allowed.";
            $isValid         = false;
            } elseif (hasMoreThanTwoSpaces($father_first_name)) {
            $father_first_nameError = "Invalid First Name.";
            $isValid        = false;
            }
        }

        // Father Middle Name Validation
        if (!empty($father_middle_name)) {
            if (! preg_match("/^[A-Za-z ]+$/", $father_middle_name)) {
            $father_middle_nameError = "Only letters and spaces allowed.";
            $isValid         = false;
            } elseif (hasMoreThanTwoSpaces($father_middle_name)) {
            $father_middle_nameError = "Invalid Middle Name.";
            $isValid        = false;
            }
        }

        // Mother Last Name Validation
        if (!empty($mother_last_name)) {
            if (! preg_match("/^[A-Za-z ]+$/", $mother_last_name)) {
            $mother_last_nameError = "Only letters and spaces allowed.";
            $isValid         = false;
            } elseif (hasMoreThanTwoSpaces($mother_last_name)) {
            $mother_last_nameError = "Invalid Last Name.";
            $isValid        = false;
            }
        }

        // Mother First Name Validation
        if (!empty($mother_first_name)) {
            if (! preg_match("/^[A-Za-z ]+$/", $mother_first_name)) {
            $mother_first_nameError = "Only letters and spaces allowed.";
            $isValid         = false;
            } elseif (hasMoreThanTwoSpaces($mother_first_name)) {
            $mother_first_nameError = "Invalid First Name.";
            $isValid        = false;
            }
        }

        // Mother Middle Name Validation
        if (!empty($mother_middle_name)) {
            if (! preg_match("/^[A-Za-z ]+$/", $mother_middle_name)) {
            $mother_middle_nameError = "Only letters and spaces allowed.";
            $isValid         = false;
            } elseif (hasMoreThanTwoSpaces($mother_middle_name)) {
            $mother_middle_nameError = "Invalid Middle Name.";
            $isValid        = false;
            }
        }

        // Date of Birth validation
        if (empty($dob)) {
            $dobError = "Date of Birth is required.";
            $isValid  = false;
        } else {
            $dobTimestamp = strtotime($dob);
            $age          = (date("Y") - date("Y", $dobTimestamp));
            if ($age < 18) {
                $dobError = "You must be at least 18 years old.";
                $isValid  = false;
            }
        }

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
            $lastname   = trim($_POST["last_name"] ?? '');
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
                $firstName, $middleName, $lastname, $dob, $gender, $civil_status, $nationality, $religion, $email, $tel, $number, 
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
        <div class="wrapper">
            <div class="container">
                <h1>Personal Data</h1>
                <div class="inputs">
                    <label for="last_name">Last Name</label> <br>
                    <input type="text" name="last_name" id="last_name"
                        value="<?php echo htmlspecialchars($lastname); ?>" placeholder="Enter your last name">
                    <span class="error"><?php echo $lastNameError; ?></span>
                </div>

                <div class="inputs">
                    <label for="first_name">First Name</label> <br>
                    <input type="text" name="first_name" id="first_name"
                        value="<?php echo htmlspecialchars($firstName); ?>" placeholder="Enter your first name">
                    <span class="error"><?php echo $firstNameError; ?></span>
                </div>

                <div class="inputs">
                    <label for="middle_name">Middle Name</label> <br>
                    <input type="text" name="middle_name" id="middle_name"
                        value="<?php echo htmlspecialchars($middleName); ?>" placeholder="Enter your middle name">
                    <span class="error"><?php echo $middleNameError; ?></span>
                </div>

                <div class="inputs">
                    <label for="dob">Date of Birth</label> <br>
                    <input type="date" name="dob" id="dob" value="<?php echo htmlspecialchars($dob); ?>"
                        placeholder="Enter your date of birth">
                    <span class="error"><?php echo $dobError; ?></span>
                </div>

                <div class="inputs">
                    <label for="gender">Sex</label> <br>
                    <div class="radio-group">
                        <input type="radio" name="gender" id="male" value="male"
                            value="<?php echo htmlspecialchars($gender); ?>">
                        <label for="male">Male</label>
                        <input type="radio" name="gender" id="female" value="female"
                            value="<?php echo htmlspecialchars($gender); ?>">
                        <label for="female">Female</label>
                    </div>
                    <span class="error"><?php echo $genderError; ?></span>

                </div>

                <div class="inputs">
                    <label for="status">Civil Status</label> <br>
                    <select name="civil_status" id="civil_status" value="<?php echo htmlspecialchars($civil_status); ?>"
                        required>
                        <option value="single">Single</option>
                        <option value="married">Married</option>
                        <option value="widowed">Widowed</option>
                        <option value="legally seperated">Separated</option>
                        <option value="others">Other</option>
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
                        value="<?php echo htmlspecialchars($nationality); ?>" placeholder="Enter your nationality"
                        required>
                    <span class="error"><?php echo $nationalityError; ?></span>
                </div>

                <div class="inputs">
                    <label for="religion">Religion</label> <br>
                    <input type="text" name="religion" id="religion" value="<?php echo htmlspecialchars($religion); ?>"
                        placeholder="Enter your religion">
                    <span class="error"><?php echo $religionError; ?></span>
                </div>

                <div class="inputs">
                    <label for="email">Email Address</label> <br>
                    <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>"
                        placeholder="Enter your email address" required>
                    <span class="error"><?php echo $emailError; ?></span>
                </div>

                <div class="inputs">
                    <label for="tel">Telephone Number</label> <br>
                    <input type="tel" name="tel" id="tel" value="<?php echo htmlspecialchars($tel); ?>"
                        placeholder="Enter your telephone number">
                    <span class="error"><?php echo $telError; ?></span>
                </div>

                <div class="inputs">
                    <label for="number">Phone Number</label> <br>
                    <input type="number" name="number" id="number" value="<?php echo htmlspecialchars($number); ?>"
                        placeholder="Enter your phone number" required>
                    <span class="error"><?php echo $numberError; ?></span>
                </div>
            </div>

            <!-- place of birth -->
            <div class="container">
                <h1>Place of Birth</h1>
                <div class="inputs">
                    <label for="rm">RM/FLR/Unit No. & Bldg. Name</label> <br>
                    <input type="text" name="rm" id="rm" value="<?php echo htmlspecialchars($rm); ?>"
                        placeholder="Enter your RM/FLR/Unit No. & Bldg. Name" required>
                    <span class="error"><?php echo $rmError; ?></span>
                </div>

                <div class="inputs">
                    <label for="house">House/Lot & Blk. No</label> <br>
                    <input type="text" name="house" id="house" value="<?php echo htmlspecialchars($house); ?>"
                        placeholder="Enter your House/Lot & Blk. No" required>
                    <span class="error"><?php echo $houseError; ?></span>
                </div>

                <div class="inputs">
                    <label for="street">Street Name</label> <br>
                    <input type="text" name="street" id="street" value="<?php echo htmlspecialchars($street); ?>"
                        placeholder="Enter your street name" required>
                    <span class="error"><?php echo $streetError; ?></span>
                </div>

                <div class="inputs">
                    <label for="subdivision">Subdivision</label> <br>
                    <input type="text" name="subdivision" id="subdivision"
                        value="<?php echo htmlspecialchars($subdivision); ?>" placeholder="Enter your subdivision">
                    <span class="error"><?php echo $subdivisionError; ?></span>
                </div>

                <div class="inputs">
                    <label for="barangay">Barangay/District/Locality</label> <br>
                    <input type="text" name="barangay" id="barangay" value="<?php echo htmlspecialchars($barangay); ?>"
                        placeholder="Enter your barangay/district/locality">
                    <span class="error"><?php echo $barangayError; ?></span>
                </div>

                <div class="inputs">
                    <label for="city">City/Municipality</label> <br>
                    <input type="text" name="city" id="city" value="<?php echo htmlspecialchars($city); ?>"
                        placeholder="Enter your city/municipality">
                    <span class="error"><?php echo $cityError; ?></span>
                </div>

                <div class="inputs">
                    <label for="province">Province</label> <br>
                    <input type="text" name="province" id="province" value="<?php echo htmlspecialchars($province); ?>"
                        placeholder="Enter your province">
                    <span class="error"><?php echo $provinceError; ?></span>
                </div>

                <div class="inputs">
                    <label for="countries">Country</label> <br>
                    <input type="text" name="countries" id="countries"
                        value="<?php echo htmlspecialchars($countries); ?>" placeholder="Enter your country">
                    <span class="error"><?php echo $countriesError; ?></span>
                </div>

                <div class="inputs">
                    <label for="zip">Zip Code</label> <br>
                    <input type="text" name="zip" id="zip" value="<?php echo htmlspecialchars($zip); ?>"
                        placeholder="Enter your zip code">
                    <span class="error"><?php echo $zipError; ?></span>
                </div>
            </div>
            <!-- home address -->
            <div class="container">
                <h1>Home Address</h1>
                <div class="inputs">
                    <label for="rm_home">RM/FLR/Unit No. & Bldg. Name</label> <br>
                    <input type="text" name="rm_home" id="rm_home" value="<?php echo htmlspecialchars($rm_home); ?>"
                        placeholder="Enter your RM/FLR/Unit No. & Bldg. Name" required>
                    <span class="error"><?php echo $rm_homeError; ?></span>
                </div>

                <div class="inputs">
                    <label for="house_home">House/Lot & Blk. No</label> <br>
                    <input type="text" name="house_home" id="house_home"
                        value="<?php echo htmlspecialchars($house_home); ?>"
                        placeholder="Enter your House/Lot & Blk. No" required>
                    <span class="error"><?php echo $house_homeError; ?></span>
                </div>

                <div class="inputs">
                    <label for="street_home">Street Name</label> <br>
                    <input type="text" name="street_home" id="street_home"
                        value="<?php echo htmlspecialchars($street_home); ?>" placeholder="Enter your street name"
                        required>
                    <span class="error"><?php echo $street_homeError; ?></span>
                </div>

                <div class="inputs">
                    <label for="subdivision_home">Subdivision</label> <br>
                    <input type="text" name="subdivision_home" id="subdivision_home"
                        value="<?php echo htmlspecialchars($subdivision_home); ?>" placeholder="Enter your subdivision"
                        required>
                    <span class="error"><?php echo $subdivision_homeError; ?></span>
                </div>

                <div class="inputs">
                    <label for="barangay_home">Barangay/District/Locality</label> <br>
                    <input type="text" name="barangay_home" id="barangay_home"
                        value="<?php echo htmlspecialchars($barangay_home); ?>"
                        placeholder="Enter your barangay/district/locality" required>
                    <span class="error"><?php echo $barangay_homeError; ?></span>
                </div>

                <div class="inputs">
                    <label for="city_home">City/Municipality</label> <br>
                    <input type="text" name="city_home" id="city_home"
                        value="<?php echo htmlspecialchars($city_home); ?>" placeholder="Enter your city/municipality"
                        required>
                    <span class="error"><?php echo $city_homeError; ?></span>
                </div>

                <div class="inputs">
                    <label for="province_home">Province</label> <br>
                    <input type="text" name="province_home" id="province_home"
                        value="<?php echo htmlspecialchars($province_home); ?>" placeholder="Enter your province"
                        required>
                    <span class="error"><?php echo $province_homeError; ?></span>
                </div>

                <div class="inputs">
                    <label for="countries_home">Country</label> <br>
                    <select class="countries_home" name="countries_home" id="countries_home"
                        value="<?php echo htmlspecialchars($countries_home); ?>"
                        placeholder="Enter your country"></select>
                    <span class="error"><?php echo $countries_homeError; ?></span>
                </div>

                <div class="inputs">
                    <label for="zip_home">Zip Code</label> <br>
                    <input type="text" name="zip_home" id="zip_home" value="<?php echo htmlspecialchars($zip_home); ?>"
                        placeholder="Enter your zip code" required>
                    <span class="error"><?php echo $zip_homeError; ?></span>
                </div>
            </div>
            <!-- father and mother name -->
            <div class="container">
                <h1>Father's Name</h1>
                <div class="inputs">
                    <label for="father_last_name">Last Name</label> <br>
                    <input type="text" name="father_last_name" id="father_last_name"
                        value="<?php echo htmlspecialchars($father_last_name); ?>"
                        placeholder="Enter your father's last name">
                    <span class="error"><?php echo $father_last_nameError; ?></span>
                </div>
                <div class="inputs">
                    <label for="father_first_name">First Name</label> <br>
                    <input type="text" name="father_first_name" id="father_first_name"
                        value="<?php echo htmlspecialchars($father_first_name); ?>"
                        placeholder="Enter your father's first name">
                    <span class="error"><?php echo $father_first_nameError; ?></span>
                </div>

                <div class="inputs">
                    <label for="father_middle_name">Middle Name</label> <br>
                    <input type="text" name="father_middle_name" id="father_middle_name"
                        value="<?php echo htmlspecialchars($father_middle_name); ?>"
                        placeholder="Enter your father's middle name">
                    <span class="error"><?php echo $father_middle_nameError; ?></span>
                </div>
            </div>
            <!-- mother and mother name -->
            <div class="container">
                <h1>Mother's Name</h1>
                <div class="inputs">
                    <label for="mother_last_name">Last Name</label> <br>
                    <input type="text" name="mother_last_name" id="mother_last_name"
                        value="<?php echo htmlspecialchars($mother_last_name); ?>"
                        placeholder="Enter your mother's last name">
                    <span class="error"><?php echo $mother_last_nameError; ?></span>
                </div>
                <div class="inputs">
                    <label for="mother_first_name">First Name</label> <br>
                    <input type="text" name="mother_first_name" id="mother_first_name"
                        value="<?php echo htmlspecialchars($mother_first_name); ?>"
                        placeholder="Enter your mother's first name">
                    <span class="error"><?php echo $mother_first_nameError; ?></span>
                </div>

                <div class="inputs">
                    <label for="mother_middle_name">Middle Name</label> <br>
                    <input type="text" name="mother_middle_name" id="mother_middle_name"
                        value="<?php echo htmlspecialchars($mother_middle_name); ?>"
                        placeholder="Enter your mother's middle name">
                    <span class="error"><?php echo $mother_middle_nameError; ?></span>
                </div>
            </div>
            <button type="submit">Submit</button>
        </div>
        </div>
    </form>
</body>
<script src="../fill.js"></script>
<script src="../countries.js"></script>

<script></script>
<script>
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}
</script>

</html>