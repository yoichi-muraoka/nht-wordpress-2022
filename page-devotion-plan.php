<?php 
/*
Template Name: devotion-plan.php
*/
get_header();
?>

<div class="container after-nav" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo home_url('/devotion'); ?>">Devotion</a></li>
        <li class="breadcrumb-item active" aria-current="page">Reading Plan</li>
    </ol>
</div>

<section id="devotion-schedule" class="py-4" style="background: none;">
    <div class="container">
        <?php require_once(get_stylesheet_directory() . '/parts/readingPlanList.php'); ?>
    </div>
</section>

<?php get_footer(); ?>