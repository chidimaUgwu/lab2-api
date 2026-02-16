<?php
require_once 'db_connect.php';

// Get POST data
$name = isset($_POST['name']) ? $_POST['name'] : null;
$phone = isset($_POST['phone']) ? $_POST['phone'] : null;

if(!$name || !$phone) {
    echo json_encode(['success' => false, 'error' => 'Name and phone are required']);
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO contacts (P_name, P_phone) VALUES (?, ?)");
    $stmt->execute([$name, $phone]);
    
    echo json_encode(['success' => true, 'id' => $pdo->lastInsertId()]);
} catch(PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>