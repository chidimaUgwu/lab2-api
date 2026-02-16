<?php
require_once 'db_connect.php';

// Get POST data
$id = isset($_POST['id']) ? $_POST['id'] : null;
$name = isset($_POST['name']) ? $_POST['name'] : null;
$phone = isset($_POST['phone']) ? $_POST['phone'] : null;

if(!$id || !$name || !$phone) {
    echo json_encode(['success' => false, 'error' => 'ID, name and phone are required']);
    exit;
}

try {
    $stmt = $pdo->prepare("UPDATE contacts SET P_name = ?, P_phone = ? WHERE P_id = ?");
    $stmt->execute([$name, $phone, $id]);
    
    if($stmt->rowCount() > 0) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Record not found or no changes made']);
    }
} catch(PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>