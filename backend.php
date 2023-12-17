<?php
// Establish a connection to your MySQL database
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo("Connection failed: " . $conn->connect_error);
}

// Function to get hospital types
function getHospitalTypes($conn) {
    $sql = "SELECT DISTINCT hospital_type FROM hospitals";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["hospital_type"] . "'>" . $row["hospital_type"] . "</option>";
        }
    }
}

// Function to get specialities
function getSpecialities($conn) {
    $sql = "SELECT DISTINCT speciality FROM hospitals";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["speciality"] . "'>" . $row["speciality"] . "</option>";
        }
    }
}

// Function to get price ranges
function getPriceRanges($conn) {
    $sql = "SELECT DISTINCT price_range FROM hospitals";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["price_range"] . "'>" . $row["price_range"] . "</option>";
        }
    }
}

// Close the connection
$conn->close();
?>
