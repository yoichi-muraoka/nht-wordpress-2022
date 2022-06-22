<div id="reading-plan">
    <?php require(get_stylesheet_directory() . '/parts/loading.php'); ?>
</div>

<template id="reading-plan-fragment" data-api-url="<?php echo home_url('/devotion/api'); ?>">
    <div class="text-center">
        <a class="btn btn-secondary text-white mb-2" href="" target="_blank">
            <!-- 日本語聖書箇所 -->
        </a>
        <a class="btn btn-secondary text-white mb-2" href="" target="_blank">
            <!-- 英語聖書箇所 -->
        </a>
    </div>
</template>

<template id="reading-plan-fail-fragment" data-api-url="<?php echo home_url('/devotion/api'); ?>">
    <div class="text-center">
        <p>聖書箇所の読み込みに失敗しました。</p>
        <p>Fail to load today's devotion plan.</p>
    </div>
</template>

<script>
    async function setReadingPlan(url) {
        const res = await fetch(url);
        const json = await res.json();

        const readingPlan = document.getElementById('reading-plan');
        let elementToAppend;
        if (json.status == 400) {
            const fragment = document.getElementById('reading-plan-fail-fragment');
            elementToAppend = document.importNode(fragment.content, true);
        } else {
            const fragment = document.getElementById('reading-plan-fragment');
            elementToAppend = document.importNode(fragment.content, true);
            const baseUrl = 'https://www.biblegateway.com/passage/?search=' + json.plans[1].replaceAll('/', ';');
            const jp = elementToAppend.querySelector('a:nth-child(1)');
            const en = elementToAppend.querySelector('a:nth-child(2)');
            jp.href = baseUrl + '&version=JLB';
            jp.innerText = json.plans[0];
            en.href = baseUrl + '&version=NIV';
            en.innerText = json.plans[1];
        }
        readingPlan.querySelector('.loading').remove();
        readingPlan.append(elementToAppend);
    }

    window.addEventListener('load', (event) => {
        // 今日の日付
        const today = new Date();
        const m = today.getMonth() + 1;
        const d = today.getDate();

        // リクエストURL
        const url = document.getElementById('reading-plan-fragment').getAttribute('data-api-url') +
            '?_month=' + m + '&_day=' + d;
        setReadingPlan(url);
    });
</script>