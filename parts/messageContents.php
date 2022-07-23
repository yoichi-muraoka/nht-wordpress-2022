<div id="message-note" class="toggle-show_hide">
    <section class="container my-3">
        <div class="mt-2">
            <p class="h6 d-inline-block bg-secondary text-white py-1 px-3"><?php the_title(); ?></p>
        </div>
        <div class="mt-2">
            <h2 class="h3">
                <span class="d-block"><?php the_field('title_ja'); ?></span>
                <span class="d-block"><?php the_field('title_en'); ?></span>
            </h2>
        </div>
        <div class="mt-4 d-flex align-items-center">
            <div class="me-4">
                <?php $photo = wp_get_attachment_url(get_post_meta(get_field('messanger_id'), 'photo',true)); ?>
                <img class="border rounded-circle" src="<?php h($photo); ?>" width="80">
            </div>
            <div class="">
                <span class="d-block h6"><?php echo get_post_meta(get_field('messanger_id'), 'name_ja', true); ?></span>
                <span class="d-block h6"><?php echo get_the_title(get_field('messanger_id')); ?></span>
            </div>
        </div>
        <div class="mt-4 d-flex align-items-center">
            <div class="text-center me-4" style="width: 80px;">
                <img class="" src="<?php printPath('images/bible-icon.svg'); ?>" width="50">
            </div>
            <div class="">
                <?php 
                    $verses = explode('/', get_field('bible_verse')); 
                    $bibleGatewayUrl = 'https://www.biblegateway.com/passage/?search=' . str_replace('・', ';', $verses[1]) . '&version=';
                ?>
                <a class="d-block" target="_blank" href="<?php echo $bibleGatewayUrl . 'JLB'; ?>"><?php h($verses[0]); ?></a>
                <a class="d-block" target="_blank" href="<?php echo $bibleGatewayUrl . 'NIV'; ?>"><?php h($verses[1]); ?></a>
            </div>
        </div>
        <div class="mt-4">
            <a class="btn btn-primary text-white" href="">Download Message Note (PDF)</a>
        </div>

        <hr class="my-4">

        <section id="note-ja">
            <h2 class="px-2 py-3 bg-secondary text-white text-center">
                <?php the_field('title_ja'); ?>
            </h2>
            <div class="mt-4">
                <?php the_field('message_note_ja'); ?>
            </div>
            <button class="btn btn-primary text-white fill" data-lang="ja">ブランクを埋める<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                </svg></button>
            <button class="btn btn-primary text-white  copy" data-lang="ja">クリップボードにコピー<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                    <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                    <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                </svg></button>
        </section>

        <hr class="my-4">

        <section id="note-en">
            <h2 class="px-2 py-3 bg-secondary text-white text-center">
                <?php the_field('title_en'); ?>
            </h2>
            <div class="mt-4">
                <?php the_field('message_note_en'); ?>
            </div>
            <button class="btn btn-primary text-white fill" data-lang="en">Fill Blanks<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                </svg></button>
            <button class="btn btn-primary text-white copy" data-lang="en">Copy to clipboard<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                    <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                    <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                </svg></button>
        </section>
    </section>
</div><!-- /#message-note -->

<!-- YouTube動画埋め込み -->
<div id="video" class="toggle-show_hide container pt-4 pb-2 d-none">
    <div class="video-responsive">
        <?php the_field('video_iframe'); ?>
    </div>
</div>