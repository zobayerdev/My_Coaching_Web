<?php
require 'config.php';

// Function to add income
function addIncome($amount, $description, $date) {
    global $pdo;
    $sql = "INSERT INTO income (amount, description, date) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$amount, $description, $date]);
}

// Function to add expense
function addExpense($amount, $description, $date) {
    global $pdo;
    $sql = "INSERT INTO expense (amount, description, date) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$amount, $description, $date]);
}

// Function to get total income
function getTotalIncome() {
    global $pdo;
    $sql = "SELECT SUM(amount) as total FROM income";
    $stmt = $pdo->query($sql);
    return $stmt->fetch()['total'];
}

// Function to get total expense
function getTotalExpense() {
    global $pdo;
    $sql = "SELECT SUM(amount) as total FROM expense";
    $stmt = $pdo->query($sql);
    return $stmt->fetch()['total'];
}

// Function to get all income
function getAllIncome() {
    global $pdo;
    $sql = "SELECT * FROM income";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll();
}

// Function to get all expense
function getAllExpense() {
    global $pdo;
    $sql = "SELECT * FROM expense";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll();
}

// Function to delete income
function deleteIncome($id) {
    global $pdo;
    $sql = "DELETE FROM income WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$id]);
}

// Function to delete expense
function deleteExpense($id) {
    global $pdo;
    $sql = "DELETE FROM expense WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$id]);
}

// Function to update income
function updateIncome($id, $amount, $description, $date) {
    global $pdo;
    $sql = "UPDATE income SET amount = ?, description = ?, date = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$amount, $description, $date, $id]);
}

// Function to update expense
function updateExpense($id, $amount, $description, $date) {
    global $pdo;
    $sql = "UPDATE expense SET amount = ?, description = ?, date = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$amount, $description, $date, $id]);
}

// Function to get net total (income - expense)
function getNetTotal() {
    return getTotalIncome() - getTotalExpense();
}


?>
