<?php
// Connect to the database
$db = new mysqli("localhost", "root", "", "project_329");

// Check for errors
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Define some dummy data for hospital types, specialities and price ranges
$hospital_types = array("Public", "Private", "Charity");
$specialities = array("Cardiology", "Neurology", "Oncology", "Orthopedics", "Pediatrics");
$price_ranges = array("Low", "Medium", "High");

// Define a function to populate hospital types from the database
function getHospitalTypes($db) {
    // Get all the hospital types from the database
    $sql = "SELECT DISTINCT hospital_type FROM hospitals";
    $result = $db->query($sql);

    // Check if there are any results
    if ($result->num_rows > 0) {
        // Loop through the results and create an option element for each hospital type
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["hospital_type"] . "'>" . $row["hospital_type"] . "</option>";
        }
    } else {
        // If there are no results, use the dummy data
        global $hospital_types;
        foreach ($hospital_types as $type) {
            echo "<option value='" . $type . "'>" . $type . "</option>";
        }
    }
}

// Define a function to populate specialities from the database
function getSpecialities($db) {
    // Get all the specialities from the database
    $sql = "SELECT DISTINCT speciality FROM hospitals";
    $result = $db->query($sql);

    // Check if there are any results
    if ($result->num_rows > 0) {
        // Loop through the results and create an option element for each speciality
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["speciality"] . "'>" . $row["speciality"] . "</option>";
        }
    } else {
        // If there are no results, use the dummy data
        global $specialities;
        foreach ($specialities as $speciality) {
            echo "<option value='" . $speciality . "'>" . $speciality . "</option>";
        }
    }
}

// Define a function to populate price ranges from the database
function getPriceRanges($db) {
    // Get all the price ranges from the database
    $sql = "SELECT DISTINCT price_range FROM hospitals";
    $result = $db->query($sql);

    // Check if there are any results
    if ($result->num_rows > 0) {
        // Loop through the results and create an option element for each price range
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["price_range"] . "'>" . $row["price_range"] . "</option>";
        }
    } else {
        // If there are no results, use the dummy data
        global $price_ranges;
        foreach ($price_ranges as $range) {
            echo "<option value='" . $range . "'>" . $range . "</option>";
        }
    }
}
?>
