<?php get_header(); ?>

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
<?php $customPosts = getCustomPosts('message', 1); ?>
<?php if ($customPosts->have_posts()) : $customPosts->the_post(); ?>
    <div class="container pt-3">
        <p class="h6 d-inline-block bg-secondary text-white py-1 px-3"><?php the_title(); ?></p>
    </div>
    
    <div id="message-note" class="toggle-show_hide">
        <section class="container my-3">
            <p><?php the_field('messanger'); ?></p>
            <p><?php the_field('bible_verse'); ?></p>
            <p><a href="">PDFダウンロード</a></p>
            <section id="note-ja" class="mb-5">
                <h2 class="display-6"><?php the_field('title_ja'); ?></h2>
                <div><?php the_field('message_note_ja'); ?></div>
                <button class="fill" data-lang="ja">ブランクを埋める<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                    </svg></button>
                <button class="copy" data-lang="ja">クリップボードにコピー<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                        <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                        <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                    </svg></button>
            </section>
            <section id="note-en">
                <h2 class="display-6"><?php the_field('title_ja'); ?></h2>
                <div><?php the_field('message_note_en'); ?></div>
                <button class="fill" data-lang="en">Fill Blanks<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                    </svg></button>
                <button class="copy" data-lang="en">Copy to clipboard<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                        <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                        <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                    </svg></button>
            </section>
        </section>      
    </div><!-- /#message-note -->

    <!-- YouTube動画埋め込み -->
    <div id="video" class="toggle-show_hide container py-4 d-none">
        <div class="video-responsive">
            <?php the_field('video_iframe'); ?>
        </div>
    </div>
<?php wp_reset_postdata();
endif; ?>

<!-- アナウンス(新着情報) -->
<section id="announce" class="toggle-show_hide container d-none">
    <h2>Announce</h2>
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

<script src="<?php printPath('js/message-note.js'); ?>"></script>
<?php get_footer(); ?>