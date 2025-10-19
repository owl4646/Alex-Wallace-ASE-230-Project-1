<?php

header('Content-Type: application/json');
require_once __DIR__ . '/../../config/db.php';

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("SELECT id, email, created_at FROM users WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $row = $stmt->fetch();
    if (!$row) { http_response_code(404); echo json_encode(['error'=>'not found']); exit; }
    echo json_encode($row);
    exit;
}

$stmt = $pdo->query("SELECT id, email, created_at FROM users LIMIT 100");
$rows = $stmt->fetchAll();
echo json_encode($rows);
?>
