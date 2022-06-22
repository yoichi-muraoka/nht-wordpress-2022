<?php
require_once(get_stylesheet_directory() . '/utility/devotion.func.php');
$annualPlan = getReadingPlan();
$englishMonths = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
?>

<div class="row">
    <h2><span class="section-title-en">Reading Plan</span><span class="section-title-ja">聖書通読表</span></h2>
</div>

<!-- 月ボタン -->
<div class="col-xs-12 col-md-6">
    <ul class="row month-buttons">
        <?php for ($m = 1; $m <= 12; $m++) : ?>
            <li class="col-xs-2 col-md-4">
                <a class="month-button" href=""><?php h($m); ?></a>
            </li>
        <?php endfor; ?>
    </ul>
</div>

<!-- 通読表 -->
<div class="col-xs-12 col-md-6">
    <div class="col-xs-12">
        <p>通読表をクリックすると、Bible Gatewayというウェブページが開き、該当の聖書箇所を読むことができます。<br>
            By clicking the Scriptures, you can read the passage on Bible Gateway web service.</p>
    </div>
    <?php for ($m = 1; $m <= 12; $m++) : ?>
        <dl class="monthly-plan">
            <dt><?php h($m); ?>月 / <?php h($englishMonths[$m - 1]) ?></dt>
            <dd>
                <ol>
                    <?php foreach ($annualPlan[$m - 1] as $daylyPlan) : ?>
                        <?php
                        $url = 'https://www.biblegateway.com/passage/?search=' .
                            urlencode(str_replace('/', ';', $daylyPlan[1]));
                        ?>
                        <li>
                            <a target="_blank" href="<?php echo $url . '&version=JLB' ?>">
                                <?php echo htmlspecialchars($daylyPlan[0], ENT_QUOTES); ?>
                            </a>
                            /
                            <a target="_blank" href="<?php echo $url . '&version=NIV' ?>">
                                <?php h($daylyPlan[1]); ?>
                            </a>
                        </li>
                    <?php endforeach; //month -> day 
                    ?>
                </ol>
            </dd>
        </dl>
    <?php endfor; //annual -> month 
    ?>
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
                e.preventDefault();
                document.querySelector('.monthly-plan.current-month').classList.remove('current-month');
                const selector = '.monthly-plan:nth-child(' + e.target.innerHTML + ')';
                console.log(selector)
                document.querySelector(selector).classList.add('current-month');
            });
        }
    });
</script>