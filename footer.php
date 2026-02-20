<footer class="site-footer">
    <div class="footer-inner">
        <div class="footer-left">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.</p>
        </div>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">홈으로</a>
        <div class="footer-right">
            <a href="#" class="top-button">Back to Top</a>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>