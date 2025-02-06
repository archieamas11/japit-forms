<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function clean_input($data) {
        return trim(htmlspecialchars($data));
    }

    $errors = [];
    
    // Validate Name Fields (No Numbers, No Spaces)
    $nameFields = ["last_name", "first_name", "middle_name", "father_last_name", "father_first_name", "father_middle_name", "mother_last_name", "mother_first_name", "mother_middle_name"];
    foreach ($nameFields as $field) {
        if (!preg_match("/^[A-Za-z]+$/", $_POST[$field])) {
            $errors[$field] = ucfirst(str_replace("_", " ", $field)) . " should only contain letters.";
        }
    }

    // Validate No Spaces in Inputs
    foreach ($_POST as $key => $value) {
        if (preg_match("/\s/", $value)) {
            $errors[$key] = ucfirst(str_replace("_", " ", $key)) . " should not contain spaces.";
        }
    }

    // Validate Date of Birth (Must be 18+)
    $birthDate = $_POST["birth_date"];
    $birthYear = date("Y", strtotime($birthDate));
    $currentYear = date("Y");
    $age = $currentYear - $birthYear;
    if ($age < 18) {
        $errors["birth_date"] = "You must be at least 18 years old.";
    }

    // Validate Email
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Enter a valid email address.";
    }

    // Validate Phone Number and TIN (Numbers Only)
    $numberFields = ["number", "tel"];
    foreach ($numberFields as $field) {
        if (!preg_match("/^[0-9]+$/", $_POST[$field])) {
            $errors[$field] = ucfirst(str_replace("_", " ", $field)) . " should only contain numbers.";
        }
    }

    // If no errors, display data
    if (empty($errors)) {
        session_start();
        $_SESSION["form_data"] = $_POST;
        $_SESSION["age"] = $age;
        header("Location: success.php");
        exit();
    }
}
?>
