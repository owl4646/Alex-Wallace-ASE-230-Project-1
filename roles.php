<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../../config/db.php';

if (!isset($_GET['id'])) { http_response_code(400); echo json_encode(['error'=>'id required']); exit; }
$id = $_GET['id'];


echo json_encode(['user_id'=>$id,'roles'=>['user']]);
?>
