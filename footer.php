<?php
/**
* The Footer for our theme.
*
* ...
*
* @package scratch
*
*/
?>
   <footer class="footer bg-dark text-white pt-5 pb-3">
       <div class="container">
           <div class="row">
               <?php dynamic_sidebar('sidebar-footer') ?>
           </div>
       </div>
       <?php
       wp_nav_menu(array(
           'theme_location' => 'social',
           'depth' => 2, // 1 = no dropdowns, 2 = with dropdowns.
           'container' => 'div',
           'container_class' => 'collapse navbar-collapse',
           'container_id' => 'navbarNav',
           'menu_class' => 'navbar-nav ml-auto',
           'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
           'walker' => new WP_Bootstrap_Navwalker(),
       ));
       ?>
   </footer>
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>