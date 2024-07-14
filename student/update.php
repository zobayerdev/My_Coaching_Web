<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $class = $_POST['class'];
    $school_roll = $_POST['school_roll'];
    $school_name = $_POST['school_name'];
    $tuition_fees = $_POST['tuition_fees'];
    $table = "student_" . strtolower($class);

    $sql = "UPDATE $table SET name='$name', school_name='$school_name', tuition_fees='$tuition_fees'
            WHERE school_roll='$school_roll'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
