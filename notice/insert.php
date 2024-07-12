<!-- insert.php -->

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logins";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $class = $_POST["insert_class"];
    $notice_title = $_POST["notice_title"];
    
    // Handle file upload
    $target_dir = "uploads/notices/";
    $target_file = $target_dir . basename($_FILES["pdf_file"]["name"]);
    $uploadOk = 1;
    $pdfFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // Check if file is a actual PDF or fake PDF
    if($pdfFileType != "pdf") {
        echo "Sorry, only PDF files are allowed.";
        $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["pdf_file"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars(basename($_FILES["pdf_file"]["name"])). " has been uploaded.";
            $pdf_file = htmlspecialchars(basename($_FILES["pdf_file"]["name"]));
            $pdf_link = $target_file;
            
            // SQL query to insert data into the selected table
            $sql = "INSERT INTO $class (notice_title, pdf_file, pdf_link) VALUES ('$notice_title', '$pdf_file', '$pdf_link')";
            
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $conn->close();
}
?>

<a href="manage_data.php">View Data</a>
