<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Meta Tags -->
  <?php get_template_part('template-parts/meta-tags') ?>

  <!-- WordPress Header -->
  <?php wp_head() ?>
</head>

<body>

  <!-- Navigation -->
  <?php get_template_part('template-parts/navigation') ?>

  <!-- Page Header -->
  <?php get_template_part('template-parts/header') ?>

  <!-- Post Content -->
  <?php get_template_part('template-parts/loop', 'single-post') ?>

  <!-- Footer -->
  <?php get_template_part('template-parts/footer') ?>

  <!-- WordPress Footer -->
  <?php wp_footer() ?>
</body>

</html>
