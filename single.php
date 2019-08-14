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

<?php
$champ_date = get_field_object('date');
$champ_illustration = get_field_object('illustration');
$champ_body =  get_field_object('corps_de_texte');
?>

<section class="py-5 front-proprietes container">
    <div class="row front-proprietes_grid">
        <article <?php post_class('card-propriete-article col-md-9'); ?>>
            <div class="" style="width: 600px;">
                <div class="justify-content-center">
                    <?php the_title('<h2 class="entry-title h4">', '</h2>'); ?>
                    <p><strong><?= $champ_date['value']; ?></strong></p>
                    <figure class="card-propriete-figure mb-0">
                        <?= get_the_post_thumbnail($post->ID, 'thumb-750', array('class' => 'img-fluid card-propriete_img')) ?>
                    </figure>
                    <p><?= $champ_body['label'] ?> : <strong><?= $champ_body['value']; ?></strong></p>
                </div>
        </article>
        <div <?php post_class('card-propriete-article col-md-3'); ?>>
            <?php get_sidebar('sidebar-1') ?>
        </div>    
        <a class="card-propriete_btn btn btn-outline-light" href="<?php the_permalink(); ?>"><?php _e('Lire la suite', 'scratch') ?></a>
    </div>
</section>

<?php get_sidebar('lastposts') ?>

<?php get_footer(); ?>