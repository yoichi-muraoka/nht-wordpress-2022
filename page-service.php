<?php get_header(); ?>

<div class="container after-nav" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Service</li>
    </ol>
</div>

<?php $customPosts = getCustomPosts('service-info', -1);  ?>
<?php if ($customPosts->have_posts()) : ?>
    <section id="service-info" class="pt-4 pb-4">
        <div class="container">
        <h2 class="text-center mb-4">
            <span class="section-title-en">Service</span>
            <span class="section-title-ja">礼拝の案内</span>
        </h2>
            <?php while ($customPosts->have_posts()) : $customPosts->the_post(); ?>
                <section class="pb-4">
                    <h3 class="bg-secondary text-white text-center py-2 mb-2">
                        <?php the_title(); ?><br>
                        <span class="h5"><?php the_field('title_en'); ?></span>
                    </h3>
                    <div><?php the_field('content'); ?></div>
                </section>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>