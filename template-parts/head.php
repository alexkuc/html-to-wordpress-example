<head>
  <!-- Meta Tags -->
  <?php get_template_part('template-parts/meta-tags') ?>

  <!-- WordPress Header -->
  <?php wp_head() ?>
  <?php if (is_admin_bar_showing()) { ?>
    <style>
      #mainNav {
        position: absolute;
        top: 32px;
      }
    </style>
  <?php } ?>
</head>
