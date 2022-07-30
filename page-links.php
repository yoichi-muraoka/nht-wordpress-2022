<?php get_header(); ?>

<div class="container after-nav" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Links</li>
    </ol>
</div>

<?php $customPosts = getCustomPosts('links', -1);  ?>
<?php if ($customPosts->have_posts()) : ?>
    <div class="container">
        <h2 class="text-center mb-4">
            <span class="section-title-en">Links</span>
            <span class="section-title-ja">関連リンク</span>
        </h2>
        <hr>
        <div class="row">
            <?php while ($customPosts->have_posts()) : $customPosts->the_post(); ?>
                <div class="col-md-6 col-lg-4 text-center">
                    <div class="pb-4">
                        <h3>
                            <span class="d-inline-block mb-0 h4 fw-normal"><?php the_field('link_title_en'); ?></span><br>
                            <span class="d-inline-block mt-0 h6 fw-normal"><?php the_title(); ?></span><br>
                        </h3>
                        <a class="btn text-white w-75" style="background: <?php the_field('button_color'); ?>;" 
                           href="<?php the_field('link_url'); ?>"
                           target="<?php echo str_contains(get_field('link_url'), 'newhope.jp') ? '_self' : '_blank'; ?>">
                               <?php the_field('button_label'); ?>
                        </a>
                    </div>
                </div>
            <?php endwhile;
            wp_reset_postdata(); ?>
        </div>
    </div>
<?php endif; ?>

<?php get_footer(); ?>