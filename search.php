<?php get_header(); ?>

<div class="container">
    <div class="search-header" style="margin-bottom: 30px;">
        <h1 class="search-title">
            <?php 
            /* 검색어 출력 */
            printf( esc_html__( '"%s"에 대한 검색 결과', 'textdomain' ), '<span>' . get_search_query() . '</span>' ); 
            ?>
        </h1>
    </div>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="home-list-muilt-container">
        <div class="image">
            <a href="<?php the_permalink(); ?>">
                <?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'medium' ); } ?>
            </a>
            <div class="category-link">
                <?php the_category( ', ' ); ?>
            </div>
        </div>
        <div class="desc">
            <div class="header">
                <h1 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            </div>
            <div class="footer">
                <div class="meta">
                    <h4 class="category mobile"><?php the_category( ', ' ); ?></h4>
                    <?php
                    $excerpt = get_the_excerpt(); 
                    if ( empty( $excerpt ) ) {
                        echo '<p class="excerpt">요약문 준비 중</p>';
                    } else {
                        // 검색어 강조를 위해 wp_strip_all_tags 사용 유지
                        echo '<p class="excerpt">' . wp_strip_all_tags( $excerpt ) . '</p>';
                    }
                    ?>
                    <p class="date"><?php echo get_the_date(); ?></p>
                </div>
                <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" class="author">
                    <div class="author-photo"><?php echo get_avatar( get_the_author_meta( 'ID' ), 40 ); ?></div>
                    <div class="author-name"><?php the_author(); ?></div>
                </a>
            </div>
        </div>
    </div>
    <?php endwhile; ?>

    <!-- 페이지네이션 추가 (검색 결과가 많을 경우 대비) -->
    <div class="pagination">
        <?php the_posts_pagination(); ?>
    </div>

    <?php else : ?>
    <div class="no-results">
        <h2>검색 결과가 없습니다.</h2>
        <p>다른 키워드로 다시 검색해 보세요.</p>
        <?php get_search_form(); // 결과가 없을 때 다시 검색할 수 있는 폼 출력 ?>
    </div>
    <?php endif; ?>
</div>

<?php get_footer(); ?>