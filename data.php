<?php
// Validate and sanitize inputs
$errors = [];

function validateName($name, $field) {
    global $errors;
    if (preg_match('/\d/', $name) || preg_match('/\s/', $name)) {
        $errors[$field] = 'Should not contain numbers or spaces';
    }
    return htmlspecialchars(trim($name));
}

function validateDate($date) {
    global $errors;
    $today = new DateTime();
    $birthDate = DateTime::createFromFormat('Y-m-d', $date);
    if (!$birthDate) {
        $errors['birth_date'] = 'Invalid date format';
        return null;
    }
    $age = $today->diff($birthDate)->y;
    if ($age < 18) {
        $errors['birth_date'] = 'Must be at least 18 years old';
    }
    return $birthDate;
}

// Validate all fields
$lastName = validateName($_POST['last_name'] ?? '', 'last_name');
$firstName = validateName($_POST['first_name'] ?? '', 'first_name');
$middleName = isset($_POST['middle_name']) ? validateName($_POST['middle_name'], 'middle_name') : '';
$birthDate = validateDate($_POST['birth_date'] ?? '');
$gender = htmlspecialchars($_POST['gender'] ?? '');
// Add validations for other fields similarly...

// If there are errors, handle them (redirect back or show errors)
if (!empty($errors)) {
    // Handle errors - redirect back with error messages
    // This part needs proper implementation based on your error handling strategy
    die('Validation errors occurred');
}

// If valid, display results
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Results</title>
</head>
<body>
    <h1>Submitted Data</h1>
    <p>Name: <?php echo "{$lastName}, {$firstName} " . ($middleName ? "{$middleName}." : '') ?></p>
    <p>Age: <?php echo $birthDate ? $birthDate->diff(new DateTime())->y : ''; ?></p>
    <!-- Add other fields -->
</body>
</html>