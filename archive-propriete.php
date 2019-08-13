<?php

/**
 * The main template file
 *
 *
 * @package scratch
 */

$ville_array = get_field_object('ville')['choices'];
$values = isset($_GET['villes']) ? (array) $_GET['villes'] : [];

get_header();
?>

<section class="py-5 front-proprietes container">
  <h1 class="d-flex justify-content-center">Nos propriétés</h1>
  <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="get" class="archive-filter-form form-inline">
    <h3 class="mb-lg-0 mr-4"><?php _e('Filtrer par Villes : ', 'scratch'); ?></h3>
    <?php foreach ($ville_array as $key => $ville) : ?>
    <div class="form-check form-check-inline">
      <input type="checkbox" name="villes[]" value="<?= $key ?>" id="villes-<?= $key ?>" <?php if (in_array($key, $values)) : ?>checked<?php endif; ?> class="propriete-filters-field form-check-input">
      <label for="villes-<?= $key ?>" class="form-check-label"><?= $ville ?></label>
    </div>
    <?php endforeach; ?>
    <button class="btn btn-outline-primary ml-auto" type="submit">Filtrer</button>
  </form>
  <div class="row front-proprietes_grid">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>


    <?php get_template_part('template-parts/content', 'properties'); ?>



    <?php endwhile; ?>
    <?php else : ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>
  </div>
</section>


<?php get_footer(); ?>