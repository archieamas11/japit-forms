<?php
session_start();
require_once "../model/user.php";
require_once "../validation/validate.php";
require_once "../config/database.php";

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['insert_id'])) {
    $lastName  = trim($_POST["last_name"] ?? '');
    $firstName  = trim($_POST["first_name"] ?? '');
    $middleName = trim($_POST["middle_name"] ?? '');
    $dob        = $_POST["dob"] ?? '';
    $gender = $_POST["gender"] ?? '';
    $civil_status = $_POST["civil_status"] ?? '';
    $nationality = $_POST["nationality"] ?? '';
    $religion = $_POST["religion"] ?? '';
    $email = $_POST["email"] ?? '';
    $tel = $_POST["tel"] ?? '';
    $number = $_POST["number"] ?? '';
    $rm = $_POST["rm"] ?? '';
    $house = $_POST["house"] ?? '';
    $street = $_POST["street"] ?? '';
    $subdivision = $_POST["subdivision"] ?? '';
    $barangay = $_POST["barangay"] ?? '';
    $city = $_POST["city"] ?? '';
    $province = $_POST["province"] ?? '';
    $countries = $_POST["countries"] ?? '';
    $zip = $_POST["zip"] ?? '';
    $rm_home = $_POST["rm_home"] ?? '';
    $house_home = $_POST["house_home"] ?? '';
    $street_home = $_POST["street_home"] ?? '';
    $subdivision_home = $_POST["subdivision_home"] ?? '';
    $barangay_home = $_POST["barangay_home"] ?? '';
    $city_home = $_POST["city_home"] ?? '';
    $province_home = $_POST["province_home"] ?? '';
    $countries_home = $_POST["countries_home"] ?? '';
    $zip_home = $_POST["zip_home"] ?? '';
    $father_last_name = $_POST["father_last_name"] ?? '';
    $father_first_name = $_POST["father_first_name"] ?? '';
    $father_middle_name = $_POST["father_middle_name"] ?? '';
    $mother_last_name = $_POST["mother_last_name"] ?? '';
    $mother_first_name = $_POST["mother_first_name"] ?? '';
    $mother_middle_name = $_POST["mother_middle_name"] ?? '';

    $data = [
        'first_name' => $firstName,
        'middle_name' => $middleName,
        'last_name' => $lastName,
        'dob' => $dob,
        'gender' => $gender,
        'civil_status' => $civil_status,
        'nationality' => $nationality,
        'religion' => $religion,
        'email' => $email,
        'tel' => $tel,
        'phone_number' => $number,
        'rm' => $rm,
        'house' => $house,
        'street' => $street,
        'subdivision' => $subdivision,
        'barangay' => $barangay,
        'city' => $city,
        'province' => $province,
        'country' => $countries,
        'zip' => $zip,
        'rm_home' => $rm_home,
        'house_home' => $house_home,
        'street_home' => $street_home,
        'subdivision_home' => $subdivision_home,
        'barangay_home' => $barangay_home,
        'city_home' => $city_home,
        'province_home' => $province_home,
        'country_home' => $countries_home,
        'zip_home' => $zip_home,
        'father_first_name' => $father_first_name,
        'father_middle_name' => $father_middle_name,
        'father_last_name' => $father_last_name,
        'mother_first_name' => $mother_first_name,
        'mother_middle_name' => $mother_middle_name,
        'mother_last_name' => $mother_last_name
    ];

    $result = insertUserData($conn, $data);
    if ($result === "success") {
        header("Location: ../views/index.php?success=User inserted");
        exit();
    } else {
        echo "Database error: " . $result; // Debugging statement
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_id'])) {
    $id = trim($_POST['update_id'] ?? '');
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

    // $isValid = validateFormData(
    //     $firstName, $middleName, $lastName, $dob, $gender, $civil_status, $nationality, $religion,
    //     $email, $tel, $number, $rm, $house, $street, $subdivision, $barangay, $city, $province,
    //     $countries, $zip, $rm_home, $house_home, $street_home, $subdivision_home, $barangay_home,
    //     $city_home, $province_home, $countries_home, $zip_home, $father_first_name, $father_middle_name,
    //     $father_last_name, $mother_first_name, $mother_middle_name, $mother_last_name,
    //     $firstNameError, $middleNameError, $lastNameError, $dobError, $genderError, $civil_statusError,
    //     $nationalityError, $religionError, $emailError, $telError, $numberError, $rmError, $houseError,
    //     $streetError, $subdivisionError, $barangayError, $cityError, $provinceError, $countriesError,
    //     $zipError, $rm_homeError, $house_homeError, $street_homeError, $subdivision_homeError,
    //     $barangay_homeError, $city_homeError, $province_homeError, $countries_homeError, $zip_homeError,
    //     $father_first_nameError, $father_middle_nameError, $father_last_nameError, $mother_first_nameError,
    //     $mother_middle_nameError, $mother_last_nameError
    // );

    if ($isValid) {
        $data = [
            'first_name' => $firstName,
            'middle_name' => $middleName,
            'last_name' => $lastName,
            'dob' => $dob,
            'gender' => $gender,
            'civil_status' => $civil_status,
            'nationality' => $nationality,
            'religion' => $religion,
            'email' => $email,
            'tel' => $tel,
            'phone_number' => $number,
            'rm' => $rm,
            'house' => $house,
            'street' => $street,
            'subdivision' => $subdivision,
            'barangay' => $barangay,
            'city' => $city,
            'province' => $province,
            'country' => $countries,
            'zip' => $zip,
            'rm_home' => $rm_home,
            'house_home' => $house_home,
            'street_home' => $street_home,
            'subdivision_home' => $subdivision_home,
            'barangay_home' => $barangay_home,
            'city_home' => $city_home,
            'province_home' => $province_home,
            'country_home' => $countries_home,
            'zip_home' => $zip_home,
            'father_first_name' => $father_first_name,
            'father_middle_name' => $father_middle_name,
            'father_last_name' => $father_last_name,
            'mother_first_name' => $mother_first_name,
            'mother_middle_name' => $mother_middle_name,
            'mother_last_name' => $mother_last_name
        ];
        
        $result = updateUser($id, $data);
        if ($result) {
            header("Location: ../views/index.php?success=User updated");
            exit();
        } else {
            $errors['database'] = "Error updating user";
            echo "Database error: " . $errors['database']; // Debugging statement
        }
    } else {
        echo "Validation failed"; // Debugging statement
    }
} else {
    echo "Form not submitted or update_id not set"; // Debugging statement
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
    $id = intval($_POST['delete_id']); // Convert input to integer for safety

    if (deleteUser($id)) {
        // Redirect after successful deletion
        header("Location: ../views/index.php?success=User deleted");
        exit();
    } else {
        // Redirect if deletion fails
        header("Location: ../views/index.php?error=Failed to delete user");
        exit();
    }
} else {
    // Redirect if accessed directly without POST request
    header("Location: ../views/index.php");
    exit();
}
