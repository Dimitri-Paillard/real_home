<?php
$champ_date = get_field_object('date');
$champ_illustration = get_field_object('illustration');
$champ_body =  get_field_object('corps_de_texte');
?>

<article <?php post_class('card-propriete-article col-md-9'); ?>>
    <div class="" style="width: 600px;">
      <div class="justify-content-center">
        <?php the_title('<h2 class="entry-title h4">', '</h2>'); ?>
        <figure class="card-propriete-figure mb-0">
          <?= get_the_post_thumbnail($post->ID, 'thumb-750', array('class' => 'img-fluid card-propriete_img')) ?>
        </figure>
        <p><?= $champ_date['label'] ?> : <strong><?= $champ_date['value'] ?></strong></p>
        <p><?= $champ_body['label'] ?> : <strong><?= wp_trim_words($champ_body['value'], 40, '...'); ?></strong></p>
      </div>
    <div class="card-propriete_content p-3">
      <p class="card-propriete_excerpt"><?= wp_trim_words(get_the_content(), 20, '...'); ?></p>
      <a class="card-propriete_btn btn btn-outline-light" href="<?php the_permalink(); ?>"><?php _e('Lire la suite', 'scratch') ?></a>
    </div>
    <hr>
</article>
<div <?php post_class('card-propriete-article col-md-3'); ?>>
  <?php get_sidebar('sidebar-1') ?>
</div>

