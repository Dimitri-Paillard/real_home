<?php

/**
 * The main template file
 *
 *
 * @package scratch
 */
$lastproprietes = get_posts(array(
    'numberposts' => 6,
    'post_type' => 'propriete',
    'orderby' => 'rand'
));

$lastposts = get_posts(array(
    'posts_per_page' => 1,
    'post__in' => get_option('sticky_posts'),
    'ignore_sticky_posts' => 1
));

get_header();
?>

<main>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <article <?php post_class(); ?>>
        <div class="entry-content container py-5 w-75">
            <?php the_title('<h1 class="page-title">', '</h1>'); ?>
            <?php the_content() ?>
        </div>
    </article>

    <?php endwhile; ?>

    <?php else : ?>
    <div class="container py-5">
        <p><?php _e('Sorry, no posts matched your criteria.', 'scratch'); ?></p>
    </div>
    <?php endif; ?>

</main>

<?php get_sidebar('lastposts') ?>

<?php get_footer(); ?>