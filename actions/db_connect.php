<?php
header('Content-Type: application/json');

$host = 'localhost';
$dbname = 'mobileapps_2026B_chidima_ugwu';  
$username = 'chidima.ugwu';    
$password = '66071288';   

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo json_encode(['success' => false, 'error' => 'Connection failed: ' . $e->getMessage()]);
    exit;
}
?>