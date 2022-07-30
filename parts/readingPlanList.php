<?php
require_once(get_stylesheet_directory() . '/utility/devotion.func.php');
$annualPlan = getReadingPlan();
$englishMonths = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
?>

<h2 class="text-center mb-4">
    <span class="section-title-en">Reading Plan</span>
    <span class="section-title-ja">聖書通読表</span>
</h2>

<!-- 月ボタン -->
<div class="row">
    <?php $m = 1; ?>
    <?php foreach(getEnglishMonths() as $em): ?>
    <div class="col-3 mb-3">
        <div class="px-1 py-2 bg-secondary text-white text-center month-button" data-month="<?php h($m); ?>">
            <span class="h2"><?php h($m); ?></span>月<br>
            <span class=""><?php h(substr($em, 0, 3)); ?>.</span>
        </div>
    </div>
    <?php $m++; ?>
    <?php endforeach; ?>
</div>

<!-- 通読表 -->
<div>
    <?php $m = 1; ?>
    <?php foreach ($annualPlan as $monthlyPlan) : ?>
        <dl class="monthly-plan">
            <dt class="text-center mb-3"><?php h($m); ?>月 / <?php h(getEnglishMonths()[$m - 1]); ?></dt>
            <dd>
                <ol>
                    <?php $d = 1; ?>
                    <?php foreach ($monthlyPlan as $daylyPlan): ?>
                        <?php
                        $url = 'https://www.biblegateway.com/passage/?search=' .
                            urlencode(str_replace('/', ';', $daylyPlan[1]));
                        ?>
                        <li>
                            <a class="bible-verse" target="_blank" href="<?php echo $url . '&version=JLB' ?>">
                                <span><?php echo str_replace('/', '</span> / <span>', $daylyPlan[0]); ?></span>
                            </a>
                            <span class="day"><?php h($d); ?></span>
                            <a class="bible-verse" target="_blank" href="<?php echo $url . '&version=NIV' ?>">
                                <span><?php echo str_replace('/', '</span> / <span>', $daylyPlan[1]); ?></span>
                            </a>
                        </li>
                    <?php $d++; ?>
                    <?php endforeach; //month -> day ?>
                </ol>
            </dd>
        </dl>
    <?php $m++; ?>
    <?php endforeach; //annual -> month  ?>
    <div>
        <p>通読表をクリックすると、Bible Gatewayというウェブページが開き、該当の聖書箇所を読むことができます。<br>
            By clicking the Scriptures, you can read the passage on Bible Gateway web service.</p>
    </div>
</div>

<script>
    // その日の聖書箇所をハイライト
    window.addEventListener('load', (event) => {
        const today = new Date();
        const m = today.getMonth() + 1;
        const d = today.getDate();

        const monthSelector = `.monthly-plan:nth-child(${m})`
        document.querySelector(monthSelector).classList.add('current-month');
        const daySelector = `.monthly-plan:nth-child(${m}) li:nth-child(${d})`;
        document.querySelector(daySelector).classList.add('today');

    });

    // クリックされた月のスケジュールを表示
    window.addEventListener('load', (event) => {
        const buttons = document.querySelectorAll('.month-button');
        for (button of buttons) {
            button.addEventListener('click', (e) => {
                document.querySelector('.monthly-plan.current-month').classList.remove('current-month');
                const selector = '.monthly-plan:nth-child(' + e.currentTarget.getAttribute('data-month') + ')';
                document.querySelector(selector).classList.add('current-month');
            });
        }
    });
</script>