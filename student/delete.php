<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $class = $_POST['class'];
    $school_roll = $_POST['school_roll'];
    $table = "student_" . strtolower($class);

    $sql = "DELETE FROM $table WHERE school_roll='$school_roll'";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
