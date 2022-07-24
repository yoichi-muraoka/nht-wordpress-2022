<?php get_header(); ?>

<section id="welcome" class="after-nav">
    <div class="container">
        <h2 class="display-1">ALOHA!</h2>
        <p>アロハ！ニューホープ東京へようこそ！<br>あなたをオハナ(家族)として歓迎します。</p>
        <p>Aloha! We welcome you to New Hope Tokyo <br> as our o'hana (family). </p>
        <p class="mt-5"><a class="btn btn-secondary text-white" href="about">ニューホープ東京について<br><span lang="en">About New Hope Tokyo</span></a></p>
    </div>
</section>

<?php $customPosts = getCustomPosts('news', 5);  ?>
<?php if ($customPosts->have_posts()) : ?>
    <section id="news" class="pt-4 pb-2">
        <div class="container">
            <h2 class="display-6 text-center">NEWS</h2>
            <?php while ($customPosts->have_posts()) : $customPosts->the_post(); ?>
                <a href="news#123">
                    <dl class="news">
                        <dt class="mb-2"><span class="d-inline-block bg-secondary px-2 text-white fw-normal"><?php h(get_the_date()); ?> UP</span></dt>
                        <dd class="text-dark h4 fw-normal mb-0"><?php the_title(); ?></dd>
                        <dd class="text-dark h5 fw-normal mt-0"><?php the_field('title_en'); ?></dd>
                    </dl>
                </a>
            <?php endwhile;
            wp_reset_postdata(); ?>
        </div>
    </section>
<?php endif; ?>

<section id="devotion" class="pt-4 pb-5 bg-amikake-A">
    <div class="container">
        <h2 class="display-6 text-center mb-4">Today's Devotion</h2>
        <?php require_once(get_stylesheet_directory() . '/parts/readingPlan.php'); ?>
        <div class="mt-4 pt-4 border-top border-white text-center">
            <a class="btn btn-primary text-white mb-2" href="">デボーションについて<br>About Devotion</a>
            <a class="btn btn-primary text-white mb-2" href="">牧師のデボーションを読む<br>Pastor's Devotion Blog</a>
        </div>
    </div>
</section>

<?php $customPosts = getCustomPosts('message', 4); ?>
<?php if ($customPosts->have_posts()) : ?>
    <section id="message" class="pt-4 pb-4">
        <div class="container">
            <h2 class="display-6 text-center mb-4">MESSAGE</h2>
            <?php while ($customPosts->have_posts()) : $customPosts->the_post(); ?>
                <a class="d-block mt-4" href="<?php echo get_the_permalink(); ?>">
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
            <?php endwhile; wp_reset_postdata(); ?>
            <div class="text-center my-5">
                <a class="btn btn-primary text-white me-2" href="<?php h(home_url('/archives/message')); ?>">アーカイブを見る<br>Show Archives</a>
                <a class="btn btn-primary text-white ms-2" href="https://www.youtube.com/channel/UCQ8mwkP818Y5wHMY_UdxhZw" target="_blank">過去のメッセージ動画<br>YouTube Channel</a>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php $customPosts = getCustomPosts('service-info', 10);  ?>
<?php if ($customPosts->have_posts()) : ?>
    <section id="service-info" class="pt-4 pb-4 bg-amikake-A">
        <div class="container">
            <h2 class="display-6 text-center mb-4">SERVICE</h2>
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