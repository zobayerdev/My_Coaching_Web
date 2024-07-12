<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>UN | Admin Panel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Space Grotesk", sans-serif;
            background-color: #f2f2f2;
            margin: 20px;
        }

        .container {
            font-family: "Space Grotesk", sans-serif;
            max-width: 800px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2,
        h3 {
            font-family: "Space Grotesk", sans-serif;
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            font-family: "Space Grotesk", sans-serif;
            margin-bottom: 20px;
        }

        label {
            font-family: "Space Grotesk", sans-serif;
            display: block;
            margin-bottom: 5px;
        }

        select,
        input[type="text"],
        input[type="file"],
        input[type="submit"] {
            font-family: "Space Grotesk", sans-serif;
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            font-family: "Space Grotesk", sans-serif;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            font-family: "Space Grotesk", sans-serif;
            background-color: #45a049;
        }

        table {
            font-family: "Space Grotesk", sans-serif;
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        table th,
        table td {
            font-family: "Space Grotesk", sans-serif;
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        table th {
            font-family: "Space Grotesk", sans-serif;
            background-color: #f2f2f2;
        }

        table td a {
            font-family: "Space Grotesk", sans-serif;
            text-decoration: none;
            color: #007bff;
        }
    </style>

</head>
<body>
    <div class="container">
        <h2>Admin Panel - Update Notice</h2>

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

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $class = $_POST["class"];
            $id = $_POST["id"];

            if (isset($_POST["update"])) {
                $notice_title = $_POST["notice_title"];
                $pdf_link = $_POST["pdf_link"];
                
                // Handle file upload
                if (isset($_FILES["pdf_file"]) && $_FILES["pdf_file"]["error"] == 0) {
                    $target_dir = "uploads/notices/";
                    $target_file = $target_dir . basename($_FILES["pdf_file"]["name"]);
                    $pdfFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                    // Check if file is a actual PDF or fake PDF
                    if ($pdfFileType != "pdf") {
                        echo "Sorry, only PDF files are allowed.";
                        exit;
                    }

                    if (move_uploaded_file($_FILES["pdf_file"]["tmp_name"], $target_file)) {
                        $pdf_file = htmlspecialchars(basename($_FILES["pdf_file"]["name"]));
                        $pdf_link = $target_file; // Update the pdf_link with the new file path
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                        exit;
                    }
                } else {
                    $pdf_file = $_POST["existing_pdf_file"];
                }

                $sql = "UPDATE $class SET notice_title='$notice_title', pdf_file='$pdf_file', pdf_link='$pdf_link' WHERE id=$id";
                if ($conn->query($sql) === TRUE) {
                    echo "<p>Record updated successfully</p>";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            } else {
                $sql = "SELECT * FROM $class WHERE id=$id";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    ?>

                    <form action="update.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="class" value="<?php echo $class; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <label for="notice_title">Notice Title (Needed):</label>
                        <input type="text" id="notice_title" name="notice_title" value="<?php echo $row['notice_title']; ?>"><br>
                        <label for="pdf_file">Upload New PDF File:</label>
                        <input type="file" id="pdf_file" name="pdf_file" accept="application/pdf"><br><br>
                        <label for="existing_pdf_file">Existing PDF File (Not Changed):</label>
                        <input type="text" id="existing_pdf_file" name="existing_pdf_file" value="<?php echo $row['pdf_file']; ?>" readonly><br>
                        <label for="pdf_link">Previous PDF Link (when update then changed):</label>
                        <input type="text" id="pdf_link" name="pdf_link" value="<?php echo $row['pdf_link']; ?>" readonly><br>
                        <input type="submit" name="update" value="Update">
                    </form>

                    <?php
                } else {
                    echo "No record found";
                }
            }
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
