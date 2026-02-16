<?php
require_once 'db_connect.php';

// Get POST data
$id = isset($_POST['id']) ? $_POST['id'] : null;

if(!$id) {
    echo json_encode(['success' => false, 'error' => 'ID is required']);
    exit;
}

try {
    $stmt = $pdo->prepare("DELETE FROM contacts WHERE P_id = ?");
    $stmt->execute([$id]);
    
    if($stmt->rowCount() > 0) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Record not found']);
    }
} catch(PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>