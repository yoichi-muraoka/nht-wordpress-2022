<?php get_header(); ?>

<div class="container after-nav" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">News</li>
    </ol>
</div>

<?php $customPosts = getCustomPosts('news', -1);  ?>
<?php if ($customPosts->have_posts()) : ?>
    <section id="news" class="">
        <h2 class="display-6 text-center mb-2">NEWS</h2>
        <?php while ($customPosts->have_posts()) : $customPosts->the_post(); ?>
            <div id="article-<?php h($post->ID); ?>" class="container pt-4">
                <article class="pb-4 border-bottom">
                    <p><span class="d-inline-block bg-secondary px-2 text-white fw-normal"><?php h(get_the_date()); ?> UP</span></p>
                    <h3>
                        <span class="d-inline-block"><?php the_title(); ?></span><br>
                        <span class="d-inline-block"><?php the_field('title_en'); ?></span>
                    </h3>
                    <div><?php the_field('content'); ?></div>
                </article>
            </div>
        <?php endwhile;
        wp_reset_postdata(); ?>
    </section>
<?php endif; ?>

<?php get_footer(); ?>