<?php

/*---------------------
   ユーティリティ
----------------------*/

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

// 英語の月名リストの取得
function getEnglishMonths() {
    return ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
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


/*---------------------
   管理ページの機能追加
----------------------*/
// ナビゲーションメニューの有効化
function register_custom_menus() {
    register_nav_menus(
        [
            'header-menu' => ( 'ヘッダーメニュー' ),
            'footer-menu' => ( 'フッターメニュー' )
        ]
    );
}

add_action( 'init', 'register_custom_menus' );


// メッセンジャーの選択肢 (https://whitewood-hp.com/web-tips/archives/3901)
function acf_load_messanger_field_choices( $field ) {
    $field['choices'] = array();
    $args = array('posts_per_page' => -1,'post_type' => 'messangers','order' => 'ASC');
    $messangers=get_posts($args);
    foreach($messangers as $post):
        setup_postdata($post);
        $field['choices'][$post -> ID] = $post -> post_title;
    endforeach;
    wp_reset_postdata();
 
    return $field;
}
 
add_filter('acf/load_field/name=messanger', 'acf_load_messanger_field_choices');