<?php


header('Content-Type: application/json');
require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../../utils/token.php';


$user_id = validate_bearer_token();

$data = json_decode(file_get_contents('php://input'), true);
if (!$data || !isset($data['id'])) {
    http_response_code(400);
    echo json_encode(['error' => 'id required']);
    exit;
}
$id = $data['id'];

if (isset($data['email'])) {
    $email = filter_var($data['email'], FILTER_VALIDATE_EMAIL);
    if (!$email) { http_response_code(400); echo json_encode(['error'=>'invalid email']); exit; }
    $stmt = $pdo->prepare("UPDATE users SET email = ? WHERE id = ?");
    $stmt->execute([$email, $id]);
}

echo json_encode(['message'=>'updated']);
?>
