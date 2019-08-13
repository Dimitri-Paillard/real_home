<?php
/**
 * The main template file
 *
 *
 * @package scratch
 */
$lastactualite = get_posts( array(
	'numberposts' => 6,
  'post_type' => 'actualite',
  'orderby' => 'rand'
) );
get_header(); 
?>

<section class="py-5 front-proprietes container">
  <?php if ( $lastactualite ) : ?>
    <div class="row front-proprietes_grid">
      <?php foreach ( $lastactualite as $post ) :
          setup_postdata( $post );	

          get_template_part( 'template-parts/content', 'actualite' );

      endforeach; 
      wp_reset_postdata(); ?>
    </div>
  <?php endif;?>
</section>

<?php get_footer(); ?>
