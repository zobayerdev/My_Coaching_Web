<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Management System</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Space Grotesk", sans-serif;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            font-family: "Space Grotesk", sans-serif;
            width: 90%;
            max-width: 1200px;
            margin: auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-section {
            font-family: "Space Grotesk", sans-serif;
            margin: 20px 0;
        }

        form input[type="text"],
        form input[type="number"],
        form input[type="file"],
        form button {
            padding: 10px;
            margin: 5px 0;
            width: 100%;
            box-sizing: border-box;
        }

        form button {
            font-family: "Space Grotesk", sans-serif;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        form button:hover {
            font-family: "Space Grotesk", sans-serif;
            background-color: #0056b3;
        }

        .table-section {
            font-family: "Space Grotesk", sans-serif;
            margin: 20px 0;
        }

        table {
            font-family: "Space Grotesk", sans-serif;
            width: 100%;
            border-collapse: collapse;
        }

        table th,
        table td {
            font-family: "Space Grotesk", sans-serif;
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }

        table th {
            font-family: "Space Grotesk", sans-serif;
            background-color: #f2f2f2;
        }

        table tr:nth-child(even) {
            font-family: "Space Grotesk", sans-serif;
            background-color: #f9f9f9;
        }

        #updateForm {
            font-family: "Space Grotesk", sans-serif;
            margin-top: 20px;
        }

        #updateForm input[type="text"],
        #updateForm input[type="number"],
        #updateForm input[type="file"],
        #updateForm button {
            font-family: "Space Grotesk", sans-serif;
            width: calc(25% - 20px);
            margin: 10px;
            display: inline-block;
        }

        #updateForm button {
            font-family: "Space Grotesk", sans-serif;
            width: calc(100% - 40px);
        }

        @media (max-width: 768px) {

            #updateForm input[type="text"],
            #updateForm input[type="number"],
            #updateForm input[type="file"],
            #updateForm button {
                width: calc(100% - 20px);
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Teacher Management System</h1>

        <!-- Add Teacher Form -->
        <div class="form-section">
            <h3>Add Teacher</h3>
            <form method="POST" enctype="multipart/form-data">
                <input type="text" name="name" placeholder="Name" required>
                <input type="number" name="age" placeholder="Age">
                <input type="text" name="mobile_number" placeholder="Mobile Number">
                <input type="number" name="salary" placeholder="Salary">
                <input type="text" name="address" placeholder="Address">
                <input type="text" name="position" placeholder="Position">
                <input type="file" name="image" accept="image/*" required>
                <button type="submit" name="addTeacher">Add Teacher</button>
            </form>
        </div>

        <!-- Display Teachers -->
        <div class="table-section">
            <h3>Teachers</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Mobile Number</th>
                        <th>Salary</th>
                        <th>Address</th>
                        <th>Position</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require 'functions.php';

                    // Handle form submissions
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        if (isset($_POST['addTeacher'])) {
                            $name = $_POST['name'];
                            $age = $_POST['age'];
                            $mobile_number = $_POST['mobile_number'];
                            $salary = $_POST['salary'];
                            $address = $_POST['address'];
                            $position = $_POST['position'];

                            // Handle image upload
                            $image_path = uploadTeacherImage($_FILES['image']);

                            if ($image_path !== null) {
                                if (addTeacher($name, $age, $mobile_number, $salary, $address, $position, $image_path)) {
                                    echo '<script>alert("Teacher added successfully.");</script>';
                                } else {
                                    echo '<script>alert("Failed to add teacher.");</script>';
                                }
                            }
                        }
                    }

                    // Fetch all teachers
                    $teachers = getAllTeachers();

                    foreach ($teachers as $teacher) {
                        echo '<tr>';
                        echo '<td>' . $teacher['id'] . '</td>';
                        echo '<td>' . htmlspecialchars($teacher['name']) . '</td>';
                        echo '<td>' . $teacher['age'] . '</td>';
                        echo '<td>' . htmlspecialchars($teacher['mobile_number']) . '</td>';
                        echo '<td>' . $teacher['salary'] . '</td>';
                        echo '<td>' . htmlspecialchars($teacher['address']) . '</td>';
                        echo '<td>' . htmlspecialchars($teacher['position']) . '</td>';
                        echo '<td><img src="' . $teacher['image_path'] . '" style="max-width: 100px; max-height: 100px;"></td>';
                        echo '<td>';
                        echo '<form method="POST" style="display:inline-block;">';
                        echo '<input type="hidden" name="id" value="' . $teacher['id'] . '">';
                        echo '<button type="submit" name="deleteTeacher">Delete</button>';
                        echo '</form>';
                        echo '<button onclick="showUpdateForm(' . $teacher['id'] . ', \'' . $teacher['name'] . '\', ' . $teacher['age'] . ', \'' . $teacher['mobile_number'] . '\', ' . $teacher['salary'] . ', \'' . $teacher['address'] . '\', \'' . $teacher['position'] . '\')">Update</button>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Update Teacher Form (Hidden by default) -->
        <div id="updateForm" style="display:none;">
            <h3>Update Teacher</h3>
            <form method="POST">
                <input type="hidden" id="updateId" name="id">
                <input type="text" id="updateName" name="name" placeholder="Name" required>
                <input type="number" id="updateAge" name="age" placeholder="Age">
                <input type="text" id="updateMobileNumber" name="mobile_number" placeholder="Mobile Number">
                <input type="number" id="updateSalary" name="salary" placeholder="Salary">
                <input type="text" id="updateAddress" name="address" placeholder="Address">
                <input type="text" id="updatePosition" name="position" placeholder="Position">
                <input type="file" id="updateImage" name="image" accept="image/*">
                <button type="submit" id="updateSubmit" name="updateTeacher">Update Teacher</button>
            </form>
        </div>
    </div>

    <script>
        function showUpdateForm(id, name, age, mobile_number, salary, address, position) {
            document.getElementById('updateForm').style.display = 'block';
            document.getElementById('updateId').value = id;
            document.getElementById('updateName').value = name;
            document.getElementById('updateAge').value = age;
            document.getElementById('updateMobileNumber').value = mobile_number;
            document.getElementById('updateSalary').value = salary;
            document.getElementById('updateAddress').value = address;
            document.getElementById('updatePosition').value = position;
        }
    </script>
</body>

</html>