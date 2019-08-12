</div><!-- #page -->
​
<footer class="footer bg-dark text-white pt-5 pb-3">
    <div class="">
        <div class="navbar-brand mr-auto offset-1"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><img src="<?= get_stylesheet_directory_uri() ?>/images/Elets/Logo-white.svg" alt="<?php bloginfo('name'); ?>"></a></div>
        </div>
        <div class="row">
            <?php dynamic_sidebar('sidebar-footer') ?>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>