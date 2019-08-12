<?php
/**
 * The main template file
 *
 *
 * @package scratch
 */
$lastproprietes = get_posts( array(
	'numberposts' => 6,
  'post_type' => 'propriete',
  'orderby' => 'rand'
) );

$lastposts = get_posts( array(
	'posts_per_page' => 1,
  'post__in' => get_option( 'sticky_posts' ),
  'ignore_sticky_posts' => 1
) );

get_header(); 
?>

<section class="py-5 front-proprietes container">
  <?php if ( $lastproprietes ) : ?>
    <div class="row front-proprietes_grid">
      <?php foreach ( $lastproprietes as $post ) :
          setup_postdata( $post );	

          get_template_part( 'template-parts/content', 'properties' );

      endforeach; 
      wp_reset_postdata(); ?>
    </div>
  <?php endif;?>
  <div class="text-center">
    <a href="<?= esc_url( home_url( '/' ) ) ?>/propriete/" class="btn btn-outline-primary my-5"><?php _e('Toutes les propriétés', 'scratch'); ?></a>
  </div>
</section>

<?php get_sidebar('lastposts') ?>

<?php get_footer(); ?>
