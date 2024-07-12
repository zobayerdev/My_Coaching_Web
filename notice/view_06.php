<?php
header('Content-Type: application/json; charset=utf-8');

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logins";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(array("error" => "Connection failed: " . $conn->connect_error)));
}

// SQL query to retrieve data from the class08 table
$sql = "SELECT * FROM class06";
$result = $conn->query($sql);

$data = array();

// Fetch data and format into an associative array
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $item = array(
            "id" => $row['id'],
            "notice_title" => $row['notice_title'],
            "pdf_file" => $row['pdf_file'],
            "pdf_link" => $row['pdf_link']
        );
        $data[] = $item;
    }
} else {
    $data[] = array("message" => "No records found");
}

// Output JSON formatted data
echo json_encode($data, JSON_PRETTY_PRINT);

// Close connection
$conn->close();
?>
