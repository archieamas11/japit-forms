<?php
require_once "../config/database.php";
function insertUserData($conn, $data) {
    $stmt = $conn->prepare("INSERT INTO users 
        (first_name, middle_name, last_name, dob, gender, civil_status, nationality, religion, email, tel, phone_number, rm, house, street, subdivision, barangay, city, province, country, zip, 
        rm_home, house_home, street_home, subdivision_home, barangay_home, city_home, province_home, country_home, zip_home, 
        father_first_name, father_middle_name, father_last_name, mother_first_name, mother_middle_name, mother_last_name, created_at) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");

    if (!$stmt) {
        return "Prepare failed: (" . $conn->errno . ") " . $conn->error;
    }

    // Debugging: Print the data being bound
    echo "<pre>";
    print_r($data);
    echo "</pre>";

    $stmt->bind_param(
        "sssssssssssssssssssssssssssssssssss", 
        $data['first_name'], $data['middle_name'], $data['last_name'], $data['dob'], $data['gender'], $data['civil_status'], 
        $data['nationality'], $data['religion'], $data['email'], $data['tel'], $data['phone_number'], $data['rm'], $data['house'], 
        $data['street'], $data['subdivision'], $data['barangay'], $data['city'], $data['province'], $data['country'], 
        $data['zip'], $data['rm_home'], $data['house_home'], $data['street_home'], $data['subdivision_home'], $data['barangay_home'], 
        $data['city_home'], $data['province_home'], $data['country_home'], $data['zip_home'], $data['father_first_name'], 
        $data['father_middle_name'], $data['father_last_name'], $data['mother_first_name'], $data['mother_middle_name'], $data['mother_last_name']
    );

    if ($stmt->execute()) {
        return "success";
    } else {
        return "Error: " . $stmt->error; // Debugging statement
    }
}

function getUserById($id) {
    global $conn;
    $query = "SELECT * FROM users WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);
}

function updateUser($id, $data) {
    global $conn;

    $query = "UPDATE users SET 
        first_name = ?, middle_name = ?, last_name = ?, dob = ?, gender = ?, 
        civil_status = ?, nationality = ?, religion = ?, email = ?, tel = ?, 
        phone_number = ?, rm = ?, house = ?, street = ?, subdivision = ?, 
        barangay = ?, city = ?, province = ?, country = ?, zip = ?, 
        rm_home = ?, house_home = ?, street_home = ?, subdivision_home = ?, 
        barangay_home = ?, city_home = ?, province_home = ?, country_home = ?, 
        zip_home = ?, father_first_name = ?, father_middle_name = ?, father_last_name = ?, 
        mother_first_name = ?, mother_middle_name = ?, mother_last_name = ? 
        WHERE id = ?";

    $stmt = mysqli_prepare($conn, $query);
    if (!$stmt) {
        die("Error preparing statement: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param(
        $stmt,
        "sssssssssssssssssssssssssssssssssssi",
        $data['first_name'], $data['middle_name'], $data['last_name'], $data['dob'], $data['gender'],
        $data['civil_status'], $data['nationality'], $data['religion'], $data['email'], $data['tel'],
        $data['phone_number'], $data['rm'], $data['house'], $data['street'], $data['subdivision'],
        $data['barangay'], $data['city'], $data['province'], $data['country'], $data['zip'],
        $data['rm_home'], $data['house_home'], $data['street_home'], $data['subdivision_home'],
        $data['barangay_home'], $data['city_home'], $data['province_home'], $data['country_home'],
        $data['zip_home'], $data['father_first_name'], $data['father_middle_name'],
        $data['father_last_name'], $data['mother_first_name'], $data['mother_middle_name'],
        $data['mother_last_name'], $id
    );

    $result = mysqli_stmt_execute($stmt);
    if (!$result) {
        die("Error executing statement: " . mysqli_stmt_error($stmt));
    }

    return $result;
}

function deleteUser($id) {
    global $conn;
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

