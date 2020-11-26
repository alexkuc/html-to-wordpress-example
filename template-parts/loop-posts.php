<?php while (have_posts()) : the_post() ?>
  <div class="container">
    <div class="row">
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
        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div>
      </div>
    </div>
  </div>
<?php endwhile ?>
