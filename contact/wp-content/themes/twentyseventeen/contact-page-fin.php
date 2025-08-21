<?php
/*
Template Name: お問い合わせページ 送信完了
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
            <h3 class="ttl_02">お問い合わせフォーム</h3>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; else: ?>
                <p><?php echo "お探しの記事、ページは見つかりませんでした。"; ?></p>
            <?php endif; ?>
        </div>
        <!--/.inner2 END-->

    </div>

<?php
get_footer('twb');
?>