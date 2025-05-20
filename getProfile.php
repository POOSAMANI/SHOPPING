<?php
session_start();
header('Content-Type: application/json');

// Step 1: Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(["error" => "User not logged in"]);
    exit;
}

// Step 2: Database credentials
$host = 'localhost';
$dbname = 'reg';
$username = 'root';
$password = '';

// Step 3: Connect to the database
$conn = new mysqli($host, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    echo json_encode(['error' => 'Database connection failed: ' . $conn->connect_error]);
    exit;
}

// Step 4: Prepare the SQL statement
$sql = "SELECT name, username, email, phone, address FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo json_encode(['error' => 'Failed to prepare SQL statement']);
    $conn->close();
    exit;
}

// Step 5: Bind the user ID from session and execute
$user_id = $_SESSION['user_id'];
$stmt->bind_param('i', $user_id);
$stmt->execute();

// Step 6: Fetch the result
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
    echo json_encode($row); // Success: return user profile as JSON
} else {
    echo json_encode(['error' => 'User data not found']);
}

// Step 7: Clean up
$stmt->close();
$conn->close();
?>
