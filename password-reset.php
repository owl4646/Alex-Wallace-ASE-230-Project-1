<?php
header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input'), true);
if (!$data || !isset($data['email'])) { http_response_code(400); echo json_encode(['error'=>'email required']); exit; }
echo json_encode(['message'=>'password reset request received for ' . $data['email']]);
?>
