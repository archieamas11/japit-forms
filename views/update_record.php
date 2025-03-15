<?php
require_once "../model/user.php";
require_once "../views/initialize.php";
session_start();

if (isset($_GET['id']) && ($row = getUserById($_GET['id']))) {
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
        echo "<p>No record found.</p>";
        exit;
    }

?>
<link rel="stylesheet" href="../css/index.css">

    <style>
        .error { color: red; font-size: 14px; }
    </style>
    <form action="../controllers/controllers.php?update_id=<?php echo htmlspecialchars($row['id']); ?>" method="POST">
        <div class="title" style="margin: 0 auto;">
            <h1>Update Record</h1>
        </div>
        <input type="hidden" name="update_id" value="<?php echo htmlspecialchars($row['id']); ?>">
        <?php include 'forms.php'; ?>
    </form>

    <script src="../js/countries.js"></script>

