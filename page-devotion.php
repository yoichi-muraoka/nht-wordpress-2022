<?php
/*
Template Name: devotion.php
*/
get_header();
?>

<div class="container">
    <!-- About -->
    <section id="devo-about">
        <div class="row">
            <div class="col">
                <h2><span class="section-title-en">Devotion</span><span class="section-title-ja">デボーションとは？</span></h2>
                <p>デボーションとは、聖書を読み、祈ることを通じて、神と共に時間を過ごすことです。それによって、私たちの信仰が強く深く成長します。</p>
                <p class="bible-verse">「それからイエスは出て、いつものようにオリーブ山に行かれ…」(ルカ22:39)<br>
                    「しかし、イエスご自身は、よく荒野に退いて祈っておられた。」(ルカ5:16)</p>
                <p>イエス様もデボーションを習慣にしておられました。父なる神とともに過ごす時間を毎日取られたのです。ですから、私たちも神さまと過ごすための時間を毎日取りましょう。</p>
            </div>
            <div class="col">
                <p>Devotion is for our faith to grow deep and strong as you read the Bible and spend a time with God.</p>
                <p class="bible-verse">"Jesus came out and proceeded as was His custom to the Mount of Olives." (Luke 22:39)<br>
                    "Jesus often withdrew to lonely places and prayed." (Luke 5:16)</p>
                <p>Devotions was a habit for Jesus. As Jesus spent His time with the Father, let us follow His footsteps to spend the time with God every day!</p>
                <!-- <button class="btn">詳しく / Read More</button> -->
            </div>
        </div><!-- /.row -->
    </section>
    
    <!-- Journaling -->
    <section id="devo-journaling">
        <div class="row">
            <div class="col">
                <h2><span class="section-title-en">Journaling</span><span class="section-title-ja">ジャーナリングについて</span></h2>
                <p>ジャーナリングとは、神があなたに語られたことをジャーナル/日記に書き留めることです。聖書の中には「イスラエルの神、主はこう仰せられる。『わたしがあなたに語ったことばをみな、書物に書き記せ。』」（エレミヤ30:2）という一節があります。<br>
                    ジャーナリングによって、聖書からの知恵を受け取ることができます。ジャーナルは古代のメンターたちから受け継いだ神の知恵を貯めておく宝箱なのです。ジャーナリングの習慣は、あなたの人生を変えることのできる大切な習慣です。ぜひ毎日少しずつ続けてみてください。あなたにある神様の個人的な声を必ず聞くことができるでしょう。</p>
                <p>We encourage the people in our church to do "journaling" for according to our daily Bible reading. Journaling is writing down what God says to you. "This is what the Lord, the God of Israel, says; "Write in a book all the words I have spoken to you." (Jeremiah 30:2)<br>
                    Your journal is the garnering of wisdom, the gathering place of divine insight you’ll receive from the mentors of the ages. You may not be familiar with the program in the beginning, but we challenge you to develop this new habit. It changes your life. Please keep trying one step at a time! Soon You will start hearing His voice personally.</p>
            </div><!-- .col -->
        </div><!-- /.row -->
    </section>
    
    <!-- SOAP -->
    <section id="devo-soap">
        <div class="row">
            <h2><span class="section-title-en">SOAP Method</span><span class="section-title-ja">SOAP方式とは</span></h2>
            <section>
                <p>ジャーナリングといっても、聖書のどの部分を読み、何を書いていいのか、わからないかもしれません。そこでニューホープでは、SOAP方式という方法を推奨しています。SOAPは石鹸という意味の英単語ですが、Scripture(聖書の言葉), Observation(考察), Application(自分への適用), Prayer(祈り)の頭文字で構成されています。</p>
                <p>We reccomend journaling with SOAP method which is the accronym of Scripture, Observation, Application and Prayer.</p>
            </section>
    
            <section class="row">
                <div class="col-xs-12 col-md-5">
                    <h4>1) Scripture (聖書の言葉)</h4>
                    <p>まず<a href="#devo-schedule">聖書通読表</a>から通読箇所を読んで、神様が語っておられると思われる聖書の言葉をノートに写し出しましょう。</p>
                    <p>Open your Bible to the reading found under today's date of your Bible bookmark.<br>
                        When you are done, look for a verse that particularly spoke to you that day, and write it in your journal. (Link: <a href="#devo-schedule">Bible Reading Plan</a>)
                    </p>
                </div>
                <div class="col-xs-12 col-md-5 col-md-offset-1">
                    <h4>2) Observation (観察)</h4>
                    <p>聖書箇所を観察し、どんなところが心に残ったか、また発見などを書き記します。</p>
                    <p>What did you observe as you read the scriptures? What did God speak to you? Paraphrase and write this scripture down in your own words, in your journal.</p>
                </div>
            </section>
            <section class="row">
                <div class="col-xs-12 col-md-5">
                    <h4>3) Application (適用)</h4>
                    <p>聖書箇所からどんなことを学んだか、どんなことを自分の生活に適用できるか、どんなことを修正するべきかを書き記しましょう。</p>
                    <p>Personalize what you have read, by asking yourself how it applies to your life right now. Perhaps it is instruction, encouragement, revelation of a new promise, or corrections for a particular area of your life. Write how this scripture can apply to you today.</p>
                </div>
                <div class="col-xs-12 col-md-5 col-md-offset-1">
                    <h4>4) Prayer (祈り)</h4>
                    <p>自分がこのジャーナリングを通して与えられた祈りを書き記しましょう。</p>
                    <p>Write out the prayers which came to you through journaling that day.</p>
                </div>
            </section>
        </div>
    </section>
    
    <!-- Schedule -->
    <section id="devo-schedule">
        <div class="black-filter">
            <?php require_once(get_stylesheet_directory() . '/parts/readingPlanList.php'); ?>
        </div>
    </section>
    
    <!-- Recommendation -->
    <section id="devo-recommendation">
        <div class="row">
            <h2><span class="section-title-en">Recommendation</span><span class="section-title-ja text-white">おすすめの本</span></h2>
        </div>
        <ul class="row">
            <li class="col-sm-12 col-md-4 col-md-offset-2">
                <h4 class="mt-0">LIFEジャーナル</h4>
                <p>SOAP方式のジャーナルです。通読表も付いています！ オンラインショップや毎月最終日曜日の礼拝後に出るリソーステーブルで購入することができます。</p>
                <h4>あなたを導く<br>神様の個人レッスン</h4>
                <p>ニューホープのウェイン先生のデボーションガイド。必読！！ オンラインショップほか、リソーステーブルや、CLC書店（OCCビル2F）で売ってます！</p>
            </li>
            <li class="col-sm-12 col-md-4">
                <h4 class="mt-0">LIFE Journal</h4>
                <p>It's the SOAP method journal with reading plan. You can purchase it at the resource table on the last sunday every month, or our online store.</p>
                <h4>Divine Mentor</h4>
                <p>The Author is Dr. Wayne Cordeiro, who explains why & how you do daily devotion. It's a must read. You can purchase it at the resource table on the last sunday every month, our online store, or Oasis Bookstore on the 2nd Floor of OCC building.</p>
            </li>
        </ul>
        <div class="text-center" style="height: 6em;">
            <a class="onlineshop-btn" target="_blank" href="http://newhope365.ocnk.net/">オンラインショップ / Online Store</a>
        </div>
    </section>
    
    <!-- FAQ -->
    <section id="devo-faq">
        <div class="row">
            <h2><span class="section-title-en">FAQ</span><span class="section-title-ja">デボーションに関するよくある悩みや質問</span></h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <dl>
                    <dt>聖書のバージョンは何を使えばいいですか？<br>Which Bible should we use?</dt>
                    <dd>日本語であれば新改訳や新共同訳、英語であればNIV(New International Version), NASB(New American Standard Bible)などがおすすめです。<br>For English speakers, NIV, NASB are commonly used at our church.</dd>
                    <dt>聖書が難しすぎてよくわからない<br>The Bible is too difficult to understand.</dt>
                    <dd>まずはガイドブックなどを読んでみると良いでしょう。マンガやこども聖書アプリもおすすめです。<br>You may pick up Christian Bible study and references. Manga, Kids Bible App are also recommended.</dd>
                    <dt>なかなか続けられずに3日坊主になってしまいます。<br>Devotion is difficult to continue.</dt>
                    <dd>みんなそうです！祈り聖霊の助けを受ける必要があります。<br>Yes, it is difficult for everyone. Please pray and ask the Holy Spirit to help you to read the Bible everyday.</dd>
                    <dt>1日あたりの聖書箇所が多すぎる・長すぎる<br>The passeges to read for one day is too much or too long.</dt>
                    <dd>おっしゃる通りですが、通読したことがない人は、まずは通読してみるのが大事です！読みやすい新約聖書箇所から読み始めてもよいでしょう。<br>We urge you to give a try for a while. You may start reading from New Testament passages since it may be a little easier.</dd>
                    <dt>シェアリングをしたいけれど、相手がみつからない<br>I have no one to share my journal.</dt>
                    <dd>まずは祈ってみましょう！また、礼拝後に牧師やスタッフ、Welcomeテーブルの人などに相談してみてください。<br>You can pray for a journal sharing partner. Stop by at our welcome table, talk to pastors or staff.</dd>
                    <dt>LIFEジャーナルを使わなければいけないの？<br>Do I need to use LIFE Journal book?</dt>
                    <dd>そのようなことはありません。お好きなノートをお使いください！デジタル化している人もいます。<br>No. You may use any journal you like. Some use computer to journal.</dd>
                </dl>
            </div>
            <div class="col-md-6">
                <dl>
                    <dt>必ずこの聖書通読表でやらなければいけないの？<br>Do I need to follow the reading plan?</dt>
                    <dd>そんなことないけれど、同じところを読んでいるとシェアする仲間が増えますよ<br>No, but if you are on our program, it may be easier to share your journal with someone on the same page.</dd>
                    <dt>朝も夜もなかなか時間が取れません<br>It is difficult to find a time to do devotion in the morning or at night.</dt>
                    <dd>1日の中で一番大切な時間を神様に捧げるのが理想です。しかしながら、忙しい現代人はなかなか時間を取れません！通勤の電車で10分でも聖書に触れる時間をとってください。完璧をめざさず、神様との時間を取る、ということを目標に。<br>We give our time to God when we are at best. We are all busy today. Even 10 minutes of reading the Bible on commuting would help you. You don't have to follow the plan perfectly. Please enjoy the time you have with God.</dd>
                    <dt>親子で一緒にやりたいです<br>I want to do devotion with my children.</dt>
                    <dd>こども用のプログラムがあり、親子で同じ箇所を読んでいきますので、ぜひご活用ください。<br>You can pick up "Kid's Journal", and parents can join its reading plan to do devotion with your children.</dd>
                    <dt>毎年、年末の時期に黙示録が来て気分が暗くなる<br>Reading the book of Revelation is depressing each year..</dt>
                    <dd>その気持ちはわかりますが、実は黙示録は恵みの書なんです！！<br>The Book of Revelation is filled with God's blessings for us. Let us discover it!</dd>
                    <dt>数字に弱く、民数記を読んでいると眠くなってしまいます<br>I don't like numbers, and I fall on sleep when I read the book of Numbers.</dt>
                    <dd>その気持ちはわかりますが、実は数字には神様の恵みが現れているのですよ！！<br>There are meanings & His blessings even in the numbers that the Bible gives. You can glean the gem from them as well.</dd>
                    <dt>自分が勝手に解釈してしまっている気がする<br>Do I interpret the Bible accurately?</dt>
                    <dd>毎日続けることで、間違った解釈も少しずつ聖霊が正してくれます。それでも不安な方は、牧師やスタッフにご相談ください。<br>As you continue reading the Bible every day, the Holy Spirit teaches, guides, and corrects us to the right understanding. If you have a question, please do not hesitate to ask questions to pastors or staff.</dd>
                </dl>
            </div>
        </div>
    </section>
    
    <section id="soap-footer-image">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/banners/life-journal.png" />
    </section>
</div>
<?php get_footer(); ?>