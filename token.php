<?php
// utils/token.php
require_once __DIR__ . '/../config/db.php';

function issue_token($user_id, $ttl_seconds = 3600) {
    global $pdo;
    $token = bin2hex(random_bytes(32));
    $expires_at = date('Y-m-d H:i:s', time() + $ttl_seconds);

    $stmt = $pdo->prepare("INSERT INTO tokens (user_id, token, expires_at) VALUES (?, ?, ?)");
    $stmt->execute([$user_id, $token, $expires_at]);

    return $token;
}

function validate_bearer_token() {
    global $pdo;
    $headers = getallheaders();
    if (!isset($headers['Authorization']) && !isset($headers['authorization'])) {
        http_response_code(401);
        echo json_encode(['error' => 'Missing Authorization header']);
        exit;
    }
    $auth = isset($headers['Authorization']) ? $headers['Authorization'] : $headers['authorization'];
    if (stripos($auth, 'Bearer ') !== 0) {
        http_response_code(401);
        echo json_encode(['error' => 'Invalid Authorization header']);
        exit;
    }
    $token = substr($auth, 7);

    $stmt = $pdo->prepare("SELECT user_id, expires_at FROM tokens WHERE token = ?");
    $stmt->execute([$token]);
    $row = $stmt->fetch();
    if (!$row) {
        http_response_code(401);
        echo json_encode(['error' => 'Invalid token']);
        exit;
    }
    if (strtotime($row['expires_at']) < time()) {
        http_response_code(401);
        echo json_encode(['error' => 'Token expired']);
        exit;
    }
    // return user id for further use
    return $row['user_id'];
}
?>
