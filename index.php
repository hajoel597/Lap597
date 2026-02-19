<?php get_header(); ?>

<?php
/**
 * 1. 데이터 준비 로직
 */
$sets_per_page = 2; // 한 페이지에 2세트(총 6개) 노출
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

// 메인 쿼리
$main_query = new WP_Query(array(
    'tag'            => 'main',
    'posts_per_page' => $sets_per_page,
    'paged'          => $paged,
    'post_status'    => 'publish'
));
$main_posts = $main_query->posts;

// 서브 쿼리 (메인 ID 제외)
$sub_query = new WP_Query(array(
    'tag'            => 'sub',
    'posts_per_page' => $sets_per_page * 2,
    'paged'          => $paged,
    'post__not_in'   => wp_list_pluck($main_posts, 'ID'),
    'post_status'    => 'publish'
));
$sub_posts = $sub_query->posts;
?>

<main class="site-main">
    <?php 
    for ( $i = 0; $i < $sets_per_page; $i++ ) : 
        if ( isset($main_posts[$i]) ) :
            $post = $main_posts[$i];
            setup_postdata($post);
    ?>
    <section class="section-main">
        <?php get_template_part('template-parts/main-post'); ?>
    </section>

    <?php 
        else : 
    ?>
    <section class="section-main">
        <div class="main-post">
            <div class="main-title">
                <h1 class="main-title-h1">Next Main Entry</h1>
                <p class="excerpt">새로운 메인 소식이 곧 업데이트될 예정입니다.</p>
                <p class="date"><?php echo date('Y.m.d'); ?></p>
            </div>
            <div class="main-image">
                <div class="no-image-box">
                    <span class="material-symbols-outlined">bid_landscape_disabled</span>
                    <p>Coming Soon</p>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <section class="section-sub">
        <?php 
            for ( $j = $i * 2; $j < ($i * 2) + 2; $j++ ) :
                if ( isset($sub_posts[$j]) ) :
                    $post = $sub_posts[$j];
                    setup_postdata($post);
                    get_template_part('template-parts/sub-post');
                else :
            ?>
        <div class="sub-post">
            <div class="sub-title">
                <h1 class="sub-title-h1">Next Journal Entry</h1>
                <p class="excerpt">새로운 기록이 곧 업데이트될 예정입니다.</p>
                <p class="date"><?php echo date('Y.m.d'); ?></p>
            </div>
            <div class="sub-image">
                <div class="no-image-box">
                    <span class="material-symbols-outlined">bid_landscape_disabled</span>
                    <p>Coming Soon</p>
                </div>
            </div>
        </div>
        <?php endif; endfor;?>
    </section>
    <?php endfor; wp_reset_postdata(); ?>

    <div class="pagination-wrapper">
        <?php 
        echo paginate_links(array(
            'total'   => $main_query->max_num_pages,
            'current' => $paged,
            'prev_text' => '<span class="material-symbols-outlined">chevron_left</span>',
            'next_text' => '<span class="material-symbols-outlined">chevron_right</span>',
        )); 
        ?>
    </div>
</main>

<?php get_footer(); ?>