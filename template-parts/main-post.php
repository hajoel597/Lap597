<div class="main-post">
    <a href="<?php the_permalink(); ?>" class="post-link-wrapper">
        <div class="main-title">
            <h1 class="main-title-h1">
                <?php the_title(); ?>
            </h1>
            <p class="excerpt">
                <?php 
                $excerpt = get_the_excerpt(); 
                $display_excerpt = !empty( $excerpt ) ? $excerpt : '요약문 준비 중'; 
                echo $display_excerpt;
            ?>
            </p>
            <p class="date">
                <?php echo get_the_date(); ?>
            </p>
        </div>
        <div class="main-image">
            <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail('full'); ?>
            <?php else : ?>
            <div class="no-image-box">
                <span class="no-image material-symbols-outlined">bid_landscape_disabled</span>
                <p>No Image Provided</p>
            </div>
            <?php endif; ?>
        </div>
    </a>
</div>