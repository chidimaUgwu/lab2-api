<?php
require_once 'db_connect.php';

try {
    $stmt = $pdo->query("SELECT P_id, P_name, P_phone FROM contacts ORDER BY P_id DESC");
    $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode(['success' => true, 'data' => $contacts]);
} catch(PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
?>