<?php get_header(); ?>
<main>
    <section class="section-post-header">
        <div class="post-header">
            <div class="post-title">
                <h1 class="post-title-h1">
                    <?php the_title(); ?>
                </h1>
                <p class="date">
                    <?php echo get_the_date(); ?>
                </p>

            </div>
            <div class="post-featured-image">
                <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail('full'); ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <section class="post-article">
        <div class="post-content"><?php the_content(); ?></div>
    </section>
</main>
<?php get_footer(); ?>