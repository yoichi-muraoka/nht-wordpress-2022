<?php
/*
Template Name: devotion-api.php
*/
require_once (get_stylesheet_directory() . '/utility/devotion.func.php');

// GETパラメータとして、mとdayは使用不可
$month = $_GET['_month'];
$day = $_GET['_day'];
$plan = getReadingPlan($month, $day);

echo json_encode([
    'status' => $plan != null ? 200 : 400,
    'plans' => $plan
]);