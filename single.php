<?php

/**
 * The main template file
 *
 *
 * @package scratch
 */
$lastproprietes = get_posts(array(
    'numberposts' => 9,
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
                    <p><?= $champ_prix['label'] ?> : <strong><?= $champ_prix['value'] ?> <?= $champ_prix['append'] ?></strong></p>
                    <hr>
                    <p><?= $champ_ville['label'] ?> : <strong><?= $champ_ville['value'] ?> <?= $champ_ville['append'] ?></strong></p>
                    <p><?= $champ_pieces['label'] ?> : <strong><?= $champ_pieces['value'] ?> <?= $champ_pieces['append'] ?></strong></p>
                </div>
                <div class="card-body justify-content-center">
                    <?php the_title('<h2 class="entry-title h4">', '</h2>'); ?>
                   

                </div>

                <strong class=""><?= $champ_surface['value'] ?> <?= $champ_surface['append'] ?></strong>
                <strong><?= $champ_chambre['value'] ?> <?= $champ_chambre['append'] ?></strong>
                <strong><?= $champ_Infos['value'] ?> <?= $champ_Infos['append'] ?></strong>
                <br><br>
                <strong><?= $champ_description['value'] ?> <?= $champ_description['append'] ?></strong>

            </div>
        </a>
    </article>
</section>

<?php get_sidebar('lastposts') ?>

<?php get_footer(); ?>