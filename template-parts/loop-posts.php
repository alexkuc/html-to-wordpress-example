  <div class="container">
    <div class="row">
      <?php while (have_posts()) : the_post() ?>
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-preview">
            <a href="<?php the_permalink() ?>">
              <h2 class="post-title">
                <?php the_title() ?>
              </h2>
              <h3 class="post-subtitle">
                <?php the_excerpt() ?>
              </h3>
            </a>
            <p class="post-meta">Posted by
              <a href="#"><?php the_author() ?></a>
              on <?php the_time() ?></p>
          </div>
          <hr>
        </div>
      <?php endwhile ?>
      <div class="col-lg-8 col-md-10 mx-auto">
        <!-- Pagination -->
        <?php get_template_part('template-parts/pagination') ?>
      </div>
    </div>
  </div>
