<?php
// update-file.php

// 允许跨域请求

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    // 如果是预检请求，直接返回成功
    http_response_code(200);
    exit();
}

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 获取POST请求中的数据
    $input = json_decode(file_get_contents('php://input'), true);

    if (isset($input['content'])) {
        $content = $input['content'];
        $filePath = 'data.txt'; // 修改为你的文本文件路径

        // 写入新的内容到文本文件
        if (file_put_contents($filePath, $content) !== false) {
            echo json_encode(['status' => 'success', 'message' => 'File updated successfully.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to write to file.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'No content provided.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>
