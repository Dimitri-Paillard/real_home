<?php
$champ_date = get_field_object('date');
$champ_illustration = get_field_object('illustration');
$champ_body =  get_field_object('corps_de_texte');
?>

<article <?php post_class('card-propriete-article col-md-9'); ?>>
  <a class="card-spot_link" href="<?php the_permalink(); ?>">
    <div class="" style="width: 750px;">
      <div class="card-body justify-content-center">
        <?php the_title('<h2 class="entry-title h4">', '</h2>'); ?>
        <figure class="card-propriete-figure mb-0">
          <?= get_the_post_thumbnail($post->ID, 'thumb-555', array('class' => 'img-fluid card-propriete_img')) ?>
        </figure>
        <p><?= $champ_date['label'] ?> : <strong><?= $champ_date['value'] ?> <?= $champ_date['append'] ?></strong></p>
        <p><?= $champ_body['label'] ?> : <strong><?= $champ_body['value'] ?> <?= $champ_body['append'] ?></strong></p>
      </div>
    <div class="card-propriete_content p-3">
      <p class="card-propriete_excerpt"><?= wp_trim_words(get_the_content(), 20, '...'); ?></p>
      <button class="card-propriete_btn btn btn-outline-light"><?php _e('Lire la suite', 'scratch') ?></button>
    </div>
  </a>
</article>
<div <?php post_class('card-propriete-article col-md-3'); ?>>
  <?php get_sidebar('sidebar-1') ?>
</div>