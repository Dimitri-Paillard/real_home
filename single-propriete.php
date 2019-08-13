<?php

/**
 * The main template file
 *
 *
 * @package scratch
 */
$lastproprietes = get_posts(array(
    'numberposts' => 4,
    'post_type' => 'propriete',
    'orderby' => 'rand'
));

$lastposts = get_posts(array(
    'posts_per_page' => 1,
    'post__in' => get_option('sticky_posts'),
    'ignore_sticky_posts' => 1
));

$champ_prix = get_field_object('prix');
$champ_ville = get_field_object('ville');
$champ_chambre =  get_field_object('nombre_de_chambre');
$champ_Infos =  get_field_object('infos');
$champ_surface =  get_field_object('surface');
$champ_description =  get_field_object('description');
$champ_pieces = get_field_object('nombre_de_pieces');

get_header();
?>

<section class="py-5 front-proprietes container">
    <article <?php post_class('card-propriete-article'); ?>>
        <a class="card-spot_link" href="<?php the_permalink(); ?>">
            <div class="row">
                <figure class="card-propriete-figure mb-0 col-6">
                    <?= get_the_post_thumbnail($post->ID, 'thumb-555', array('class' => 'img-fluid card-propriete_img')) ?>
                </figure>
                <div class="col-6">
                    <p><i class="fa fa-bookmark-o fa-2x" aria-hidden="true"></i></i><strong class="card-price col-4"><?= $champ_prix['value'] ?> <?= $champ_prix['append'] ?></strong></p>
                    <hr>
                    <p><?= $champ_ville['label'] ?> : <strong><?php the_field('ville'); ?></strong></p>
                    <p><?= $champ_pieces['label'] ?> : <strong><?= $champ_pieces['value'] ?> <?= $champ_pieces['append'] ?></strong></p>
                    <p><?= $champ_surface['label'] ?> : <strong><?= $champ_surface['value'] ?> <?= $champ_surface['append'] ?></strong></p>
                    <p><?= $champ_Infos['label'] ?> : <strong><?= $champ_Infos['value'] ?> <?= $champ_Infos['append'] ?></strong></p>
                    <hr>
                    <p><strong><?= $champ_description['value'] ?> <?= $champ_description['append'] ?></strong></p>
                </div>
            </div>
        </a>
    </article>
    <hr class="mb-5">
    <?php if ($lastproprietes) : ?>
    <h2 class="d-flex justify-content-center mb-5">Nos Propiétés</h2>
    <div class="row front-proprietes_grid">
        <?php foreach ($lastproprietes as $post) :
                setup_postdata($post);

                get_template_part('template-parts/content', 'single-properties');

            endforeach;
            wp_reset_postdata(); ?>
    </div>
    <?php endif; ?>
    <div class="text-center">
        <a href="<?= esc_url(home_url('/')) ?>/propriete/" class="btn btn-outline-primary my-5"><?php _e('Toutes les propriétés', 'scratch'); ?></a>
    </div>
</section>

<?php get_sidebar('lastposts') ?>

<?php get_footer(); ?>