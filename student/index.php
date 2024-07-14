<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <link rel="stylesheet" href="style.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            background: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }
    </style>

</head>

<body>
    <div class="container">
        <h1>Student Management System</h1>
        <form action="insert.php" method="post">
            <h2>Insert Student Data</h2>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="class">Class:</label>
            <select id="class" name="class" required>
                <option value="class06">Class 06</option>
                <option value="class07">Class 07</option>
                <option value="class08">Class 08</option>
                <option value="class09">Class 09</option>
                <option value="classhsc">Class HSC</option>
            </select>
            <label for="school_roll">School Roll:</label>
            <input type="text" id="school_roll" name="school_roll" required>
            <label for="school_name">School Name:</label>
            <input type="text" id="school_name" name="school_name" required>
            <label for="tuition_fees">Tuition Fees:</label>
            <input type="number" step="0.01" id="tuition_fees" name="tuition_fees" required>
            <button type="submit">Insert</button>
        </form>

        <form action="display.php" method="post">
            <h2>Display Student Data</h2>
            <label for="class">Class:</label>
            <select id="class" name="class" required>
                <option value="class06">Class 06</option>
                <option value="class07">Class 07</option>
                <option value="class08">Class 08</option>
                <option value="class09">Class 09</option>
                <option value="classhsc">Class HSC</option>
            </select>
            <button type="submit">Display</button>
        </form>

        <form action="update.php" method="post">
            <h2>Update Student Data</h2>
            <label for="class">Class:</label>
            <select id="class" name="class" required>
                <option value="class06">Class 06</option>
                <option value="class07">Class 07</option>
                <option value="class08">Class 08</option>
                <option value="class09">Class 09</option>
                <option value="classhsc">Class HSC</option>
            </select>
            <label for="school_roll">School Roll:</label>
            <input type="text" id="school_roll" name="school_roll" required>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="school_name">School Name:</label>
            <input type="text" id="school_name" name="school_name" required>
            <label for="tuition_fees">Tuition Fees:</label>
            <input type="number" step="0.01" id="tuition_fees" name="tuition_fees" required>
            <button type="submit">Update</button>
        </form>

        <form action="delete.php" method="post">
            <h2>Delete Student Data</h2>
            <label for="class">Class:</label>
            <select id="class" name="class" required>
                <option value="class06">Class 06</option>
                <option value="class07">Class 07</option>
                <option value="class08">Class 08</option>
                <option value="class09">Class 09</option>
                <option value="classhsc">Class HSC</option>
            </select>
            <label for="school_roll">School Roll:</label>
            <input type="text" id="school_roll" name="school_roll" required>
            <button type="submit">Delete</button>
        </form>
    </div>
</body>

</html>