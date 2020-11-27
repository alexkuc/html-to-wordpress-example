<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php get_template_part('template-parts/head') ?>

<body>
  <!-- Navigation -->
  <?php get_template_part('template-parts/navigation') ?>

  <!-- Page Header -->
  <?php get_template_part('template-parts/header') ?>

  <!-- Post Content -->
  <?php
  if (!isset($args['template-parts'])) {
    get_template_part('template-parts/loop', 'singular');
  }
  if(isset($args['template-parts'])) {
    get_template_part(...$args['template-parts']);
  }
  ?>

  <!-- Footer -->
  <?php get_template_part('template-parts/footer') ?>

  <!-- WordPress Footer -->
  <?php wp_footer() ?>
</body>

</html>
