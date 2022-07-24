<?php
/*
Template Name: message-archives.php
*/
get_header();
?>

<div class="container after-nav" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo home_url('/message'); ?>">Message</a></li>
    <li class="breadcrumb-item active" aria-current="page">Archives</li>
  </ol>
</div>

<?php if (have_posts()) : ?>
  <div class="container">
    <?php while (have_posts()) : the_post(); ?>
      <a class="d-block mt-4 text-decoration-none" href="<?php echo get_the_permalink(); ?>">
        <dl class="message">
          <dt class="mb-2"><span class="d-inline-block bg-secondary px-2 text-white fw-normal"><?php the_title(); ?></span></dt>
          <dd class="text-dark h4 fw-normal mb-0"><?php the_field('title_ja'); ?></dd>
          <dd class="text-dark h5 fw-normal mt-0"><?php the_field('title_en'); ?></dd>
          <dd class="text-dark">
            <?php echo get_post_meta(get_field('messanger_id'), 'name_ja', true); ?> /
            <?php echo get_the_title(get_field('messanger_id')); ?>
          </dd>
        </dl>
      </a>
    <?php endwhile; ?>
  </div>
<?php endif; ?>

<div class="container">
  <?php require_once(get_stylesheet_directory() . '/parts/pagination.php'); ?>
</div>

<?php get_footer(); ?>