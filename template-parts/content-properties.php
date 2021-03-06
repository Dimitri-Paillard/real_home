<?php
$champ_prix = get_field_object('prix');
$champ_ville = get_field_object('ville');
$champ_chambre =  get_field_object('nombre_de_chambre');
$champ_Infos =  get_field_object('infos');
$champ_surface =  get_field_object('surface');
$champ_description =  get_field_object('description');

?>

<article <?php post_class('card-propriete-article col-md-4'); ?>>
  <a class="card-spot_link" href="<?php the_permalink(); ?>">
    <div class="card" style="width: 350px;">
      <figure class="card-propriete-figure mb-0">
        <?= get_the_post_thumbnail($post->ID, 'thumb-555', array('class' => 'img-fluid card-propriete_img')) ?>
      </figure>
      <div class="card-body justify-content-center">
        <?php the_title('<h2 class="entry-title h4">', '</h2>'); ?>
        <p><?= $champ_ville['label'] ?> : <strong><?= $champ_ville['choices'][$champ_ville['value']] ?></strong></p>
        <p><?= $champ_prix['label'] ?> : <strong><?= $champ_prix['value'] ?> <?= $champ_prix['append'] ?></strong></p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item d-flex justify-content-between">
        <strong class=""><?= $champ_surface['value'] ?> <?= $champ_surface['append'] ?></strong>
        <strong><?= $champ_chambre['value'] ?> <?= $champ_chambre['append'] ?></strong> 
        <strong><?= $champ_Infos['value']?> <?= $champ_Infos['append'] ?></strong>
      </li>
      </ul>
    </div>
  </a>
</article>
