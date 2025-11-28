<?php
// ���� CORS ͷ

// ���� OPTIONS Ԥ������
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit;
}

// ����һ������
$array = [
    'http://lazic.cn/puzzle/',
    'http://lazic.cn/puzzle/level-1/',
    'http://lazic.cn/puzzle/level-2/',
    'http://lazic.cn/puzzle/level-3/',
    'http://lazic.cn/puzzle/level-4/',
    'http://lazic.cn/puzzle/levelfive/',
    'http://lazic.cn/puzzle/title/',
    'http://lazic.cn/puzzle/password/',
    'http://lazic.cn/puzzle/hr/',
    'http://lazic.cn/puzzle/skyblue/',
    'http://lazic.cn/puzzle/Symmetree/',
    'http://lazic.cn/puzzle/golang/',
    'http://lazic.cn/puzzle/quarter/',
    'http://lazic.cn/puzzle/heeeelp/',
    'http://lazic.cn/puzzle/wuhuhahaha/',
    'http://lazic.cn/puzzle/',
    'http://lazic.cn/puzzle/',
    'http://lazic.cn/puzzle/',
    'http://lazic.cn/puzzle/',
    'https://www.baidu.com',
    'https://lazic.cn',
    'https://i.lazic.cn'

];

// ��������Ҫ���� 'element2'
$response = [
    'element' => $array];

// ������ӦͷΪ JSON
header('Content-Type: application/json');

// ��� JSON ��ʽ����Ӧ
echo json_encode($response);
?>
