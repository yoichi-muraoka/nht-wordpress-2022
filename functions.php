<?php

/**
 * htmlspecialchars省略形
 */
function h($string, $output = true) {
    $escaped = htmlspecialchars($string, ENT_QUOTES);
    if($output) echo $escaped;
    return $escaped;
}

/**
 * POST判定
 */
function is_post() {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

/**
 * リダイレクト
 */
function redirectTo($url = '/') {
    header('Location: ' . home_url($url));
    exit();
}