<?php
    session_start();

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
        } elseif (! preg_match("/^[A-Za-z ]+$/", $lastname)) {
            $lastNameError = "Only letters and spaces allowed.";
            $isValid        = false;
        } elseif (preg_match("/\s/", $lastname)) {
            $lastNameError = "Spaces are not allowed.";
            $isValid        = false;
        }

        // First Name validation: Only letters and spaces allowed
        if (empty($firstName)) {
            $firstNameError = "First Name is required.";
            $isValid        = false;
        } elseif (! preg_match("/^[A-Za-z ]+$/", $firstName)) {
            $firstNameError = "Only letters and spaces allowed.";
            $isValid        = false;
        } elseif (preg_match("/\s/", $firstName)) {
            $firstNameError = "Spaces are not allowed.";
            $isValid        = false;
        }

        // Middle Name validation: Only letters and spaces allowed
        if (!empty($middleName)) {
            if (! preg_match("/^[A-Za-z ]+$/", $middleName)) {
                $middleNameError = "Only letters and spaces allowed.";
                $isValid         = false;
            } elseif (preg_match("/\s/", $middleName)) {
                $middleNameError = "Spaces are not allowed.";
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
        } elseif (! preg_match("/^[A-Za-z ]+$/", $nationality)) {
            $nationalityError = "Only letters and spaces allowed.";
            $isValid        = false;
        } elseif (preg_match("/\s/", $nationality)) {
            $nationalityError = "Spaces are not allowed.";
            $isValid        = false;
        }

        // Religion Validation
         if (!empty($religion)) {
            if (! preg_match("/^[A-Za-z ]+$/", $religion)) {
                $religionError = "Only letters and spaces allowed.";
                $isValid         = false;
            } elseif (preg_match("/\s/", $religion)) {
                $religionError = "Spaces are not allowed.";
                $isValid        = false;
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
        }  elseif (preg_match("/\s/", $rm)) {
            $rmError = "Spaces are not allowed.";
            $isValid        = false;
        }

        // House Validation
        if (empty($house)) {
            $houseError = "House is required.";
            $isValid = false;
        }  elseif (preg_match("/\s/", $house)) {
            $houseError = "Spaces are not allowed.";
            $isValid        = false;
        }

        // Street Validation
        if (empty($street)) {
            $streetError = "Street is required.";
            $isValid = false;
        }  elseif (preg_match("/\s/", $street)) {
            $streetError = "Spaces are not allowed.";
            $isValid        = false;
        }

        // Subdivision Validation
        if (!empty($subdivision)) {
            if (preg_match("/\s/", $subdivision)) {
                $subdivisionError = "Spaces are not allowed.";
                $isValid        = false;
            }
        }

        // Barangay Validation
        if (!empty($barangay)) {
            if (preg_match("/\s/", $barangay)) {
                $barangayError = "Spaces are not allowed.";
                $isValid        = false;
            }
        }

        // City Validation
        if (!empty($city)) {
            if (preg_match("/\s/", $city)) {
                $cityError = "Spaces are not allowed.";
                $isValid        = false;
            }
        }

        // Province Validation
        if (!empty($province)) {
            if (preg_match("/\s/", $province)) {
                $provinceError = "Spaces are not allowed.";
                $isValid        = false;
            }
        }

        // Countries Validation
        if (!empty($countries)) {
            if (preg_match("/\s/", $countries)) {
                $countriesError = "Spaces are not allowed.";
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
        }  elseif (preg_match("/\s/", $rm_home)) {
            $rm_homeError = "Spaces are not allowed.";
            $isValid        = false;
        }

        // House Home Validation
        if (empty($house_home)) {
            $house_homeError = "House is required.";
            $isValid = false;
        }  elseif (preg_match("/\s/", $house_home)) {
            $house_homeError = "Spaces are not allowed.";
            $isValid        = false;
        }

        // Street Home Validation
        if (empty($street_home)) {
            $street_homeError = "Street is required.";
            $isValid = false;
        }  elseif (preg_match("/\s/", $street_home)) {
            $street_homeError = "Spaces are not allowed.";
            $isValid        = false;
        }

        // Subdivision Home Validation
        if (!empty($subdivision_home)) {
            if (preg_match("/\s/", $subdivision_home)) {
                $subdivision_homeError = "Spaces are not allowed.";
                $isValid        = false;
            }
        }

        // Barangay Home Validation
        if (!empty($barangay_home)) {
            if (preg_match("/\s/", $barangay_home)) {
                $barangay_homeError = "Spaces are not allowed.";
                $isValid        = false;
            }
        }

        // City Home Validation
        if (!empty($city_home)) {
            if (preg_match("/\s/", $city_home)) {
                $city_homeError = "Spaces are not allowed.";
                $isValid        = false;
            }
        }

        // Province Home Validation
        if (!empty($province_home)) {
            if (preg_match("/\s/", $province_home)) {
                $province_homeError = "Spaces are not allowed.";
                $isValid        = false;
            }
        }

        // Countries Home Validation
        if (!empty($countries_home)) {
            if (preg_match("/\s/", $countries_home)) {
                $countries_homeError = "Spaces are not allowed.";
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
            } elseif (preg_match("/\s/", $father_last_name)) {
                $father_last_nameError = "Spaces are not allowed.";
                $isValid        = false;
            }
        }

        // Father First Name Validation
        if (!empty($father_first_name)) {
            if (! preg_match("/^[A-Za-z ]+$/", $father_first_name)) {
                $father_first_nameError = "Only letters and spaces allowed.";
                $isValid         = false;
            } elseif (preg_match("/\s/", $father_first_name)) {
                $father_first_nameError = "Spaces are not allowed.";
                $isValid        = false;
            }
        }

        // Father Middle Name Validation
        if (!empty($father_middle_name)) {
            if (! preg_match("/^[A-Za-z ]+$/", $father_middle_name)) {
                $father_middle_nameError = "Only letters and spaces allowed.";
                $isValid         = false;
            } elseif (preg_match("/\s/", $father_middle_name)) {
                $father_middle_nameError = "Spaces are not allowed.";
                $isValid        = false;
            }
        }

        // Mother Last Name Validation
        if (!empty($mother_last_name)) {
            if (! preg_match("/^[A-Za-z ]+$/", $mother_last_name)) {
                $mother_last_nameError = "Only letters and spaces allowed.";
                $isValid         = false;
            } elseif (preg_match("/\s/", $mother_last_name)) {
                $mother_last_nameError = "Spaces are not allowed.";
                $isValid        = false;
            }
        }

        // Mother First Name Validation
        if (!empty($mother_first_name)) {
            if (! preg_match("/^[A-Za-z ]+$/", $mother_first_name)) {
                $mother_first_nameError = "Only letters and spaces allowed.";
                $isValid         = false;
            } elseif (preg_match("/\s/", $mother_first_name)) {
                $mother_first_nameError = "Spaces are not allowed.";
                $isValid        = false;
            }
        }

        // Mother Middle Name Validation
        if (!empty($mother_middle_name)) {
            if (! preg_match("/^[A-Za-z ]+$/", $mother_middle_name)) {
                $mother_middle_nameError = "Only letters and spaces allowed.";
                $isValid         = false;
            } elseif (preg_match("/\s/", $mother_middle_name)) {
                $mother_middle_nameError = "Spaces are not allowed.";
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
            $_SESSION["lastname"]  = $lastname;
            $_SESSION["firstName"]  = $firstName;
            $_SESSION["middleName"] = $middleName;
            $_SESSION["dob"]        = $dob;
            $_SESSION["gender"] = $gender;
            $_SESSION["civil_status"] = $civil_status;
            $_SESSION["nationality"] = $nationality;
            $_SESSION["religion"] = $religion;
            $_SESSION["email"] = $email;
            $_SESSION["tel"] = $tel;
            $_SESSION["number"] = $number;
            $_SESSION["rm"] = $rm;
            $_SESSION["house"] = $house;
            $_SESSION["street"] = $street;
            $_SESSION["subdivision"] = $subdivision;
            $_SESSION["barangay"] = $barangay;
            $_SESSION["city"] = $city;
            $_SESSION["province"] = $province;
            $_SESSION["countries"] = $countries;
            $_SESSION["zip"] = $zip;
            $_SESSION["rm_home"] = $rm_home;
            $_SESSION["house_home"] = $house_home;
            $_SESSION["street_home"] = $street_home;
            $_SESSION["subdivision_home"] = $subdivision_home;
            $_SESSION["barangay_home"] = $barangay_home;
            $_SESSION["city_home"] = $city_home;
            $_SESSION["province_home"] = $province_home;
            $_SESSION["countries_home"] = $countries_home;
            $_SESSION["zip_home"] = $zip_home;
            $_SESSION["father_last_name"] = $father_last_name;
            $_SESSION["father_first_name"] = $father_first_name;
            $_SESSION["father_middle_name"] = $father_middle_name;
            $_SESSION["mother_last_name"] = $mother_last_name;
            $_SESSION["mother_first_name"] = $mother_first_name;
            $_SESSION["mother_middle_name"] = $mother_middle_name;
            $_SESSION["age"]        = $age;
            header("Location: result.php");
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Form</title>
    <link rel="stylesheet" href="../test/index.css">
    <style>
        .error { color: red; font-size: 14px; }
    </style>
</head>
<body>
    <form action="index.php" method="POST">
        <div class="wrapper">
        <div class="test-buttons">
                <button class="test-btn filled" type="button" onclick="fillForm()">Fill All Fields</button>
            </div>
            <div class="container">
                <h1>Personal Data</h1>

                <div class="inputs">
                    <label for="last_name">Last Name</label> <br>
                    <input type="text" name="last_name" id="last_name" value="<?php echo htmlspecialchars($lastname); ?>">
                    <span class="error"><?php echo $lastNameError; ?></span>
                </div>

                <div class="inputs">
                    <label for="first_name">First Name</label> <br>
                    <input type="text" name="first_name" id="first_name" value="<?php echo htmlspecialchars($firstName); ?>">
                    <span class="error"><?php echo $firstNameError; ?></span>
                </div>

                <div class="inputs">
                    <label for="middle_name">Middle Name</label> <br>
                    <input type="text" name="middle_name" id="middle_name" value="<?php echo htmlspecialchars($middleName); ?>">
                    <span class="error"><?php echo $middleNameError; ?></span>
                </div>

                <div class="inputs">
                    <label for="dob">Date of Birth</label> <br>
                    <input type="date" name="dob" id="dob" value="<?php echo htmlspecialchars($dob); ?>">
                    <span class="error"><?php echo $dobError; ?></span>
                </div>

                <div class="inputs">
                        <label for="gender">Sex</label> <br>
                        <div class="radio-group">
                            <input type="radio" name="gender" id="male" value="male" value="<?php echo htmlspecialchars($gender); ?>">
                            <label for="male">Male</label>
                            <input type="radio" name="gender" id="female" value="female" value="<?php echo htmlspecialchars($gender); ?>">
                            <label for="female">Female</label>
                        </div>
                        <span class="error"><?php echo $genderError; ?></span>

                    </div>

                    <div class="inputs">
                        <label for="status">Civil Status</label> <br>
                        <select name="civil_status" id="civil_status" value="<?php echo htmlspecialchars($civil_status); ?>" required>
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                            <option value="widowed">Widowed</option>
                            <option value="legally seperated">Separated</option>
                        </select>
                        <span class="error"><?php echo $civil_statusError; ?></span>
                    </div>

                    <div class="inputs">
                        <label for="nationality">Nationality</label> <br>
                        <input type="text" name="nationality" id="nationality" value="<?php echo htmlspecialchars($nationality); ?>" required>
                        <span class="error"><?php echo $nationalityError; ?></span>
                    </div>

                    <div class="inputs">
                        <label for="religion">Religion</label> <br>
                        <input type="text" name="religion" id="religion" value="<?php echo htmlspecialchars($religion); ?>">
                        <span class="error"><?php echo $religionError; ?></span>
                    </div>

                    <div class="inputs">
                        <label for="email">Email Address</label> <br>
                        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>" required>
                        <span class="error"><?php echo $emailError; ?></span>
                    </div>

                    <div class="inputs">
                        <label for="tel">Telephone Number</label> <br>
                        <input type="tel" name="tel" id="tel" value="<?php echo htmlspecialchars($tel); ?>">
                        <span class="error"><?php echo $telError; ?></span>
                    </div>

                    <div class="inputs">
                        <label for="number">Phone Number</label> <br>
                        <input type="number" name="number" id="number" value="<?php echo htmlspecialchars($number); ?>" required>
                        <span class="error"><?php echo $numberError; ?></span>
                    </div>
                    </div>

                    <div class="container">
                <h1>Place of Birth</h1>
                <div class="inputs">
                    <label for="rm">RM/FLR/Unit No. & Bldg. Name</label> <br>
                    <input type="text" name="rm" id="rm" value="<?php echo htmlspecialchars($rm); ?>" required>
                    <span class="error"><?php echo $rmError; ?></span>
                </div>

                <div class="inputs">
                    <label for="house">House/Lot & Blk. No</label> <br>
                    <input type="text" name="house" id="house" value="<?php echo htmlspecialchars($house); ?>" required>
                    <span class="error"><?php echo $houseError; ?></span>
                </div>

                <div class="inputs">
                    <label for="street">Street Name</label> <br>
                    <input type="text" name="street" id="street" value="<?php echo htmlspecialchars($street); ?>" required>
                    <span class="error"><?php echo $streetError; ?></span>
                </div>

                <div class="inputs">
                    <label for="subdivision">Subdivision</label> <br>
                    <input type="text" name="subdivision" id="subdivision" value="<?php echo htmlspecialchars($subdivision); ?>">
                    <span class="error"><?php echo $subdivisionError; ?></span>
                </div>

                <div class="inputs">
                    <label for="barangay">Barangay/District/Locality</label> <br>
                    <input type="text" name="barangay" id="barangay" value="<?php echo htmlspecialchars($barangay); ?>">
                    <span class="error"><?php echo $barangayError; ?></span>
                </div>

                <div class="inputs">
                    <label for="city">City/Municipality</label> <br>
                    <input type="text" name="city" id="city" value="<?php echo htmlspecialchars($city); ?>">
                    <span class="error"><?php echo $cityError; ?></span>
                </div>

                <div class="inputs">
                    <label for="province">Province</label> <br>
                    <input type="text" name="province" id="province" value="<?php echo htmlspecialchars($province); ?>">
                    <span class="error"><?php echo $provinceError; ?></span>
                </div>

                <div class="inputs">
                    <label for="countries">Country</label> <br>
                    <input type="text" name="countries" id="countries" value="<?php echo htmlspecialchars($countries); ?>">
                    <span class="error"><?php echo $countriesError; ?></span>
                </div>

                <div class="inputs">
                    <label for="zip">Zip Code</label> <br>
                    <input type="text" name="zip" id="zip" value="<?php echo htmlspecialchars($zip); ?>">
                    <span class="error"><?php echo $zipError; ?></span>
                </div>
            </div>
            <!-- home address -->
            <div class="container">
                <h1>Home Address</h1>
                <div class="inputs">
                    <label for="rm_home">RM/FLR/Unit No. & Bldg. Name</label> <br>
                    <input type="text" name="rm_home" id="rm_home" value="<?php echo htmlspecialchars($rm_home); ?>"
                        required>
                    <span class="error"><?php echo $rm_homeError; ?></span>
                </div>

                <div class="inputs">
                    <label for="house_home">House/Lot & Blk. No</label> <br>
                    <input type="text" name="house_home" id="house_home" value="<?php echo htmlspecialchars($house_home); ?>"
                        required>
                    <span class="error"><?php echo $house_homeError; ?></span>
                </div>

                <div class="inputs">
                    <label for="street_home">Street Name</label> <br>
                    <input type="text" name="street_home" id="street_home" value="<?php echo htmlspecialchars($street_home); ?>" required>
                    <span class="error"><?php echo $street_homeError; ?></span>
                </div>

                <div class="inputs">
                    <label for="subdivision_home">Subdivision</label> <br>
                    <input type="text" name="subdivision_home" id="subdivision_home" value="<?php echo htmlspecialchars($subdivision_home); ?>"
                        required>
                    <span class="error"><?php echo $subdivision_homeError; ?></span>
                </div>

                <div class="inputs">
                    <label for="barangay_home">Barangay/District/Locality</label> <br>
                    <input type="text" name="barangay_home" id="barangay_home"
                        value="<?php echo htmlspecialchars($barangay_home); ?>" required>
                    <span class="error"><?php echo $barangay_homeError; ?></span>
                </div>

                <div class="inputs">
                    <label for="city_home">City/Municipality</label> <br>
                    <input type="text" name="city_home" id="city_home" value="<?php echo htmlspecialchars($city_home); ?>" required>
                    <span class="error"><?php echo $city_homeError; ?></span>
                </div>

                <div class="inputs">
                    <label for="province_home">Province</label> <br>
                    <input type="text" name="province_home" id="province_home" value="<?php echo htmlspecialchars($province_home); ?>" required>
                    <span class="error"><?php echo $province_homeError; ?></span>
                </div>

                <div class="inputs">
                    <label for="countries_home">Country</label> <br>
                    <select class="countries_home" name="countries_home" id="countries_home" value="<?php echo htmlspecialchars($countries_home); ?>"></select>
                    <span class="error"><?php echo $countries_homeError; ?></span>
                </div>

                <div class="inputs">
                    <label for="zip_home">Zip Code</label> <br>
                    <input type="text" name="zip_home" id="zip_home" value="<?php echo htmlspecialchars($zip_home); ?>" required>
                    <span class="error"><?php echo $zip_homeError; ?></span>
                </div>
            </div>
            <!-- father and mother name -->
            <div class="container">
                <h1>Father's Name</h1>
                <div class="inputs">
                    <label for="father_last_name">Last Name</label> <br>
                    <input type="text" name="father_last_name" id="father_last_name" value="<?php echo htmlspecialchars($father_last_name); ?>">
                    <span class="error"><?php echo $father_last_nameError; ?></span>
                </div>
                <div class="inputs">
                    <label for="father_first_name">First Name</label> <br>
                    <input type="text" name="father_first_name" id="father_first_name" value="<?php echo htmlspecialchars($father_first_name); ?>">
                    <span class="error"><?php echo $father_first_nameError; ?></span>
                </div>

                <div class="inputs">
                    <label for="father_middle_name">Middle Name</label> <br>
                    <input type="text" name="father_middle_name" id="father_middle_name"
                        value="<?php echo htmlspecialchars($father_middle_name); ?>">
                    <span class="error"><?php echo $father_middle_nameError; ?></span>
                </div>
            </div>
            <!-- mother and mother name -->
            <div class="container">
                <h1>Mother's Name</h1>
                <div class="inputs">
                    <label for="mother_last_name">Last Name</label> <br>
                    <input type="text" name="mother_last_name" id="mother_last_name" value="<?php echo htmlspecialchars($mother_last_name); ?>">
                    <span class="error"><?php echo $mother_last_nameError; ?></span>
                </div>
                <div class="inputs">
                    <label for="mother_first_name">First Name</label> <br>
                    <input type="text" name="mother_first_name" id="mother_first_name" value="<?php echo htmlspecialchars($mother_first_name); ?>">
                    <span class="error"><?php echo $mother_first_nameError; ?></span>
                </div>

                <div class="inputs">
                    <label for="mother_middle_name">Middle Name</label> <br>
                    <input type="text" name="mother_middle_name" id="mother_middle_name"
                        value="<?php echo htmlspecialchars($mother_middle_name); ?>">
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
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
</html>
