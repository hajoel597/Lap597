</main>
<footer id="colophon" class="site-footer">
    <div class="site-info">
        <!-- 저작권 표시 및 사이트 이름 동적 출력 -->
        &copy; <?php echo date('Y'); ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <?php bloginfo( 'name' ); ?>
        </a>
        <span class sep> | </span>
        <!-- 워드프레스 구동 표시 -->
        <a href="wordpress.org">
            <?php printf( esc_html__( 'Proudly powered by %s', 'your-theme-slug' ), 'WordPress' ); ?>
        </a>
    </div><!-- .site-info -->
</footer><!-- .site-footer -->
<?php wp_footer(); // **필수**: 플러그인, 스크립트가 푸터에 로드되도록 하는 훅 ?>

</body>

</html>