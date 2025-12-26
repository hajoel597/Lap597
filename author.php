<?php get_header(); ?>

<div class="author-info-section">
    <?php $author_id = get_queried_object_id(); ?>
    <div class="author-image">
        <?php echo get_avatar( $author_id, 90 ); ?>
    </div>
    <div class="author-details">
        <h1 class="author-name"><?php the_author_meta( 'display_name', $author_id ); ?></h1>
        <?php 
        $author_description = get_the_author_meta( 'description', $author_id ); 
        if ( ! empty( $author_description ) ) : ?>
        <p class="author-bio"><?php echo nl2br( esc_html( $author_description ) ); ?></p>
        <?php else : ?>
        <p class="author-bio no-bio">소개글이 없습니다.</p>
        <?php endif; ?>
    </div>
</div>

<div class="container">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="home-list-muilt-container">
        <div class="image">
            <a href="<?php the_permalink(); ?>">
                <?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'medium' ); } ?>
            </a>
            <div class="category-link">
                <?php the_category( ', ' ); // 이 함수는 자동으로 <a>태그를 생성합니다. ?>
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
                        // 요약문이 없을 때 직접 p 태그 출력
                        echo '<p class="excerpt">요약문 준비 중</p>';
                    } else {
                        // 요약문이 있을 때 태그를 제거한 순수 텍스트만 가져와 p.excerpt로 감싸서 출력
                        echo '<p class="excerpt">' . wp_strip_all_tags( $excerpt ) . '</p>';
                    }
                    ?>
                    <p class="date"><?php echo get_the_date(); ?></p>
                </div>
                <!-- 작성자 본인 페이지이므로 링크가 굳이 필요 없다면 <a>를 빼도 되지만, 구조 유지를 위해 남겨둡니다. -->
                <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" class="author">
                    <div class="author-photo"><?php echo get_avatar( get_the_author_meta( 'ID' ), 40 ); ?></div>
                    <div class="author-name"><?php the_author(); ?></div>
                </a>
            </div>
        </div>
    </div>

    <?php endwhile; ?>
    <?php else : ?>
    <p>해당 작성자가 쓴 글이 없습니다.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>