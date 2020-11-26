<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php get_template_part('template-parts/head') ?>

<body>
  <!-- Navigation -->
  <?php get_template_part('template-parts/navigation') ?>

  <!-- Page Header -->
  <?php get_template_part('template-parts/header') ?>

  <!-- Main Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <?php the_content() ?>
        </div>
      </div>
    </div>
  </article>

  <hr>

  <!-- Footer -->
  <?php get_template_part('template-parts/footer') ?>

  <!-- WordPress Footer -->
  <?php wp_footer() ?>
</body>

</html>
