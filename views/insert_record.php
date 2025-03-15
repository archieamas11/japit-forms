<?php
require_once "../model/user.php";
require_once "../views/initialize.php";
session_start();

// Initialize variables to avoid undefined variable warnings

if (isset($_GET['get_id'])) {
    $get_id = $_GET['get_id'];

    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect form data
        $lastName = trim($_POST["last_name"] ?? '');
        $firstName = trim($_POST["first_name"] ?? '');
        $middleName = trim($_POST["middle_name"] ?? '');
        $dob = $_POST["dob"] ?? '';
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
    } 
} else {
    echo "<p>No record found.</p>";
    exit;
}
?>
<link rel="stylesheet" href="../css/index.css">
<style>
    .error { color: red; font-size: 14px; }
</style>
<form action="../controllers/controllers.php?insert_id=<?php echo htmlspecialchars($get_id); ?>" method="POST">
    <div class="title" style="margin: 0 auto;">
        <h1>Insert Record</h1>
    </div>
    <input type="hidden" name="insert_id" value="<?php echo htmlspecialchars($get_id); ?>">
    <?php include 'forms.php'; ?>
</form>
<script src="../js/countries.js"></script>