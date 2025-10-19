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
$stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
$stmt->execute([$data['id']]);
echo json_encode(['message' => 'deleted']);
?>
