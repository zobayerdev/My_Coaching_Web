<?php
require 'functions.php';

$incomes = getAllIncome();
$expenses = getAllExpense();
$totalIncome = getTotalIncome();
$totalExpense = getTotalExpense();
$netTotal = getNetTotal();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['addIncome'])) {
        addIncome($_POST['amount'], $_POST['description'], $_POST['date']);
    } elseif (isset($_POST['addExpense'])) {
        addExpense($_POST['amount'], $_POST['description'], $_POST['date']);
    } elseif (isset($_POST['deleteIncome'])) {
        deleteIncome($_POST['id']);
    } elseif (isset($_POST['deleteExpense'])) {
        deleteExpense($_POST['id']);
    } elseif (isset($_POST['updateIncome'])) {
        updateIncome($_POST['id'], $_POST['amount'], $_POST['description'], $_POST['date']);
    } elseif (isset($_POST['updateExpense'])) {
        updateExpense($_POST['id'], $_POST['amount'], $_POST['description'], $_POST['date']);
    }
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Income and Expense Manager</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    <style>
        /* General styling */
        body {
            font-family: "Space Grotesk", sans-serif;
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

        /* Card styling */
        .card {
            font-family: "Space Grotesk", sans-serif;
            padding: 20px;
            margin: 20px 0;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-align: center;
        }

        /* Form section styling */
        .form-section {
            font-family: "Space Grotesk", sans-serif;
            margin-bottom: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-section h3 {
            font-family: "Space Grotesk", sans-serif;
            margin-top: 0;
            margin-bottom: 10px;
            font-size: 1.5rem;
        }

        form input[type="number"],
        form input[type="text"],
        form input[type="date"],
        form button {
            padding: 10px;
            margin: 5px 0;
            width: 100%;
            box-sizing: border-box;
        }

        form button {
            font-family: "Space Grotesk", sans-serif;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        form button:hover {
            font-family: "Space Grotesk", sans-serif;
            background-color: #218838;
        }

        /* Table styling */
        .table-section {
            font-family: "Space Grotesk", sans-serif;
            margin-bottom: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .table-section h3 {
            font-family: "Space Grotesk", sans-serif;
            margin-top: 0;
            margin-bottom: 10px;
            font-size: 1.5rem;
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

        /* Button styling */
        button {
            font-family: "Space Grotesk", sans-serif;
            padding: 8px 16px;
            margin: 5px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button.delete {
            font-family: "Space Grotesk", sans-serif;
            background-color: #dc3545;
            color: white;
        }

        button.delete:hover {
            font-family: "Space Grotesk", sans-serif;
            background-color: #c82333;
        }

        button.update {
            font-family: "Space Grotesk", sans-serif;
            background-color: #007bff;
            color: white;
        }

        button.update:hover {
            font-family: "Space Grotesk", sans-serif;
            background-color: #0056b3;
        }

        /* Responsive styling */
        @media (min-width: 768px) {

            .form-section,
            .table-section {
                padding: 30px;
            }

            .form-section h3,
            .table-section h3 {
                font-size: 2rem;
            }

            form input[type="number"],
            form input[type="text"],
            form input[type="date"],
            form button {
                width: calc(25% - 20px);
                margin: 10px;
                display: inline-block;
            }

            form button {
                width: calc(100% - 40px);
            }
        }

        @media (min-width: 1024px) {
            .container {
                padding: 40px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Income and Expense Manager</h1>

        <div class="card">
            <h2>Total Income: $<?php echo number_format($totalIncome, 2); ?></h2>
        </div>
        <div class="card">
            <h2>Total Expense: $<?php echo number_format($totalExpense, 2); ?></h2>
        </div>
        <div class="card">
            <h2>Net Total: $<?php echo number_format($netTotal, 2); ?></h2>
        </div>

        <div class="form-section">
            <h3>Add Income</h3>
            <form method="POST">
                <input type="number" name="amount" placeholder="Amount" required>
                <input type="text" name="description" placeholder="Description">
                <input type="date" name="date" required>
                <button type="submit" name="addIncome">Add Income</button>
            </form>
        </div>

        <div class="form-section">
            <h3>Add Expense</h3>
            <form method="POST">
                <input type="number" name="amount" placeholder="Amount" required>
                <input type="text" name="description" placeholder="Description">
                <input type="date" name="date" required>
                <button type="submit" name="addExpense">Add Expense</button>
            </form>
        </div>

        <div class="table-section">
            <h3>Incomes</h3>
            <table>
                <thead>
                    <tr>
                        <th>Amount</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($incomes as $income) : ?>
                        <tr>
                            <td><?php echo number_format($income['amount'], 2); ?></td>
                            <td><?php echo htmlspecialchars($income['description']); ?></td>
                            <td><?php echo htmlspecialchars($income['date']); ?></td>
                            <td>
                                <form method="POST" style="display:inline-block;">
                                    <input type="hidden" name="id" value="<?php echo $income['id']; ?>">
                                    <button type="submit" name="deleteIncome" class="delete">Delete value</button>
                                </form>
                                <button class="update" onclick="showUpdateForm('income', <?php echo $income['id']; ?>, '<?php echo $income['amount']; ?>', '<?php echo $income['description']; ?>', '<?php echo $income['date']; ?>')">Update Value</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="table-section">
            <h3>Expenses</h3>
            <table>
                <thead>
                    <tr>
                        <th>Amount</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($expenses as $expense) : ?>
                        <tr>
                            <td><?php echo number_format($expense['amount'], 2); ?></td>
                            <td><?php echo htmlspecialchars($expense['description']); ?></td>
                            <td><?php echo htmlspecialchars($expense['date']); ?></td>
                            <td>
                                <form method="POST" style="display:inline-block;">
                                    <input type="hidden" name="id" value="<?php echo $expense['id']; ?>">
                                    <button type="submit" name="deleteExpense" class="delete">Delete</button>
                                </form>
                                <button class="update" onclick="showUpdateForm('expense', <?php echo $expense['id']; ?>, '<?php echo $expense['amount']; ?>', '<?php echo $expense['description']; ?>', '<?php echo $expense['date']; ?>')">Update</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div id="updateForm" style="display:none;">
            <h3>Update Entry</h3>
            <form method="POST">
                <input type="hidden" id="updateId" name="id">
                <input type="number" id="updateAmount" name="amount" placeholder="Amount" required>
                <input type="text" id="updateDescription" name="description" placeholder="Description">
                <input type="date" id="updateDate" name="date" required>
                <input type="hidden" id="updateType" name="updateType">
                <button type="submit" id="updateSubmit" name="updateSubmit">Update</button>
            </form>
        </div>
    </div>

    <script>
        function showUpdateForm(type, id, amount, description, date) {
            document.getElementById('updateForm').style.display = 'block';
            document.getElementById('updateId').value = id;
            document.getElementById('updateAmount').value = amount;
            document.getElementById('updateDescription').value = description;
            document.getElementById('updateDate').value = date;
            document.getElementById('updateType').value = type;
            document.getElementById('updateSubmit').name = type === 'income' ? 'updateIncome' : 'updateExpense';
        }
    </script>
</body>

</html>