<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MN | Admin Panel</title>
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
        <h2>Admin Panel - Notice Management System</h2>

        <form action="manage_data.php" method="POST">
            <label for="class_select">Select Class:</label>
            <select name="class_select" id="class_select">
                <option value="class06">Class 06</option>
                <option value="class07">Class 07</option>
                <option value="class08">Class 08</option>
                <option value="class09">Class 09</option>
                <option value="classhsc">HSC</option>
            </select>
            <input type="submit" id="show_notices_button" value="Show Notices"> <!-- Added ID for styling -->
        </form>


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

        // Retrieve selected class from POST request
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $selected_class = $_POST["class_select"];

            // SQL query to retrieve data from the selected table
            $sql = "SELECT * FROM $selected_class";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table>
                        <tr>
                            <th>Notice Title</th>
                            <th>PDF File</th>
                            <th>PDF Link</th>
                            <th>Action</th>
                        </tr>";
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["notice_title"] . "</td>
                            <td>" . $row["pdf_file"] . "</td>
                            <td><a href='" . $row["pdf_link"] . "' target='_blank'>Download PDF</a></td>
                            <td class='action-links'>
                                <form action='delete_data.php' method='POST' style='display:inline;'>
                                    <input type='hidden' name='class' value='$selected_class'>
                                    <input type='hidden' name='id' value='" . $row["id"] . "'>
                                    <input type='submit' value='Delete'>
                                </form>
                                <form action='update.php' method='POST' style='display:inline;'>
                                    <input type='hidden' name='class' value='$selected_class'>
                                    <input type='hidden' name='id' value='" . $row["id"] . "'>
                                    <input type='submit' value='Update'>
                                </form>
                            </td>
                          </tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No results found for the selected class.</p>";
            }

            $conn->close();
        }
        ?>
    </div>
</body>

</html>