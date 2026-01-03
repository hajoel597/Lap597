<?php get_header(); 

$paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
$sections_per_page = 4; // 한 페이지에 표시할 섹션 수
$sub_per_section = 2;   // 한 섹션당 표시할 서브 게시물 수 (기존 4에서 2로 변경)

// 1. 현재 페이지의 main 게시물 가져오기
$args_main = array(
    'posts_per_page'         => $sections_per_page,
    'paged'                  => $paged,
    'tag'                    => 'main',
    'orderby'                => 'date',
    'order'                  => 'DESC',
    'post_status'            => 'publish',
);
$main_query = new WP_Query( $args_main );
$main_posts_current = $main_query->posts;

$used_post_ids = wp_list_pluck( $main_posts_current, 'ID' );

// 2. 현재 페이지의 sub 게시물 가져오기
$args_sub = array(
    // 섹션당 2개씩 가져오도록 계산 (4 섹션 * 2 = 총 8개)
    'posts_per_page'         => $sections_per_page * $sub_per_section, 
    'tag'                    => 'sub', 
    'orderby'                => 'date',
    'order'                  => 'DESC',
    'post__not_in'           => $used_post_ids,
    'post_status'            => 'publish',
    'no_found_rows'          => true,
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
                    // 반복 횟수를 4에서 2($sub_per_section)로 변경
                    for ($j = 0; $j < $sub_per_section; $j++) {
                        if (isset($sub_posts_current[$sub_index])) {
                            global $post; 
                            $post = $sub_posts_current[$sub_index];
                            setup_postdata($post);
                            get_template_part( 'template-parts/content', 'sub' );
                        } else {
                            // 서브 게시물이 부족할 경우 메시지 출력 (선택 사항)
                            echo '<div class="home-list-muilt-container">서브 게시물 준비중</div>';
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
        'total'     => $total_pages == 0 ? 1 : $total_pages,
        'prev_text' => __( '«' ),
        'next_text' => __( '»' ),
        'type'      => 'list',
        'mid_size'  => 0,
        'end_size'  => 1,
    ) );
    
    echo $pagination_html;
    ?>
</div>

<?php get_footer(); ?>