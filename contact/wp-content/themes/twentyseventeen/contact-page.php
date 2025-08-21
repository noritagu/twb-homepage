<?php
/*
Template Name: お問い合わせページ 入力
*/

get_header('twb');
?>
    <!--page_ttl-->
    <div id="page_ttl" class="contact_bg">
        <h2>お問い合わせ</h2>
    </div>
    <div id="pan"><a href="/index.html">HOME</a> > お問い合わせ</div>
    <!--/.page_ttl END-->


    <div id="main_contents">

        <!--inner2-->
        <div class="inner2">

            <h3 class="ttl_02">お急ぎの方は下記電話番号から<br>お問い合わせください</h3>
            <p class="contact_tel"><img src="/images/page/contact/contact_tel.jpg?id=1234" alt="TEL:048-423-9832 営業時間 10：00～19：00 "></p>

            <h3 class="ttl_02">お問い合わせフォーム</h3>
            <p class="contact_txt"><span class="c_red">【※必須】</span>は必須入力になります</p>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; else: ?>
                <p><?php echo "お探しの記事、ページは見つかりませんでした。"; ?></p>
            <?php endif; ?>
            <p class="privacy_policy"><a href="/privacy.html" target="_blank">プライバシーポリシー</a></p>
        </div>
        <!--/.inner2 END-->

    </div>

<?php
get_footer('twb');
?>