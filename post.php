<?php


header('Content-Type: application/json');
require_once __DIR__ . '/../../config/db.php';

$data = json_decode(file_get_contents('php://input'), true);
if (!$data || !isset($data['email']) || !isset($data['password'])) {
    http_response_code(400);
    echo json_encode(['error' => 'email and password required']);
    exit;
}

$email = filter_var($data['email'], FILTER_VALIDATE_EMAIL);
$password = password_hash($data['password'], PASSWORD_DEFAULT);

$stmt = $pdo->prepare("INSERT INTO users (email, password, created_at) VALUES (?, ?, NOW())");
$stmt->execute([$email, $password]);
echo json_encode(['message' => 'created', 'user_id' => $pdo->lastInsertId()]);
?>
