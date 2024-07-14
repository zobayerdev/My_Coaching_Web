<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $class = $_POST['class'];
    $school_roll = $_POST['school_roll'];
    $school_name = $_POST['school_name'];
    $tuition_fees = $_POST['tuition_fees'];
    $table = "student_" . strtolower($class);

    $sql = "INSERT INTO $table (name, class, school_roll, school_name, tuition_fees)
            VALUES ('$name', '$class', '$school_roll', '$school_name', '$tuition_fees')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
