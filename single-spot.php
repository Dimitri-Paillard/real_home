<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

$lastposts = get_posts( array(
	'numberposts' => 3,
	'post_type' => 'sejour',
	'post__not_in' => array(get_the_ID()),
));

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content/content', 'spot' );

				if ( is_singular( 'attachment' ) ) {
					// Parent post navigation.
					the_post_navigation(
						array(
							/* translators: %s: parent post link */
							'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'twentynineteen' ), '%title' ),
						)
					);
				} elseif ( is_singular( 'post' ) ) {
					// Previous/next post navigation.
					the_post_navigation(
						array(
							'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next Post', 'twentynineteen' ) . '</span> ' .
								'<span class="screen-reader-text">' . __( 'Next post:', 'twentynineteen' ) . '</span> <br/>' .
								'<span class="post-title">%title</span>',
							'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous Post', 'twentynineteen' ) . '</span> ' .
								'<span class="screen-reader-text">' . __( 'Previous post:', 'twentynineteen' ) . '</span> <br/>' .
								'<span class="post-title">%title</span>',
						)
					);
				}

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</section><!-- #primary -->

	<section class="section-last-posts section-last-sejours">

		<h2>Nos séjours</h2>

		<?php if ($lastposts) : ?>

			<?php foreach ($lastposts as $post) : ?>
				<?php setup_postdata( $post );
				$champ_duree = get_field_object('duree');  ?>

				<article <?php post_class(); ?>>
					<figure>
						<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('medium') ?></a>
					</figure>
					<h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
					<p><?= $champ_duree['label'] ?> : <strong><?= $champ_duree['value'] ?> <?= $champ_duree['append'] ?></strong></p>
					<p><?php the_excerpt() ?></p>
				</article>

				

			<?php endforeach; ?>
			<?php wp_reset_postdata(); ?>

		<?php endif; ?>

	</section>
	

<?php
get_footer();