<?php

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logins";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to add a new teacher
function addTeacher($name, $age, $mobile_number, $salary, $address, $position, $image_path) {
    global $conn;
    
    $name = mysqli_real_escape_string($conn, $name);
    $age = (int)$age;
    $mobile_number = mysqli_real_escape_string($conn, $mobile_number);
    $salary = (float)$salary;
    $address = mysqli_real_escape_string($conn, $address);
    $position = mysqli_real_escape_string($conn, $position);
    $image_path = mysqli_real_escape_string($conn, $image_path);
    
    $sql = "INSERT INTO teachers (name, age, mobile_number, salary, address, position, image_path) 
            VALUES ('$name', $age, '$mobile_number', $salary, '$address', '$position', '$image_path')";
    
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
    }
}

// Function to fetch all teachers
function getAllTeachers() {
    global $conn;
    
    $teachers = array();
    $sql = "SELECT * FROM teachers";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $teachers[] = $row;
        }
    }
    
    return $teachers;
}

// Function to delete a teacher by ID
function deleteTeacher($id) {
    global $conn;
    
    $id = (int)$id;
    $sql = "DELETE FROM teachers WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        echo "Error deleting record: " . $conn->error;
        return false;
    }
}

// Function to update teacher details
function updateTeacher($id, $name, $age, $mobile_number, $salary, $address, $position, $image_path) {
    global $conn;
    
    $id = (int)$id;
    $name = mysqli_real_escape_string($conn, $name);
    $age = (int)$age;
    $mobile_number = mysqli_real_escape_string($conn, $mobile_number);
    $salary = (float)$salary;
    $address = mysqli_real_escape_string($conn, $address);
    $position = mysqli_real_escape_string($conn, $position);
    $image_path = mysqli_real_escape_string($conn, $image_path);
    
    $sql = "UPDATE teachers SET 
            name='$name', 
            age=$age, 
            mobile_number='$mobile_number', 
            salary=$salary, 
            address='$address', 
            position='$position', 
            image_path='$image_path' 
            WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        echo "Error updating record: " . $conn->error;
        return false;
    }
}

// Function to get teacher details by ID
function getTeacherById($id) {
    global $conn;
    
    $id = (int)$id;
    $sql = "SELECT * FROM teachers WHERE id=$id";
    $result = $conn->query($sql);
    
    if ($result->num_rows == 1) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

// Function to handle file upload
function uploadTeacherImage($file) {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($file["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    $check = getimagesize($file["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    
    // Check file size
    if ($file["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        return null;
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($file["tmp_name"], $targetFile)) {
            return $targetFile;
        } else {
            echo "Sorry, there was an error uploading your file.";
            return null;
        }
    }
}
?>
