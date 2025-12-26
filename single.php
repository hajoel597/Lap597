<?php 
/**
 * The template for displaying all single posts
 *
 * @link developer.wordpress.org
 *
 * @package Your_Theme_Name // 테마 이름으로 변경해주세요.
 */

get_header(); ?>

<?php
    // Start the Loop.
    while ( have_posts() ) :
        the_post();

        // 게시물 메타데이터 가져오기
        $categories = get_the_category(); // 변수명을 $categories (복수형)로 변경하여 혼동 방지
        $date_format = get_the_date();
        $author_name = get_the_author();
        $author_photo_url = get_avatar_url( get_the_author_meta( 'ID' ), array('size' => 96) ); // 작성자 아바타 URL 가져오기
        
        // 워드프레스의 '요약' 필드 내용을 가져옵니다.
        $excerpt = get_post_field( 'post_excerpt', get_the_ID() );
    ?>

<div class="page-header">
    <div class="image">
        <?php 
            // 대표 이미지가 있을 경우 출력
            if ( has_post_thumbnail() ) {
                the_post_thumbnail('full'); // 'full', 'large', 'medium' 등 원하는 이미지 크기로 변경 가능
            } else {
                // 대표 이미지가 없을 경우 대체 콘텐츠
                echo '<div class="placeholder-image">이미지 없음</div>';
            }
            ?>
    </div>
    <div class="desc">
        <div class="header">
            <h1 class="title"><?php the_title(); // 게시물 제목 ?></h1>
            <div class="meta">
                <h4 class="category">
                    <?php 
                        // 카테고리가 비어있지 않고 오류가 없을 경우, 첫 번째 카테고리 이름 출력
                        if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
                            echo esc_html( $categories[0]->cat_name ); // 배열의 첫 번째 요소 [0]에 접근
                        } else {
                            echo '카테고리 없음';
                        }
                        ?>
                </h4>

                <!-- '요약' 필드 출력: 비어있을 경우 사용자 지정 문구 표시 -->
                <p class="excerpt">
                    <?php 
                        if ( empty( $excerpt ) ) {
                            echo '요약문 준비 중'; // '요약' 필드가 비어있을 경우 표시할 문구
                        } else {
                            echo esc_html( $excerpt ); 
                        }
                        ?>
                </p>

                <p class="date"><?php echo esc_html( $date_format ); // 게시물 작성일 ?></p>
            </div>
        </div>
        <div class="footer">
            <div class="author">
                <div class="author-photo">
                    <?php if ($author_photo_url): ?>
                    <img src="<?php echo esc_url($author_photo_url); ?>"
                        alt="<?php echo esc_attr($author_name); ?> 프로필 사진">
                    <?php else: ?>
                    <!-- 아바타 없을 시 기본값 -->
                    <div class="default-avatar">1</div>
                    <?php endif; ?>
                </div>
                <div class="author-name"><?php echo esc_html( $author_name ); // 작성자 이름 ?></div>
            </div>
        </div>
    </div>
</div>
<div class="page-text-wrap">
    <div class="page-text">
        <?php the_content(); // 게시물 본문 내용 ?>
    </div>
</div>

<?php
    // 댓글 기능은 이 템플릿에서 사용하지 않습니다.
    // comments_template(); 

    endwhile; // End of the loop.
    ?>

<?php get_footer(); ?>