<?php
header('Content-Type: application/json');

$uri = strtok($uri, '?');

if (preg_match('#^/api/auth/register$#', $uri) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    require __DIR__ . '/api/auth/register.php';
    exit;
}
if (preg_match('#^/api/auth/login$#', $uri) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    require __DIR__ . '/api/auth/login.php';
    exit;
}
if (preg_match('#^/api/users$#', $uri)) {
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET': require __DIR__ . '/api/users/get.php'; break;
        case 'POST': require __DIR__ . '/api/users/post.php'; break;
        case 'PUT': require __DIR__ . '/api/users/put.php'; break;
        case 'DELETE': require __DIR__ . '/api/users/delete.php'; break;
        default:
            http_response_code(405);
            echo json_encode(['error' => 'method not allowed']);
    }
    exit;
}

http_response_code(404);
echo json_encode(['error' => 'not found']);
?>
