<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $class = $_POST['class'];
    $table = "student_" . strtolower($class);

    $sql = "SELECT * FROM $table";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'><tr><th>Name</th><th>Class</th><th>School Roll</th><th>School Name</th><th>Tuition Fees</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["name"]. "</td><td>" . $row["class"]. "</td><td>" . $row["school_roll"]. "</td><td>" . $row["school_name"]. "</td><td>" . $row["tuition_fees"]. "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    $conn->close();
}
?>
