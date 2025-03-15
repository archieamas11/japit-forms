<?php

function hasMoreThanTwoSpaces($string) {
    return preg_match('/\s{2,}/', $string);
}

function validateFormData(
    &$firstName, &$middleName, &$lastName, &$dob, &$gender, &$civil_status, &$nationality, &$religion, 
    &$email, &$tel, &$number, &$rm, &$house, &$street, &$subdivision, &$barangay, &$city, &$province, 
    &$country, &$zip, &$rm_home, &$house_home, &$street_home, &$subdivision_home, &$barangay_home, 
    &$city_home, &$province_home, &$country_home, &$zip_home, &$father_first_name, &$father_middle_name, 
    &$father_last_name, &$mother_first_name, &$mother_middle_name, &$mother_last_name,
    &$firstNameError, &$middleNameError, &$lastNameError, &$dobError, &$genderError, &$civil_statusError, 
    &$nationalityError, &$religionError, &$emailError, &$telError, &$numberError, &$rmError, &$houseError, 
    &$streetError, &$subdivisionError, &$barangayError, &$cityError, &$provinceError, &$countryError, 
    &$zipError, &$rm_homeError, &$house_homeError, &$street_homeError, &$subdivision_homeError, 
    &$barangay_homeError, &$city_homeError, &$province_homeError, &$country_homeError, &$zip_homeError, 
    &$father_first_nameError, &$father_middle_nameError, &$father_last_nameError, &$mother_first_nameError, 
    &$mother_middle_nameError, &$mother_last_nameError
) {
    $isValid = true;

    // First Name validation
    if (empty($firstName)) {
        $firstNameError = "First Name is required.";
        $isValid = false;
    } elseif (!preg_match("/^[A-Za-z ]+$/", $firstName) || hasMoreThanTwoSpaces($firstName)) {
        $firstNameError = "Invalid First Name. Only letters and single spaces allowed.";
        $isValid = false;
    }

    // Middle Name validation
    if (!empty($middleName)) {
        if (!preg_match("/^[A-Za-z ]+$/", $middleName) || hasMoreThanTwoSpaces($middleName)) {
            $middleNameError = "Invalid Middle Name. Only letters and single spaces allowed.";
            $isValid = false;
        }
    }

    // Last Name validation
    if (empty($lastName)) {
        $lastNameError = "Last Name is required.";
        $isValid = false;
    } elseif (!preg_match("/^[A-Za-z ]+$/", $lastName) || hasMoreThanTwoSpaces($lastName)) {
        $lastNameError = "Invalid Last Name. Only letters and single spaces allowed.";
        $isValid = false;
    }

    // Date of Birth validation
    if (empty($dob)) {
        $dobError = "Date of Birth is required.";
        $isValid = false;
    } else {
        $dobTimestamp = strtotime($dob);
        $age = (date("Y") - date("Y", $dobTimestamp));
        if ($age < 18) {
            $dobError = "You must be at least 18 years old.";
            $isValid = false;
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
    } elseif (!preg_match("/^[A-Za-z ]+$/", $nationality) || hasMoreThanTwoSpaces($nationality)) {
        $nationalityError = "Invalid Nationality. Only letters and single spaces allowed.";
        $isValid = false;
    }

    // Religion Validation
    if (!empty($religion)) {
        if (!preg_match("/^[A-Za-z ]+$/", $religion) || hasMoreThanTwoSpaces($religion)) {
            $religionError = "Invalid Religion. Only letters and single spaces allowed.";
            $isValid = false;
        }
    }

    // Email Validation
    if (empty($email)) {
        $emailError = "Email is required.";
        $isValid = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Invalid email format.";
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
    } elseif (hasMoreThanTwoSpaces($rm)) {
        $rmError = "Invalid RM. Multiple consecutive spaces not allowed.";
        $isValid = false;
    }

    // House Validation
    if (empty($house)) {
        $houseError = "House is required.";
        $isValid = false;
    } elseif (hasMoreThanTwoSpaces($house)) {
        $houseError = "Invalid House. Multiple consecutive spaces not allowed.";
        $isValid = false;
    }

    // Street Validation
    if (empty($street)) {
        $streetError = "Street is required.";
        $isValid = false;
    } elseif (hasMoreThanTwoSpaces($street)) {
        $streetError = "Invalid Street. Multiple consecutive spaces not allowed.";
        $isValid = false;
    }

    // Subdivision Validation
    if (!empty($subdivision)) {
        if (hasMoreThanTwoSpaces($subdivision)) {
            $subdivisionError = "Invalid Subdivision. Multiple consecutive spaces not allowed.";
            $isValid = false;
        }
    }

    // Barangay Validation
    if (!empty($barangay)) {
        if (hasMoreThanTwoSpaces($barangay)) {
            $barangayError = "Invalid Barangay. Multiple consecutive spaces not allowed.";
            $isValid = false;
        }
    }

    // City Validation
    if (!empty($city)) {
        if (hasMoreThanTwoSpaces($city)) {
            $cityError = "Invalid City. Multiple consecutive spaces not allowed.";
            $isValid = false;
        }
    }

    // Province Validation
    if (!empty($province)) {
        if (hasMoreThanTwoSpaces($province)) {
            $provinceError = "Invalid Province. Multiple consecutive spaces not allowed.";
            $isValid = false;
        }
    }

    // Country Validation (Note: Fixed variable name from $countries to $country)
    if (!empty($country)) {
        if (hasMoreThanTwoSpaces($country)) {
            $countryError = "Invalid Country. Multiple consecutive spaces not allowed.";
            $isValid = false;
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
    } elseif (hasMoreThanTwoSpaces($rm_home)) {
        $rm_homeError = "Invalid RM. Multiple consecutive spaces not allowed.";
        $isValid = false;
    }

    // House Home Validation
    if (empty($house_home)) {
        $house_homeError = "House is required.";
        $isValid = false;
    } elseif (hasMoreThanTwoSpaces($house_home)) {
        $house_homeError = "Invalid House. Multiple consecutive spaces not allowed.";
        $isValid = false;
    }

    // Street Home Validation
    if (empty($street_home)) {
        $street_homeError = "Street is required.";
        $isValid = false;
    } elseif (hasMoreThanTwoSpaces($street_home)) {
        $street_homeError = "Invalid Street. Multiple consecutive spaces not allowed.";
        $isValid = false;
    }

    // Subdivision Home Validation
    if (!empty($subdivision_home)) {
        if (hasMoreThanTwoSpaces($subdivision_home)) {
            $subdivision_homeError = "Invalid Subdivision. Multiple consecutive spaces not allowed.";
            $isValid = false;
        }
    }

    // Barangay Home Validation
    if (!empty($barangay_home)) {
        if (hasMoreThanTwoSpaces($barangay_home)) {
            $barangay_homeError = "Invalid Barangay. Multiple consecutive spaces not allowed.";
            $isValid = false;
        }
    }

    // City Home Validation
    if (!empty($city_home)) {
        if (hasMoreThanTwoSpaces($city_home)) {
            $city_homeError = "Invalid City. Multiple consecutive spaces not allowed.";
            $isValid = false;
        }
    }

    // Province Home Validation
    if (!empty($province_home)) {
        if (hasMoreThanTwoSpaces($province_home)) {
            $province_homeError = "Invalid Province. Multiple consecutive spaces not allowed.";
            $isValid = false;
        }
    }

    // Country Home Validation (Note: Fixed variable name from $countries_home to $country_home)
    if (!empty($country_home)) {
        if (hasMoreThanTwoSpaces($country_home)) {
            $country_homeError = "Invalid Country. Multiple consecutive spaces not allowed.";
            $isValid = false;
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
        if (!preg_match("/^[A-Za-z ]+$/", $father_last_name) || hasMoreThanTwoSpaces($father_last_name)) {
            $father_last_nameError = "Invalid Last Name. Only letters and single spaces allowed.";
            $isValid = false;
        }
    }

    // Father First Name Validation
    if (!empty($father_first_name)) {
        if (!preg_match("/^[A-Za-z ]+$/", $father_first_name) || hasMoreThanTwoSpaces($father_first_name)) {
            $father_first_nameError = "Invalid First Name. Only letters and single spaces allowed.";
            $isValid = false;
        }
    }

    // Father Middle Name Validation
    if (!empty($father_middle_name)) {
        if (!preg_match("/^[A-Za-z ]+$/", $father_middle_name) || hasMoreThanTwoSpaces($father_middle_name)) {
            $father_middle_nameError = "Invalid Middle Name. Only letters and single spaces allowed.";
            $isValid = false;
        }
    }

    // Mother Last Name Validation
    if (!empty($mother_last_name)) {
        if (!preg_match("/^[A-Za-z ]+$/", $mother_last_name) || hasMoreThanTwoSpaces($mother_last_name)) {
            $mother_last_nameError = "Invalid Last Name. Only letters and single spaces allowed.";
            $isValid = false;
        }
    }

    // Mother First Name Validation
    if (!empty($mother_first_name)) {
        if (!preg_match("/^[A-Za-z ]+$/", $mother_first_name) || hasMoreThanTwoSpaces($mother_first_name)) {
            $mother_first_nameError = "Invalid First Name. Only letters and single spaces allowed.";
            $isValid = false;
        }
    }

    // Mother Middle Name Validation
    if (!empty($mother_middle_name)) {
        if (!preg_match("/^[A-Za-z ]+$/", $mother_middle_name) || hasMoreThanTwoSpaces($mother_middle_name)) {
            $mother_middle_nameError = "Invalid Middle Name. Only letters and single spaces allowed.";
            $isValid = false;
        }
    }

    return $isValid;
}

?>