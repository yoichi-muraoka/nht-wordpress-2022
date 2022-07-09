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

// スラッグの取得
function getSlug() {
    return get_post_field('post_name', get_the_ID());
}

/**
 * ページネーションに必要な情報を連想配列で返す
 * @param $plusMinus 現在ページの前後に何ページ表示させるか
 * @return 連想配列: start, end, current, total
 */
function getPaginationSource($plusMinus = 2) {
    global $wp_query;
    $total = $wp_query->max_num_pages; // 全ページ数
    $current = (get_query_var('paged')) ? get_query_var('paged') : 1; // 現在ページ
    $range = 1 + ($plusMinus * 2); // 画面上に表示させるページ数

    $start = $current - $plusMinus; // 最初のページ
    $end = $current + $plusMinus; // 最後のページ

    if($total <= $range) {
        $start = 1;
        $end = $total;
    }
    else if($start < 1) {
        $diff = 1 - $start;
        $start = 1;
        $end += $diff;
    }
    else if($end > $total) {
        $diff = $end - $total;
        $start -= $diff;
        $end = $total;
    }
   
    return [
        'start' => $start,
        'end' => $end,
        'current' => $current,
        'total' => $total
    ];
}