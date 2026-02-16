<?php
require_once 'db_connect.php';

// Get ID from URL parameter
$id = isset($_GET['id']) ? $_GET['id'] : null;

if(!$id) {
    echo json_encode(['success' => false, 'error' => 'ID is required']);
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT P_id, P_name, P_phone FROM contacts WHERE P_id = ?");
    $stmt->execute([$id]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if($contact) {
        echo json_encode(['success' => true, 'data' => $contact]);
    } else {
        echo json_encode(['success' => false, 'error' => 'not found']);
    }
} catch(PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>