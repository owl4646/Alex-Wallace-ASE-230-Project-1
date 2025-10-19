<?php


header('Content-Type: application/json');
require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../../utils/token.php';

$data = json_decode(file_get_contents('php://input'), true);
if (!$data || !isset($data['email']) || !isset($data['password'])) {
    http_response_code(400);
    echo json_encode(['error' => 'email and password required']);
    exit;
}
$email = $data['email'];
$password = $data['password'];

$stmt = $pdo->prepare("SELECT id, password FROM users WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch();
if (!$user || !password_verify($password, $user['password'])) {
    http_response_code(401);
    echo json_encode(['error' => 'invalid credentials']);
    exit;
}

$token = issue_token($user['id'], 3600);
echo json_encode(['message' => 'ok', 'token' => $token]);
?>
