<?php while (have_posts()) : the_post() ?>
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
<?php endwhile ?>
