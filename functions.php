<?php

//htmlspecialchars省略形
function h($string, $output = true) {
    $escaped = htmlspecialchars($string, ENT_QUOTES);
    if($output) echo $escaped;
    return $escaped;
}

// POST判定
function is_post() {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

// リダイレクト
function redirectTo($url = '/') {
    header('Location: ' . home_url($url));
    exit();
}

// テーマ内のファイルパスを出力
function printPath($path) {
   echo get_stylesheet_directory_uri() . '/' . $path;
}

// カスタム投稿の取得
function getCustomPosts($postType, $postsPerPage) {
    $args = [
        'post_type' => $postType,
        'posts_per_page' => $postsPerPage
    ];
    return new WP_Query($args);
}