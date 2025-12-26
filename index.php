<?php get_header(); 

$paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
$sections_per_page = 4; // 한 페이지에 표시할 섹션 수
$posts_per_section = 5; // 한 섹션당 게시물 수 (1 main + 4 sub)


// 1. 현재 페이지의 main 게시물 가져오기
$args_main = array(
    'posts_per_page'         => $sections_per_page,
    'paged'                  => $paged, // 현재 페이지에 해당하는 메인 게시물만 가져옴
    'tag'                    => 'main',
    'orderby'                => 'date',
    'order'                  => 'DESC',
    'post_status'            => 'publish',
    // 'no_found_rows'는 페이지네이션 계산을 위해 제거
);
$main_query = new WP_Query( $args_main );
$main_posts_current = $main_query->posts;

// 현재 페이지의 main 게시물 ID를 수집합니다.
$used_post_ids = wp_list_pluck( $main_posts_current, 'ID' );

// 2. 현재 페이지의 sub 게시물 가져오기 (main에서 사용된 ID 제외)
$args_sub = array(
    'posts_per_page'         => $sections_per_page * 4, // 필요한 수량만큼만 가져옴
    'tag'                    => 'sub', 
    'orderby'                => 'date',
    'order'                  => 'DESC',
    'post__not_in'           => $used_post_ids, // main에서 사용된 ID 제외
    'post_status'            => 'publish',
    'no_found_rows'          => true, // 성능 최적화
    'update_post_meta_cache' => false,
);
$sub_query = new WP_Query( $args_sub );
$sub_posts_current = $sub_query->posts;

$sub_index = 0;

if ($main_query->have_posts()) {
    while ($main_query->have_posts()) {
        $main_query->the_post();
        ?>

<section class="home-list">
    <div class="home-list-container">
        <?php get_template_part( 'template-parts/content', 'main' ); ?>
        <div class="home-list-muilt">
            <?php
                    for ($j = 0; $j < 4; $j++) {
                        if (isset($sub_posts_current[$sub_index])) {
                            global $post; 
                            $post = $sub_posts_current[$sub_index];
                            setup_postdata($post);
                            get_template_part( 'template-parts/content', 'sub' );
                        } else {
                            echo '<p class="sub-preparation-message">서브 게시물 준비중</p>';
                        }
                        $sub_index++;
                    }
                    ?>
        </div>
    </div>
</section>

<?php
    }
} else {
    echo '<p>표시할 게시물이 없습니다. 관리자 패널에서 게시물을 추가해주세요.</p>';
}

wp_reset_postdata(); ?>

<div class="pagination-wrap">
    <?php
    $total_pages = $main_query->max_num_pages;
        $pagination_html = paginate_links( array(
        'base'      => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
        'format'    => '?paged=%#%',
        'current'   => $paged,
        'total'     => $total_pages == 0 ? 1 : $total_pages, // 총 페이지 수 전달
        'prev_text' => __( '«' ),
        'next_text' => __( '»' ),
        'type'      => 'list', // <ul><li> 형태로 출력
        'mid_size'  => 0,
        'end_size'  => 1,
    ) );
    
    echo $pagination_html;
    ?>
</div>

<?php get_footer(); ?>