<?php
/*
Template Name: single-message.php
*/
get_header();
?>

<div class="container after-nav" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Message</li>
    </ol>
</div>


<div class="nav-tabs">
    <ul class="nav container">
        <li class="nav-item">
            <a class="nav-link active toggler-show_hide" href="#message-note" data-target="#message-note">Message Note</a>
        </li>
        <li class="nav-item">
            <a class="nav-link toggler-show_hide" href="#announce" data-target="#announce">Announce</a>
        </li>
        <li class="nav-item">
            <a class="nav-link toggler-show_hide" href="#video" data-target="#video">Video</a>
        </li>
    </ul>
</div>

<!-- メッセージノート -->
<?php if (is_page('message')) : ?>
    <?php $customPosts = getCustomPosts('message', 1); ?>
    <?php if ($customPosts->have_posts()) : $customPosts->the_post(); ?>
        <?php require_once(get_stylesheet_directory() . '/parts/messageContents.php'); ?>
    <?php wp_reset_postdata();
    endif; ?>
<?php else : ?>
    <?php if (have_posts()) : the_post(); ?>
        <?php require_once(get_stylesheet_directory() . '/parts/messageContents.php'); ?>
    <?php endif; ?>
<?php endif; ?>

<!-- アナウンス(新着情報) -->
<section id="announce" class="toggle-show_hide container d-none pt-4">
    <?php $customPosts = getCustomPosts('news', 5); ?>
    <?php if ($customPosts->have_posts()) : ?>
        <?php while ($customPosts->have_posts()) : $customPosts->the_post(); ?>
            <article class="mb-5">
                <h3><?php the_title(); ?></h3>
                <div><?php the_field('content'); ?></div>
            </article>
        <?php endwhile;
        wp_reset_postdata(); ?>
    <?php else : ?>
        <p>アナウンスはありません。No Announcement</p>
    <?php endif; ?>
</section>

<div class="text-center my-5">
    <a class="btn btn-secondary text-white me-2" href="<?php h(home_url('/archives/message')); ?>">アーカイブを見る<br>Show Archives</a>
    <a class="btn btn-secondary text-white ms-2" href="https://www.youtube.com/channel/UCQ8mwkP818Y5wHMY_UdxhZw" target="_blank">過去のメッセージ動画<br>YouTube Channel</a>
</div>

<script src="<?php printPath('js/message-note.js'); ?>"></script>
<?php get_footer(); ?>