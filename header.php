<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ニューホープ東京 | New Hope Tokyo</title>
  <link rel="icon" href="<?php printPath('images/favicon.svg'); ?>" type="image/svg+xml">
  <link href="<?php printPath('css/bootstrap.css'); ?>" rel="stylesheet">
  <link href="<?php printPath('css/font-awesome.min.css'); ?>" rel="stylesheet">
  <link href="<?php printPath('css/nht-style.css'); ?>" rel="stylesheet">
  <?php wp_head(); ?>
</head>

<body>

  <nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container">
      <h1 class="navbar-brand">
        <img class="nht-logo" src="<?php printPath('images/nht-logo-white.svg'); ?>" alt="New Hope Tokyo ニューホープ東京">
      </h1>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarToggler">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">ホーム<span lang="en">Home</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">ニューホープについて<span lang="en">About New Hope</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">デボーション<span lang="en">Devotion</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">メッセージ<span lang="en">message</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">礼拝の案内<span lang="en">Service</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">リンク<span lang="en">Links</span></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>