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
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <?php  get_template_part( 'template-parts/content', 'actualite' ); ?>

    <?php endwhile; ?>
    <?php else : ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>
    </div>
  <?php endif;?>
  <div class="d-flex justify-content-center">
    <?php the_posts_pagination(3) ?>
  </div>
</section>

<?php get_sidebar('lastposts') ?>

<?php get_footer(); ?>
