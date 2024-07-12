<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NMS | Admin Panel</title>
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
        <h2>Search notice by class wise</h2>

        <form action="manage_data.php" method="POST">
            <label for="class_select">Select Class:</label>
            <select name="class_select" id="class_select">
                <option value="class06">Class 06</option>
                <option value="class07">Class 07</option>
                <option value="class08">Class 08</option>
                <option value="class09">Class 09</option>
                <option value="classhsc">HSC</option>
            </select>
            <input type="submit" value="Show Notices">
        </form>

        <h3>Upload New Notice</h3>
        <form action="insert.php" method="POST" enctype="multipart/form-data">
            <label for="insert_class">Select Class:</label>
            <select name="insert_class" id="insert_class">
                <option value="class06">Class 06</option>
                <option value="class07">Class 07</option>
                <option value="class08">Class 08</option>
                <option value="class09">Class 09</option>
                <option value="classhsc">HSC</option>
            </select><br>
            <label for="notice_title">Notice Title:</label>
            <input type="text" name="notice_title" id="notice_title" required><br>
            <label for="pdf_file">PDF File:</label>
            <input type="file" name="pdf_file" id="pdf_file" accept="application/pdf" required><br>
            <input type="submit" value="Insert Notice">
        </form>

        <div id="notice_table">
            <!-- Table will be loaded here -->
        </div>
    </div>
</body>

</html>