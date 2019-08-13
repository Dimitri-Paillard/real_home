<?php
$champ_prix = get_field_object('prix');
$champ_ville = get_field_object('ville');
$champ_chambre =  get_field_object('nombre_de_chambre');
$champ_Infos =  get_field_object('infos');
$champ_surface =  get_field_object('surface');
$champ_description =  get_field_object('description');

?>

<article <?php post_class('card-propriete-article col-md-3'); ?>>
  <a class="card-spot_link" href="<?php the_permalink(); ?>">
    <div class="card" style="width: 250px;">
      <figure class="card-propriete-figure mb-0">
        <?= get_the_post_thumbnail($post->ID, 'thumb-555', array('class' => 'img-fluid card-propriete_img')) ?>
      </figure>
      <div class="card-body">
        <?php the_title('<h2 class="title-properties d-flex justify-content-center entry-title h4">', '</h2>'); ?>
        <p class="d-flex justify-content-center"><?= $champ_ville['label'] ?> : <strong><?php the_field('ville'); ?></strong></p>
        <p class="d-flex justify-content-center"><?= $champ_prix['label'] ?> : <strong><?= $champ_prix['value'] ?> <?= $champ_prix['append'] ?></strong></p>
      </div>
    </div>
  </a>
</article>
