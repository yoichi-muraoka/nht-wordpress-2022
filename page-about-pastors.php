<?php 
/*
Template Name: about-pastors.php
*/
get_header();
?>

<div class="container after-nav" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo home_url('/about'); ?>">About</a></li>
    <li class="breadcrumb-item active" aria-current="page">Pastors</li>
  </ol>
</div>

<section id="leaders" class="w-100 overflow-hidden">
    <div class="container">
        <h2 class="text-center">
            <span class="section-title-en">Pastors At New Hope</span>
            <span class="section-title-ja">ニューホープの牧師たち</span>
        </h2>
        <div class="row">
            <div class="leader-box py-4 text-center">
                <p class="leader-photo"><img class="w-75 border rounded-circle" src="<?php printPath('images/about_pastor-talo.jpg') ?>" alt=""></p>
                <p class="leader-title"><span class="leader-title-ja">主任牧師</span><span class="leader-title-en">Senior Pastor</span></p>
                <p class="leader-name"><span class="leader-name-ja">タロ・サタラカ</span><span class="leader-name-en">Talo Sataraka</span></p>
            </div>
            <div class="leader-box py-4 text-center">
                <p class="leader-photo"><img class="w-75 border rounded-circle" src="<?php printPath('images/about_pastor-isaku.jpg') ?>" alt=""></p>
                <p class="leader-title"><span class="leader-title-ja">副牧師 / 育成担当ディレクター</span><span class="leader-title-en">Assistant Pastor / Director of Edification</span></p>
                <p class="leader-name"><span class="leader-name-ja">加藤 以幸</span><span class="leader-name-en">Isaku Kato</span></p>
            </div>
            <div class="leader-box py-4 text-center">
                <p class="leader-photo"><img class="w-75 border rounded-circle" src="<?php printPath('images/about_pastor-peter.png') ?>" alt=""></p>
                <p class="leader-title"><span class="leader-title-ja">副牧師 / フロントライン・リーダー</span><span class="leader-title-en">Assistant Pastor / Frontline leader</span></p>
                <p class="leader-name"><span class="leader-name-ja">ピーター・マリンズ</span><span class="leader-name-en">Peter Malins</span></p>
            </div>
            <div class="leader-box py-4 text-center">
                <p class="leader-photo"><img class="w-75 border rounded-circle" src="<?php printPath('images/about_pastor-toru.jpg') ?>" alt=""></p>
                <p class="leader-title"><span class="leader-title-ja">副牧師</span><span class="leader-title-en">Assistant Pastor</span></p>
                <p class="leader-name"><span class="leader-name-ja">真島亨</span><span class="leader-name-en">Toru Majima</span></p>
            </div>
            <div class="leader-box py-4 text-center">
                <p class="leader-photo"><img class="w-75 border rounded-circle" src="<?php printPath('images/about_leader-wataru.png') ?>" alt=""></p>
                <p class="leader-title"><span class="leader-title-ja">伝道担当ディレクター</span><span class="leader-title-en">Director of Evangelism</span></p>
                <p class="leader-name"><span class="leader-name-ja">浜崎 渉</span><span class="leader-name-en">Wataru Hamazaki</span></p>
            </div>
            <div class="leader-box py-4 text-center">
                <p class="leader-photo"><img class="w-75 border rounded-circle" src="<?php printPath('images/about_pastor-shintaro.png') ?>" alt=""></p>
                <p class="leader-title"><span class="leader-title-ja">ニューホープ東京　成増サテライト教会牧師</span><span class="leader-title-en">NHT Narimasu Satellite Church Pastor</span></p>
                <p class="leader-name"><span class="leader-name-ja">渡辺 真太郎</span><span class="leader-name-en">Shintaro Watanabe</span></p>
            </div>
        </div>
    </div>
</section>

<div class="container my-5">
    <a href="<?php echo home_url('/about/background'); ?>" class="btn btn-secondary text-white w-100 mb-2">これまでの歩み <span>Our Background</span></a>
</div>

<?php get_footer(); ?>