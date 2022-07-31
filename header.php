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

<body id="<?php h(getSlug()) ?>">

  <nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container">
      <h1 class="navbar-brand">
        <img class="nht-logo" src="<?php printPath('images/nht-logo-white.svg'); ?>" alt="New Hope Tokyo ニューホープ東京">
      </h1>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarToggler">
        <ul class="navbar-nav me-auto">
          
          <?php foreach(wp_get_nav_menu_items('main_menu') as $menu): ?>
          <li class="nav-item">
            <a class="nav-link active" href="<?php echo $menu->url; ?>">
              <span class="d-block" lang="en"><?php echo $menu->title; ?></span>
              <span class="d-block" lang="ja"><?php echo $menu->attr_title; ?></span>
            </a>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </nav>