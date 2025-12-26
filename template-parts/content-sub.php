<div class="home-list-muilt-container">
    <div class="image">
        <?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'medium' ); } ?>
        <h4 class="category"><?php the_category( ', ' ); ?></h4>
    </div>
    <div class="desc">
        <div class="header">
            <h1 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
        </div>
        <div class="footer">
            <div class="meta">
                <h4 class="category moblie"><?php the_category( ', ' ); ?></h4>
                <?php
                $excerpt = get_the_excerpt(); 

                if ( empty( $excerpt ) ) {
                    echo '<p class="excerpt">요약문 준비 중</p>';
                } else {
                    // get_the_excerpt()로 내용을 가져온 뒤 직접 p 태그로 감싸며 클래스 부여
                    echo '<p class="excerpt">' . $excerpt . '</p>';
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